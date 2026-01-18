{{-- MODAL DETAIL --}}
<div id="modalDetail"
     class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">

    <div class="bg-white rounded-lg w-full max-w-lg p-5">

        <div class="flex justify-between items-center mb-3">
            <h3 class="font-semibold text-lg">Detail Doa</h3>

            <button onclick="closeDetail()">
                ✕
            </button>
        </div>

        <div class="space-y-3 text-sm">

            <div>
                <div class="text-xs text-gray-500">Nama</div>
                <div id="detailNama" class="font-medium"></div>
            </div>

            <div>
                <div class="text-xs text-gray-500">Tanggal Doa</div>
                <div id="detailTanggal" class="font-medium"></div>
            </div>

            <div>
                <div class="text-xs text-gray-500">Status</div>
                <div id="detailStatus" class="font-medium"></div>
            </div>

            <div>
                <div class="text-xs text-gray-500">Isi Doa</div>
                <div id="detailIsi" class="font-medium"></div>
            </div>

        </div>

        <div class="mt-4 text-right">
            <button onclick="closeDetail()"
                    class="bg-gray-100 px-4 py-2 rounded text-sm">
                Tutup
            </button>
        </div>

    </div>
</div>


<div id="modalEdit"
     class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">

    <div class="bg-white rounded-lg w-full max-w-md p-5">

        <div class="flex justify-between items-center mb-3">
            <h3 class="font-semibold text-lg">Update Status Doa</h3>

            <button onclick="closeEdit()">
                ✕
            </button>
        </div>

        <form id="formEdit" method="POST">

            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label class="text-xs text-gray-500">Nama</label>

                <input type="text"
                       id="editNama"
                       class="w-full border rounded p-2 text-sm bg-gray-50"
                       readonly>
            </div>

            <div class="mb-3">
                <label class="text-xs text-gray-500">Status</label>

                <select name="status"
                        id="editStatus"
                        class="w-full border rounded p-2 text-sm">

                    <option value="baru">Baru</option>
                    <option value="didoakan">Sudah Didoakan</option>
                    <option value="belum">Belum Didoakan</option>

                </select>
            </div>

            <div class="mt-4 flex justify-end gap-2">

                <button type="button"
                        onclick="closeEdit()"
                        class="bg-gray-100 px-4 py-2 rounded text-sm">
                    Batal
                </button>

                <button type="submit"
                        class="bg-secondary text-white px-4 py-2 rounded text-sm">
                    Simpan
                </button>

            </div>

        </form>

    </div>
</div>
