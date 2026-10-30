<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<title>Monitoring Pengawasan Parkir</title>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>

body{
  background:
  radial-gradient(circle at top left,#dbeafe 0%,transparent 35%),
  radial-gradient(circle at bottom right,#ccfbf1 0%,transparent 35%),
  #f8fafc;

  color:#0f172a;
}

/* GLASS */
.glass{
  background:rgba(255,255,255,.78);
  backdrop-filter:blur(18px);
  -webkit-backdrop-filter:blur(18px);

  border:1px solid rgba(255,255,255,.9);

  box-shadow:
    0 10px 30px rgba(15,23,42,.06);
}

.glow{
  box-shadow:
    0 10px 35px rgba(59,130,246,.08);
}

/* TEXT */
.text-white{
  color:#0f172a !important;
}

.text-slate-300{
  color:#475569 !important;
}

.text-slate-400{
  color:#64748b !important;
}

/* INPUT */
input,
textarea,
select{
  color:#0f172a !important;
}

input::placeholder,
textarea::placeholder{
  color:#64748b !important;
}

/* TABLE */
table{
  color:#0f172a !important;
}

thead{
  color:#475569 !important;
}

/* SELECT2 */
.select2-container{
  width:100% !important;
}

.select2-container .select2-selection--single{
  height:64px !important;
  border-radius:22px !important;

  border:1px solid rgba(148,163,184,.18) !important;

  background:rgba(255,255,255,.92) !important;

  display:flex !important;
  align-items:center !important;

  padding:0 18px !important;

  transition:.3s;
}

.select2-container .select2-selection--single:hover{
  border-color:rgba(6,182,212,.45) !important;
}

.select2-container--default.select2-container--open 
.select2-selection--single{
  border-color:rgba(6,182,212,.5) !important;

  box-shadow:
    0 0 0 4px rgba(6,182,212,.08);
}

.select2-selection__rendered{
  color:#0f172a !important;
  line-height:64px !important;
  padding-left:0 !important;
  font-size:15px;
  font-weight:600;
}

.select2-selection__placeholder{
  color:#64748b !important;
}

.select2-selection__arrow{
  height:64px !important;
  right:18px !important;
}

.select2-selection__arrow b{
  border-color:#06b6d4 transparent transparent transparent !important;
  border-width:6px 5px 0 5px !important;
}

.select2-dropdown{
  background:rgba(255,255,255,.98) !important;

  border:1px solid rgba(148,163,184,.15) !important;

  border-radius:22px !important;

  overflow:hidden;

  margin-top:10px;

  box-shadow:
    0 20px 50px rgba(15,23,42,.12);
}

.select2-search--dropdown{
  padding:14px;
}

.select2-search__field{
  height:50px !important;

  border-radius:16px !important;

  border:1px solid rgba(148,163,184,.18) !important;

  background:#f8fafc !important;

  color:#0f172a !important;

  padding:0 15px !important;

  outline:none !important;
}

.select2-results{
  padding:8px;
}

.select2-results__option{
  padding:14px 16px !important;

  border-radius:14px;

  color:#0f172a !important;

  margin-bottom:4px;

  transition:.2s;
}

.select2-results__option:hover{
  background:#ecfeff !important;
}

.select2-container--default 
.select2-results__option--highlighted.select2-results__option--selectable{
  background:#cffafe !important;
  color:#0891b2 !important;
}

.select2-results__option--selected{
  background:#e0f2fe !important;
  color:#0f172a !important;
}

</style>
</head>

<body class="min-h-screen overflow-x-hidden">

<div class="max-w-6xl mx-auto p-4 md:p-6">

  <!-- HEADER -->
  <div class="glass glow rounded-[30px] p-5 mb-6">

    <div class="flex items-center justify-between flex-wrap gap-4">

      <div>
        <h1 class="text-2xl md:text-3xl font-bold">
          Monitoring Pengawasan Parkir
        </h1>

        <p class="text-slate-500 text-sm mt-1">
          Sistem Pemantauan Pengawasan Jukir
        </p>
      </div>

      <div class="bg-cyan-100 text-cyan-700 px-4 py-2 rounded-2xl text-sm font-semibold">
        Live Monitoring
      </div>

    </div>

  </div>

  <!-- FILTER -->
  <div class="glass rounded-[30px] p-5 mb-6">

    <label class="block mb-3 text-sm font-semibold text-slate-700">
      Pilih Pengawas
    </label>

    <select id="pengawasSelect" class="w-full">
      <option value="">Cari Pengawas...</option>
    </select>

  </div>

  <!-- INFO -->
  <div id="infoPengawas" class="hidden">

    <!-- CARD -->
   <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mb-6">

  <!-- TOTAL JUKIR -->
  <div class="relative overflow-hidden rounded-[32px] p-5 bg-gradient-to-br from-orange-100 via-amber-50 to-white border border-orange-200 shadow-lg shadow-orange-100">

    <div class="absolute -top-5 -right-5 w-24 h-24 bg-orange-200/40 rounded-full blur-2xl"></div>

    <div class="relative z-10">

      <div class="w-14 h-14 rounded-2xl bg-orange-500 text-white flex items-center justify-center text-2xl shadow-lg shadow-orange-200">
        👨
      </div>

      <p class="text-slate-500 text-sm font-medium mt-4">
        Total Jukir
      </p>

      <h2 id="totalJukir"
      class="text-4xl font-black mt-1 text-orange-600">
        0
      </h2>

    </div>

  </div>


  <!-- JUKIR AKTIF -->
  <div class="relative overflow-hidden rounded-[32px] p-5 bg-gradient-to-br from-emerald-100 via-green-50 to-white border border-emerald-200 shadow-lg shadow-emerald-100">

    <div class="absolute -bottom-6 -right-6 w-28 h-28 bg-emerald-200/40 rounded-full blur-2xl"></div>

    <div class="relative z-10">

      <div class="w-14 h-14 rounded-2xl bg-emerald-500 text-white flex items-center justify-center text-2xl shadow-lg shadow-emerald-200">
        ✅
      </div>

      <p class="text-slate-500 text-sm font-medium mt-4">
        Jukir Aktif
      </p>

      <h2 id="aktifJukir"
      class="text-4xl font-black mt-1 text-emerald-600">
        0
      </h2>

    </div>

  </div>


  <!-- TARGET -->
  <div class="relative overflow-hidden rounded-[32px] p-5 bg-gradient-to-br from-cyan-100 via-sky-50 to-white border border-cyan-200 shadow-lg shadow-cyan-100">

    <div class="absolute -top-6 -left-6 w-28 h-28 bg-cyan-200/40 rounded-full blur-2xl"></div>

    <div class="relative z-10">

      <div class="w-14 h-14 rounded-2xl bg-cyan-500 text-white flex items-center justify-center text-2xl shadow-lg shadow-cyan-200">
        💰
      </div>

      <p class="text-slate-500 text-sm font-medium mt-4">
        Target Bulanan
      </p>

      <h2 id="belumSetor"
      class="text-2xl font-black mt-1 text-cyan-700 break-words">
        0
      </h2>

    </div>

  </div>


  <!-- RUAS -->
  <div class="relative overflow-hidden rounded-[32px] p-5 bg-gradient-to-br from-pink-100 via-rose-50 to-white border border-pink-200 shadow-lg shadow-pink-100">

    <div class="absolute -bottom-6 -left-6 w-28 h-28 bg-pink-200/40 rounded-full blur-2xl"></div>

    <div class="relative z-10">

      <div class="w-14 h-14 rounded-2xl bg-pink-500 text-white flex items-center justify-center text-2xl shadow-lg shadow-pink-200">
        🛣️
      </div>

      <p class="text-slate-500 text-sm font-medium mt-4">
        Ruas Jalan
      </p>

      <h2 id="wilayah"
      class="text-lg font-black mt-1 text-pink-700 leading-snug">
        -
      </h2>

    </div>

  </div>



    </div>

    <!-- PROFILE -->
    <div class="glass rounded-[30px] p-5 mb-6">

      <div class="flex items-center gap-4">

        <div class="w-16 h-16 rounded-3xl bg-cyan-100 flex items-center justify-center text-3xl">
          👮
        </div>

        <div>
          <h2 id="namaPengawas"
          class="text-2xl font-bold"></h2>

          <p class="text-slate-500 text-sm mt-1">
            Pengawas Lapangan Parkir
          </p>
        </div>

      </div>

    </div>

    <!-- TABLE -->
    <div class="glass rounded-[30px] p-5">

      <div class="flex items-center justify-between mb-5">

        <h2 class="text-xl font-bold">
          Data Petugas Parkir
        </h2>

        <div class="text-sm text-slate-500">
          Monitoring Hari Ini
        </div>

      </div>
      <!-- TAMBAHKAN DI ATAS TABLE -->

<div class="mb-5">

  <div class="relative">

    <input
    type="text"
    id="searchJukir"
    placeholder="Cari nama jukir..."
    class="w-full bg-white/80 border border-slate-200 rounded-3xl py-4 pl-14 pr-5 outline-none focus:border-cyan-400 transition">

    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400">
      🔍
    </div>

  </div>

</div>
      <!-- DESKTOP -->
      <div class="hidden md:block overflow-auto">

        <table class="w-full min-w-[1000px]">

          <thead>
            <tr class="border-b border-slate-200 text-sm">

              <th class="text-left py-3">Nama</th>
              <th class="text-left py-3">Lokasi</th>
              <th class="text-left py-3">Januari</th>
              <th class="text-left py-3">Februari</th>
              <th class="text-left py-3">Maret</th>
              <th class="text-left py-3">April</th>
              <th class="text-left py-3">Mei</th>
              <th class="text-left py-3">Status</th>

            </tr>
          </thead>

          <tbody id="tablePetugas"></tbody>

        </table>

      </div>

      <!-- MOBILE -->
      <div id="mobilePetugas"
      class="md:hidden space-y-4"></div>

    </div>

  </div>

</div>

<!-- MODAL -->
<div id="modalDetail"
class="hidden fixed inset-0 z-50 bg-black/40 backdrop-blur-sm p-4 overflow-y-auto">

  <div class="min-h-screen flex items-center justify-center">

    <div class="glass rounded-[32px] w-full max-w-md p-5">

      <div class="flex items-center justify-between mb-5">

        <div>
          <h2 class="text-xl font-bold">
            Detail Jukir
          </h2>

          <p class="text-slate-500 text-sm">
            Monitoring Pengawasan
          </p>
        </div>

        <button onclick="closeModal()"
        class="w-10 h-10 rounded-2xl bg-slate-100 hover:bg-slate-200 transition">
          ✕
        </button>

      </div>

      <!-- DETAIL -->
      <div class="space-y-4 mb-5">

        <div class="bg-white/70 rounded-3xl p-4 border border-slate-100">
          <p class="text-slate-500 text-xs mb-1">
            Nama Petugas
          </p>

          <h2 id="dNama"
          class="font-bold text-lg"></h2>
        </div>

        <div class="bg-white/70 rounded-3xl p-4 border border-slate-100">
          <p class="text-slate-500 text-xs mb-1">
            Lokasi
          </p>

          <h2 id="dLokasi"
          class="font-semibold"></h2>
        </div>

        <div class="bg-white/70 rounded-3xl p-4 border border-slate-100">
          <p class="text-slate-500 text-xs mb-1">
            Status
          </p>

          <div id="dStatus"></div>
        </div>

      </div>

      <!-- BUTTON -->
      <button
      onclick="showPengawasanForm()"
      class="w-full bg-emerald-500 hover:bg-emerald-600 transition py-4 rounded-3xl font-semibold text-white">

        Sudah Dilakukan Pengawasan

      </button>

      <!-- FORM -->
      <div id="formPengawasan"
      class="hidden mt-5">

        <div class="bg-white/70 border border-slate-100 rounded-[30px] p-4">

          <label class="block text-sm font-semibold mb-3 text-slate-700">
            Upload Bukti Pengawasan
          </label>

          <!-- UPLOAD -->
          <label
          class="relative flex flex-col items-center justify-center border-2 border-dashed border-cyan-200 hover:border-cyan-400 transition rounded-[28px] p-6 cursor-pointer bg-cyan-50/60">

            <input
            type="file"
            id="filePengawasan"
            accept="image/*"
            class="hidden">

            <div id="uploadIcon">

              <div class="w-16 h-16 rounded-3xl bg-cyan-100 flex items-center justify-center mb-4 text-3xl">
                📸
              </div>

              <h2 class="font-bold text-slate-700 text-center">
                Upload Foto Pengawasan
              </h2>

              <p class="text-sm text-slate-500 mt-1 text-center">
                JPG, PNG atau Foto Kamera
              </p>

            </div>

            <!-- PREVIEW -->
            <div id="previewWrapper"
            class="hidden w-full">

              <img
              id="previewImage"
              class="w-full h-64 object-cover rounded-3xl border border-slate-200">

            </div>

          </label>

          <!-- FILE NAME -->
          <div id="fileName"
          class="hidden mt-3 text-sm text-slate-600 font-medium"></div>

          <!-- CATATAN -->
          <div class="mt-4">

            <label class="block text-sm font-semibold mb-3 text-slate-700">
              Catatan Pengawasan
            </label>

            <textarea
            rows="4"
            placeholder="Tulis hasil pengawasan..."
            class="w-full rounded-3xl border border-slate-200 bg-white/80 p-4 outline-none focus:border-cyan-400 resize-none"></textarea>

          </div>

          <!-- BUTTON -->
          <button
          class="w-full mt-5 bg-cyan-500 hover:bg-cyan-600 text-white transition py-4 rounded-3xl font-semibold shadow-lg shadow-cyan-100">

            Simpan Pengawasan

          </button>

        </div>

      </div>

    </div>

  </div>

</div>

<script>

const dataPengawas = <?= json_encode($petugas); ?>;


// INIT
$(document).ready(function(){

  // AMBIL NAMA PENGAWAS UNIQUE
  const uniquePengawas = [...new Set(
    dataPengawas.map(item => item.nama_pengawas)
  )];

  // MASUKKAN KE DROPDOWN
  uniquePengawas.forEach(namaPengawas => {

    $('#pengawasSelect').append(`
      <option value="${namaPengawas}">
        ${namaPengawas}
      </option>
    `);

  });

  $('#pengawasSelect').select2({
    placeholder:'Cari Pengawas...',
    width:'100%'
  });

});


// CHANGE
$('#pengawasSelect').on('change', function(){

  const namaPengawas = $(this).val();

  if(namaPengawas == ''){
    $('#infoPengawas').addClass('hidden');
    return;
  }

  // FILTER BERDASARKAN NAMA PENGAWAS
  const petugasPengawas = dataPengawas.filter(x =>
    x.nama_pengawas == namaPengawas
  );

  $('#infoPengawas').removeClass('hidden');

  // INFO HEADER
  $('#namaPengawas').text(namaPengawas);

  $('#wilayah').text(
    [...new Set(petugasPengawas.map(x => x.lokasi))]
    .join(', ')
  );

  $('#totalJukir').text(
    petugasPengawas.length
  );

  $('#aktifJukir').text(
    petugasPengawas.filter(x => x.aktif == 1).length
  );

  // TOTAL TARGET
  const totalTarget = petugasPengawas.reduce((total,item) => {
    return total + Number(item.target || 0);
  },0);

  $('#belumSetor').text(
    'Rp ' + totalTarget.toLocaleString('id-ID')
  );

  let table = '';
  let mobile = '';

  const keyword = $('#searchJukir').val()?.toLowerCase() || '';

  function rupiah(angka){

    if(angka == 0 || angka == null) return '-';

    return 'Rp ' + Number(angka).toLocaleString('id-ID');
  }

  // FILTER SEARCH
  const filteredPetugas = petugasPengawas.filter(p =>
    p.nama.toLowerCase().includes(keyword)
  );

  filteredPetugas.forEach(p => {

    let badge = '';

    if(p.aktif == 1){

      badge = `
        <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-xl text-xs font-semibold">
          Aktif
        </span>
      `;

    }else{

      badge = `
        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-xl text-xs font-semibold">
          Nonaktif
        </span>
      `;
    }

    // DESKTOP
    table += `
      <tr class="border-b border-slate-100">

        <td class="py-4 font-semibold">
          ${p.nama}
        </td>

        <td class="py-4 text-slate-600">
          ${p.lokasi ?? '-'}
        </td>

        <td class="py-4">
          ${rupiah(p.target || 0)}
        </td>

        <td class="py-4">
          ${rupiah(p.sisa_setoran || 0)}
        </td>

        <td class="py-4">
          ${rupiah(p.target_aspri || 0)}
        </td>

        <td class="py-4">
          ${rupiah(p.pengawasan || 0)}
        </td>

        <td class="py-4">
          ${rupiah(p.kesepakatan || 0)}
        </td>

        <td class="py-4">
          ${badge}
        </td>

      </tr>
    `;

    // MOBILE
    mobile += `
      <div class="glass rounded-[28px] p-4">

        <div class="flex items-start justify-between gap-3 mb-4">

          <div>
            <h2 class="font-bold text-lg">
              ${p.nama}
            </h2>

            <p class="text-slate-500 text-sm mt-1">
              ${p.lokasi ?? '-'}
            </p>
          </div>

          ${badge}

        </div>

        <div class="grid grid-cols-2 gap-3">

          <div class="bg-white/70 rounded-2xl p-3 border border-slate-100">
            <p class="text-slate-500 text-xs">Target</p>
            <h2 class="font-semibold mt-1">
              ${rupiah(p.target || 0)}
            </h2>
          </div>

          <div class="bg-white/70 rounded-2xl p-3 border border-slate-100">
            <p class="text-slate-500 text-xs">Sisa Setoran</p>
            <h2 class="font-semibold mt-1">
              ${rupiah(p.sisa_setoran || 0)}
            </h2>
          </div>

          <div class="bg-white/70 rounded-2xl p-3 border border-slate-100">
            <p class="text-slate-500 text-xs">Target Aspri</p>
            <h2 class="font-semibold mt-1">
              ${rupiah(p.target_aspri || 0)}
            </h2>
          </div>

          <div class="bg-white/70 rounded-2xl p-3 border border-slate-100">
            <p class="text-slate-500 text-xs">Pengawasan</p>
            <h2 class="font-semibold mt-1">
              ${rupiah(p.pengawasan || 0)}
            </h2>
          </div>

          <div class="bg-white/70 rounded-2xl p-3 border border-slate-100 col-span-2">
            <p class="text-slate-500 text-xs">Kesepakatan</p>
            <h2 class="font-semibold mt-1">
              ${rupiah(p.kesepakatan || 0)}
            </h2>
          </div>

        </div>

        <button
        onclick="detailPetugas(
          '${p.nama}',
          '${p.lokasi}',
          '${p.aktif}'
        )"
        class="w-full mt-4 bg-cyan-500 hover:bg-cyan-600 text-white py-3 rounded-2xl font-semibold transition">

          Detail

        </button>

      </div>
    `;
  });

  $('#tablePetugas').html(table);

  $('#mobilePetugas').html(mobile);

});


// SEARCH
$('#searchJukir').off('keyup').on('keyup', function(){

  $('#pengawasSelect').trigger('change');

});


// MODAL
function detailPetugas(nama,lokasi,status){

  $('#modalDetail').removeClass('hidden');

  $('#dNama').text(nama);

  $('#dLokasi').text(lokasi);

  let badge = '';

  if(status == 1){

    badge = `
      <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-xl text-xs font-semibold">
        Aktif
      </span>
    `;

  }else{

    badge = `
      <span class="bg-red-100 text-red-700 px-3 py-1 rounded-xl text-xs font-semibold">
        Nonaktif
      </span>
    `;
  }

  $('#dStatus').html(badge);

  $('#formPengawasan').addClass('hidden');

}

function closeModal(){

  $('#modalDetail').addClass('hidden');

}

function showPengawasanForm(){

  $('#formPengawasan').removeClass('hidden');

}


// PREVIEW IMAGE
$(document).on('change','#filePengawasan', function(e){

  const file = e.target.files[0];

  if(!file) return;

  $('#fileName')
  .removeClass('hidden')
  .text(file.name);

  const reader = new FileReader();

  reader.onload = function(ev){

    $('#previewWrapper').removeClass('hidden');

    $('#previewImage').attr('src', ev.target.result);

    $('#uploadIcon').addClass('hidden');

  }

  reader.readAsDataURL(file);

});

</script>
</body>
</html>