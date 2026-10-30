document.addEventListener('DOMContentLoaded', function () {

  const scanSheet     = document.getElementById('scanSheet');
  const sheetPanel    = document.getElementById('sheetPanel');
  const sheetOverlay  = document.getElementById('sheetOverlay');
  const resultOverlay = document.getElementById('resultOverlay');
  const resultContent = document.getElementById('resultContent');

  const btnOpenScan   = document.getElementById('btnOpenScan');
  const btnCloseScan  = document.getElementById('btnCloseScan');
  const btnCloseScan2 = document.getElementById('btnCloseScan2');
  const btnCari       = document.getElementById('btnCariJukir');
  const inputNama     = document.getElementById('inputNama');
  const resultPanel   = document.getElementById('resultPanel');
const resultBackdrop = document.getElementById('resultBackdrop');


window.showLoading = function () {
  document.getElementById('loadingScreen').style.display = 'flex';
};

  // ===== BUKA FORM =====
  function openScanSheet() {
    scanSheet.classList.remove('hidden', 'pointer-events-none');
    setTimeout(() => {
      sheetOverlay.classList.remove('opacity-0', 'pointer-events-none');
      sheetOverlay.classList.add('opacity-100');
      sheetPanel.classList.remove('translate-y-full');
      sheetPanel.classList.add('translate-y-0');
    }, 10);
  }

  function closeScanSheet() {
    sheetOverlay.classList.remove('opacity-100');
    sheetOverlay.classList.add('opacity-0', 'pointer-events-none');
    sheetPanel.classList.add('translate-y-full');

    setTimeout(() => {
      scanSheet.classList.add('hidden', 'pointer-events-none');
    }, 300);
  }

  btnOpenScan.addEventListener('click', e => {
    e.preventDefault();
    openScanSheet();
  });



  btnCloseScan.addEventListener('click', closeScanSheet);
  btnCloseScan2.addEventListener('click', closeScanSheet);
  sheetOverlay.addEventListener('click', closeScanSheet);

  // ===== CARI (JSON AJAX) =====
  btnCari.addEventListener('click', function () {

    const nama = inputNama.value.trim();
    if (!nama) {
      alert('Nama Jukir wajib diisi');
      return;
    }

    // tutup form SETELAH klik cari
    closeScanSheet();

    // buka overlay hasil
 resultOverlay.classList.remove('hidden', 'pointer-events-none');

setTimeout(() => {
  resultBackdrop.classList.remove('opacity-0', 'pointer-events-none');
  resultBackdrop.classList.add('opacity-100');

  resultPanel.classList.remove('translate-y-full');
  resultPanel.classList.add('translate-y-0');
}, 10);

resultContent.innerHTML =
  '<p class="text-center text-gray-500">Mencari data...</p>';

    resultContent.innerHTML =
      '<p style="text-align:center;color:#6b7280">Mencari data...</p>';

   fetch('/aspri/jukir/cari_nama_ajax', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded',
    'X-Requested-With': 'XMLHttpRequest' // 🔥 PENTING
  },
  body: 'nama=' + encodeURIComponent(nama)
})

    .then(res => res.json())
  .then(res => {

  if (res.status !== 'ok') {
    resultContent.innerHTML =
      `<p class="text-center text-red-600">${res.message}</p>`;
    return;
  }

  let html = `<div class="jukir-list">`;

  res.data.forEach(item => {
    html += `
      <div class="jukir-card">
        <div class="jukir-name">${item.nama}</div>
        <div class="jukir-area">
          ${item.lokasi} (${item.area})
        </div>

      <button
  class="jukir-btn"
  onclick="openDetailJukir(${item.id})">
  Detail
</button>


      </div>
    `;
  });

  html += `</div>`;

  resultContent.innerHTML = html;
});


  });

});

function closeResult() {
  const overlay   = document.getElementById('resultOverlay');
  const panel     = document.getElementById('resultPanel');
  const backdrop  = document.getElementById('resultBackdrop');

  backdrop.classList.remove('opacity-100');
  backdrop.classList.add('opacity-0', 'pointer-events-none');

  panel.classList.add('translate-y-full');

  setTimeout(() => {
    overlay.classList.add('hidden', 'pointer-events-none');
  }, 300);
}

