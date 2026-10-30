
let offset = 0;
const limit = 100;
function loadPetugasData() {
    $.ajax({
        url: './petugas/get_petugas',
        method: 'POST',
        data: { limit: limit, offset: offset },
        dataType: 'json',
        success: function(data) {
            let rows = '';
            let no = 1; // nomor awal
            // Create an array of promises to check photo existence
            let promises = data.petugas.map(function(petugas) {
 
            });

            // Wait for all promises to complete
            Promise.all(promises).then(function() {
                // Build the rows with updated statusFoto
                data.petugas.forEach(function(petugas) {
                    
                    let editUrl = './petugas/edit_petugas/' + petugas.id;
                     let jukirUrl = './jukir/detail_nama/' + petugas.id;
                    rows += `<tr>
            <td>${no++}</td> <!-- NO URUT -->
          
            <td>${petugas.noktp}</td>
            <td>${petugas.no}</td>
            <td>${petugas.nama}</td>
            <td>${petugas.lokasi}</td>
            <td>${petugas.area}</td>
            <td>Rp ${petugas.target}</td>
            <td>
                <a href="${editUrl}" class="btn btn-info btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm delete-btn" data-id="${petugas.id}">Hapus</button>
                <a href="${jukirUrl}" target="_blank" class="btn btn-success btn-sm">Detail</a>
            </td>
        </tr>`;
                });

                // Update the table body with all rows
                $('#petugas_table_body').html(rows);

                // Update offset for next load
                offset += limit;

                // Hide load more button if all data has been loaded
                if (offset >= data.total_petugas) {
                    $('#load_more').hide();
                }
            });
        }
    });
}
function loadPetugasUser() {
    $.ajax({
        url: './petugas/get_petugas',
        method: 'POST',
        data: { limit: limit, offset: offset },
        dataType: 'json',
        success: function(data) {
            let rows = '';
               let no = 1; // nomor awal
            // Create an array of promises to check photo existence
            

            // Wait for all promises to complete
            Promise.all(promises).then(function() {
                // Build the rows with updated statusFoto
                data.petugas.forEach(function(petugas) {
                    let editUrl = './petugas/edit_petugas/' + petugas.id;
                    rows += `<tr>
                    <td>${no++}</td> 
                      
                        <td>${petugas.noktp}</td>
                        <td>${petugas.no}</td>
                        <td>${petugas.nama}</td>
                        <td>${petugas.lokasi}</td>
                        <td>${petugas.area}</td>
                       <td> ${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(petugas.target)}</td>
                    </tr>`;
                });

                // Update the table body with all rows
                $('#petugas_user_body').html(rows);

                // Update offset for next load
                offset += limit;

                // Hide load more button if all data has been loaded
                if (offset >= data.total_petugas) {
                    $('#load_more').hide();
                }
            });
        }
    });
}

function loadPetugasSetoran() {
    // Show loading message before making the request
    $('#loadingMessage').show();
    
    $.ajax({
        url: './petugas/get_petugas',
        method: 'POST',
        data: { limit: limit, offset: offset },
        dataType: 'json',
        success: function(data) {
            let cards = '';

            data.petugas.forEach(function(petugas) {
                let defaultImageUrl = './assets/img/icon.png'; // Default profile image
                let fotoUrl = defaultImageUrl;
            
                // Check if noktp is a valid number and not empty
                if (/^\d+$/.test(petugas.noktp) && petugas.noktp) {
                    let possibleFotoUrl = `./assets/img/jukir/${petugas.noktp}.jpg`;
                    
                    // Check if the image exists
                    $.ajax({
                        url: possibleFotoUrl,
                        type: 'HEAD',
                        async: false, // Make this request synchronous to set fotoUrl correctly
                        success: function() {
                            fotoUrl = possibleFotoUrl; // Set fotoUrl to the found image
                        },
                        error: function() {
                            fotoUrl = defaultImageUrl; // Use default image if not found
                        }
                    });
                }
                let editUrl = './petugas/edit_petugas/' + petugas.id;
                let pencapaian = (petugas.total_stor / petugas.target_aspri) * 100;
                let detail = './jukir/detail_nama/'+ petugas.id;

                // Generate a card for each petugas using Bootstrap card classes
                cards += `
                    <div class="col">
                        <div class="card h-100 shadow  custom-card-hover">
                            <center><div class="card-header bg-primary text-white">${petugas.no}</div></center>
                            <center><img src="${fotoUrl}" class="card-img-top" style="width: 50%;height:228px" alt="Foto Petugas"></center>
                            <div class="card-body">
                                <center><h5 class="card-title">${petugas.nama}</h5></center>
                                <p class="card-text"><strong>Lokasi:</strong> ${petugas.lokasi}</p>
                                <p class="card-text"><strong>Area:</strong> ${petugas.area}</p>
                                <p class="card-text"><strong>Target Per Tahun:</strong> ${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(petugas.target_aspri)}</p>
                                <div class="progress my-2" style="height: 20px;">
                                    <div class="progress-bar ${pencapaian < 20 ? 'bg-danger' : pencapaian < 50 ? 'bg-warning' : 'bg-success'}" role="progressbar" 
                                         style="width: ${pencapaian}%;"
                                         aria-valuenow="${pencapaian}" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                        ${pencapaian.toFixed(2)}%
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="${detail}" class="btn btn-primary w-100">Detail Setoran</a>
                            </div>
                        </div>
                    </div>
                `;
            });

            // Append the generated cards to the card container
            $('#petugas_setoran_cards').html(cards);

            // Hide the loading message after the data is loaded
            $('#loadingMessage').hide();

            // Update offset for the next load
            offset += limit;

            // Hide the load more button if all data has been loaded
            if (offset >= data.total_petugas) {
                $('#load_more').hide();
            }
        },
        error: function() {
            // In case of an error, hide the loading message
            $('#loadingMessage').hide();
        }
    });
}

  
    // Event listener untuk tombol Apply Filter
    $('#apply_sort').on('click', function() {
        const sort = $('#filter_sort').val();
        loadPetugasSetoran(sort); // Memuat data dengan filter urutan
    });
    
