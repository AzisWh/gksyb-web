{{-- MODAL DETAIL --}}
<div id="modalDetail"
     class="fixed inset-0 z-50 hidden items-center justify-center backdrop-blur-sm">

<div class="bg-white w-full max-w-lg p-5 rounded-lg relative">

<h3 class="font-semibold mb-3">Detail Pesan</h3>

<div class="space-y-2 text-sm">
    <div>Email: <b id="d_email"></b></div>
    <div>Telepon: <b id="d_telp"></b></div>
    <div>Status: <b id="d_status"></b></div>
    <div>Tanggal: <b id="d_tgl"></b></div>

    <div class="mt-2">
        <div class="text-xs text-gray-500">Isi Pesan</div>
        <div id="d_pesan"></div>
    </div>
</div>

<button onclick="hideDetail()" class="mt-3 bg-gray-200 px-3 py-1 rounded">
Tutup
</button>

</div>
</div>

{{-- MODAL UPDATE --}}
<div id="modalEdit"
     class="fixed inset-0 z-50 hidden items-center justify-center backdrop-blur-sm">

<div class="bg-white w-full max-w-md p-5 rounded-lg">

<h3 class="font-semibold mb-3">Update Status</h3>

<form id="formStatus" method="POST">
@csrf
@method('PATCH')

<select name="status" id="e_status"
class="w-full border p-2 rounded mb-3">

<option value="baru">Baru</option>
<option value="diterima">Diterima</option>
<option value="gagal">Ditindaklanjuti</option>

</select>

<div class="flex justify-end gap-2">
<button type="button" onclick="hideEdit()" class="bg-gray-200 px-3 py-1 rounded">
Batal
</button>

<button class="bg-secondary text-white px-3 py-1 rounded">
Simpan
</button>
</div>

</form>

</div>
</div>