function openDetailJukir(id) {

  const overlay  = document.getElementById('detailOverlay');
  const panel    = document.getElementById('detailPanel');
  const backdrop = document.getElementById('detailBackdrop');
  const content  = document.getElementById('detailContent');

  overlay.classList.remove('hidden', 'pointer-events-none');

  setTimeout(() => {
    backdrop.classList.remove('opacity-0', 'pointer-events-none');
    backdrop.classList.add('opacity-100');
    panel.classList.remove('translate-y-full');
  }, 10);

  content.innerHTML =
    `<p class="text-center text-gray-500">Memuat detail jukir...</p>`;

  fetch(`/aspri/petugas/detail_ajax/${id}`, {
    headers: { 'X-Requested-With': 'XMLHttpRequest' }
  })
  .then(res => res.json())
  .then(res => {

    if (res.status !== 'ok') {
      content.innerHTML =
        `<p class="text-center text-red-600">${res.message}</p>`;
      return;
    }

    renderDetailJukir(res.data);
  })
.catch(err => {

  console.error('AJAX detail jukir error:', err);

  content.innerHTML = `
    <div class="text-center text-red-600 space-y-2">
      <p class="font-semibold">Gagal mengambil data</p>
      <p class="text-xs text-gray-500">
        ${err?.message ?? 'Network / server error'}
      </p>
    </div>
  `;
});

}


function renderDetailJukir(res) {

  const j = res.jukir;
  const total = res.total_setoran;
 const lokasiList = j.lokasi
    .split(/\s*,\s*|\s+DAN\s+/i)
    .map(item => item.trim())
    .filter(item => item.length > 0);
    
const lokasiHTML = lokasiList.map((lokasi)=>`

<div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">

    <div class="flex items-center gap-2 mb-3">

        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
            📍
        </div>

        <div class="font-semibold text-slate-800 text-sm">
            ${lokasi}
        </div>

    </div>

    <input
        type="text"
        class="nominalLokasi w-full rounded-xl border border-slate-300
               px-4 py-3 text-center text-xl font-bold
               focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Masukkan nominal"
        inputmode="numeric">

</div>

`).join('');
  document.getElementById('detailContent').innerHTML = `
  <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-lg p-6">

  <!-- HEADER (TETAP) -->
  <div class="text-center mb-3">
    <img src="/aspri/assets/img/jukir/${j.noKTP}.jpg"
         onerror="this.src='/aspri/assets/img/icon.png'"
         class="w-16 h-16 mx-auto rounded-full mb-2">
    <h3 class="text-base font-bold">${j.nama}</h3>
  </div>

  <!-- ISI SCROLL -->
<div class="space-y-3">

    <div class="bg-gray-100 rounded-xl p-3">
      <div class="text-xs text-gray-500">Lokasi</div>
      <div class="font-semibold">${j.lokasi}</div>
    </div>

    <div class="bg-gray-100 rounded-xl p-3">
      <div class="text-xs text-gray-500">Terakhir Setor</div>
      <div class="font-semibold">${j.tanggalTerakhirSetor}</div>
    </div>

 
      <div class="bg-red-600 text-white rounded-xl p-3">
        <div class="text-xs">Sisa Setoran</div>
        <div class="text-lg font-bold">
          Rp ${j.sisaSetoran.toLocaleString('id-ID')}
        </div>
      </div>
    </div>

    ${
      j.aktif === 1 && !j.isAlreadySetorToday
      ? `
      <form id="formSetoran"
            action="/aspri/jukir/simpan_setoran"
            method="post"
            class="bg-white rounded-xl shadow p-3 space-y-3 mt-3">

        <input type="hidden" name="nama" value="${j.nama}">
        <input type="hidden" name="kode" value="${j.no}">
        <input type="hidden" name="lokasi" value="${j.lokasi}">
        <input type="hidden" name="kolektor" value="${window.namaKolektor ?? ''}">
        <input type="hidden" name="bulan" id="inputBulan">

        <div class="grid grid-cols-2 gap-2">
          <div class="bg-gray-100 rounded-lg p-2 text-center">
            <div class="text-xs text-gray-500">Tanggal</div>
            <input id="inputTanggal" readonly
                   class="w-full bg-transparent text-sm font-semibold text-center">
          </div>
          <div class="bg-gray-100 rounded-lg p-2 text-center">
            <div class="text-xs text-gray-500">Waktu</div>
            <input id="inputWaktu" readonly
                   class="w-full bg-transparent text-sm font-semibold text-center">
          </div>
        </div>

 <div class="border rounded-lg overflow-hidden">

    <table class="w-full text-sm">

        <thead class="bg-slate-100">

            <tr>

                <th class="border px-3 py-2 w-12">
                    No
                </th>

                <th class="border px-3 py-2 text-left">
                    Lokasi
                </th>

                <th class="border px-3 py-2 w-72">
                    Nominal Setoran
                </th>

            </tr>

        </thead>

        <tbody>

            ${
                lokasiList.map((lokasi,index)=>`

                <tr>

                    <td class="border text-center font-semibold">
                        ${index+1}
                    </td>

                    <td class="border px-3 py-2 font-medium">

                        ${lokasi}

                    </td>

                    <td class="border p-2">

                        <div class="flex items-center">

                            <span class="mr-2 text-gray-500">
                                Rp
                            </span>

                            <input
                                type="text"
                                class="nominalLokasi w-full border rounded px-3 py-2 text-right font-semibold"
                                placeholder="0"
                                inputmode="numeric">
                                

                        </div>

                    </td>

                </tr>

                `).join('')
            }

        </tbody>

        <tfoot>

            <tr class="bg-emerald-50">

                <th colspan="2"
                    class="border px-3 py-3 text-right text-lg">

                    TOTAL

                </th>

                <th class="border px-3 py-3">

                    <div id="totalSetoran"
                         class="text-2xl text-center font-bold text-emerald-700">

                        Rp 0

                    </div>

                </th>

            </tr>

        </tfoot>

    </table>

</div>


<input
    type="hidden"
    name="setoran"
    id="inputSetoran">
    <input type="hidden" id="detailLokasi" name="detail_lokasi">

        <button type="submit"
                class="w-full bg-blue-600 active:bg-blue-700
                       text-white py-2.5 rounded-xl font-bold">
          Simpan Setoran
        </button>
      </form>
      `
      : `
      <div class="bg-yellow-100 text-yellow-800 p-3 rounded-xl mt-3 text-center">
        ${j.aktif === 0 ? 'Jukir tidak aktif' : 'Sudah setor hari ini'}
      </div>
      `
    }

  </div>
  `;

 initFormLogic(j.aktif, lokasiList);
}