$(document).ready(function() {
    loadPetugasData();
    loadPetugasSetoran();
    loadPetugasUser();

    $('#load_more').on('click', function() {
        loadPetugasData();
         loadPetugasSetoran();
    });
    
     $('#search_input').on('keypress', function(event) {
                if (event.which === 13) { // Enter key pressed
                    searchPetugas();
                    event.preventDefault(); // Prevent form submission if inside a form
                }
            });

    $('#search_button').on('click', function() {
        let keyword = $('#search_input').val().toLowerCase();
        offset = 0;
        $('#petugas_table_body').empty();
        $.ajax({
            url: './petugas/search_petugas',
            method: 'POST',
            data: { keyword: keyword },
            dataType: 'json',
            success: function(data) {
                let rows = '';
                   let no = 1; // nomor awal
                data.petugas.forEach(function(petugas) {
                     
                    let editUrl = './petugas/edit_petugas/' + petugas.id;
                    let jukirUrl = './jukir/detail_nama/' + petugas.id;
                    rows += `<tr>
                      <td>${no++}</td> 
                      
                        <td>${petugas.noktp}</td>
                        <td>${petugas.no}</td>
                        <td>${petugas.nama}</td>
                        <td>${petugas.lokasi}</td>
                        <td>${petugas.area}</td>
                         <td> ${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(petugas.target_aspri)}</td>
          
           
                        <td>
                            <a href="${editUrl}" class="btn btn-info btn-sm">Edit</a>

                            <button class="btn btn-danger btn-sm delete-btn" data-id="${petugas.id}">Hapus</button>
                        
                            <a href="${jukirUrl}" target="_blank" class="btn btn-succes btn-sm">Detail</a>
                        </td>
                    </tr>`;
                });
                $('#petugas_table_body').html(rows); // Update table with search result
            }
        });
    });

// Add Petugas AJAX
$(document).ready(function() {
    loadPetugasData();

    $('#load_more').on('click', function() {
        loadPetugasData();
    });

    $('#addPetugasForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: './petugas/add_petugas',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#addPetugasModal').modal('hide');
                $('#addPetugasForm')[0].reset();
                $('#petugas_table_body').empty();
                offset = 0;
                loadPetugasData();
            }
        });
    });
});  

});
// Delete Petugas
$(document).on('click', '.delete-btn', function() {
let id = $(this).data('id');

// Tampilkan SweetAlert konfirmasi penghapusan
Swal.fire({
title: 'Anda yakin ingin menghapus data?',
text: 'Aksi ini tidak dapat dikembalikan!',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Ya, hapus!',
cancelButtonText: 'Batal'
}).then((result) => {
if (result.isConfirmed) {
    // Jika pengguna mengonfirmasi, lakukan penghapusan dengan AJAX
    $.ajax({
        url: './petugas/delete_petugas',
        method: 'POST',
        data: { id: id }, // Kirim ID ke controller
        dataType: 'json',
        success: function(response) {
            Swal.fire(
                'Deleted!',
                'Data telah dihapus.',
                'success'
            )
            // Reload data setelah penghapusan
            $('#petugas_table_body').empty();
            offset = 0;
            loadPetugasData();
        }
    });
}
});
});