function initFormLogic(jukirAktif, lokasiList) {

    const inputTanggal = document.getElementById('inputTanggal');
    const inputWaktu   = document.getElementById('inputWaktu');

    if (inputTanggal && inputWaktu) {
        const now = new Date();
        inputTanggal.value = now.toLocaleDateString('id-ID');
        inputWaktu.value   = now.toLocaleTimeString('id-ID');
    }

    if (jukirAktif === 0) return;

    const form = document.getElementById('formSetoran');
    if (!form) return;

    // Hitung total setoran
    const inputs = document.querySelectorAll(".nominalLokasi");

    function hitungTotal(){

        let total = 0;

        inputs.forEach(function(input){

            let angka = input.value.replace(/\D/g,'');

            if(angka !== ''){

                total += parseInt(angka);

                input.value = parseInt(angka).toLocaleString('id-ID');

            }

        });

        document.getElementById("totalSetoran").innerHTML =
            "Rp " + total.toLocaleString("id-ID");

        document.getElementById("inputSetoran").value = total;

    }

    inputs.forEach(function(input){

        input.addEventListener("input", hitungTotal);

    });

    form.addEventListener('submit', function(e){

        const inputSetoran = document.getElementById('inputSetoran');

        let raw = inputSetoran.value.replace(/\D/g,'');

        if(raw === '' || raw === '0'){

            e.preventDefault();

            Swal.fire({
                icon:'warning',
                title:'Oops...',
                text:'Masukkan nominal setoran terlebih dahulu'
            });

            return;

        }

        // Simpan detail lokasi
        let detail = [];

        inputs.forEach(function(input,index){

            let nominal = input.value.replace(/\D/g,'');

            detail.push({

                lokasi  : lokasiList[index],
                nominal : nominal || 0

            });

        });

        document.getElementById("detailLokasi").value =
            JSON.stringify(detail);

        inputSetoran.value = raw;

        showLoading();

    });

}


    function formatRupiah(val) {

        let number = val.replace(/\D/g,'');

        let sisa = number.length % 3;

        let rupiah = number.substr(0,sisa);

        let ribuan = number.substr(sisa).match(/\d{3}/g);

        if(ribuan){

            let sep = sisa ? '.' : '';

            rupiah += sep + ribuan.join('.');

        }

        return rupiah;

    }

    // ===========================
    // TAMBAHKAN DI SINI
    // ===========================

    function hitungTotal(){

        let total = 0;

        document.querySelectorAll(".nominalLokasi").forEach(function(input){

            let angka = input.value.replace(/\D/g,'');

            input.value = formatRupiah(angka);

            if(angka){
                total += parseInt(angka);
            }

        });

        document.getElementById("totalSetoran").innerHTML =
            "Rp " + total.toLocaleString("id-ID");

        document.getElementById("inputSetoran").value = total;

    }

    document.querySelectorAll(".nominalLokasi").forEach(function(input){

        input.addEventListener("input", hitungTotal);

    });

    // ===========================



function closeDetailJukir() {

  const overlay  = document.getElementById('detailOverlay');
  const panel    = document.getElementById('detailPanel');
  const backdrop = document.getElementById('detailBackdrop');

  if (!overlay || !panel || !backdrop) return;

  backdrop.classList.remove('opacity-100');
  backdrop.classList.add('opacity-0', 'pointer-events-none');

  panel.classList.add('translate-y-full');

  setTimeout(() => {
    overlay.classList.add('hidden', 'pointer-events-none');
  }, 300);
}
