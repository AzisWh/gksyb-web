<div id="tfDialog" class="fixed inset-0 z-30 flex items-center justify-center backdrop-blur-sm " style="display:none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
            <button type="button" onclick="modalHide()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <h2 id="modalTitle" class="text-lg font-bold mb-4">Tambah Trasfer Bank</h2>
            <form id="tfForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.donasi.transfer.store') }}">
                @csrf

                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" name="id" id="tf_id">

                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Nama Bank</label>
                    <input id="nama_bank" type="text" name="nama_bank"
                        class="w-full border rounded px-3 py-2 text-sm" required>
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Nomor Rekening</label>
                    <textarea id="nomor_rekening" name="nomor_rekening"
                        class="w-full border rounded px-3 py-2 text-sm" rows="2" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Atas Nama</label>
                    <textarea id="atas_nama" name="atas_nama"
                        class="w-full border rounded px-3 py-2 text-sm" rows="2"></textarea>
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Kode Bank</label>
                    <input id="kode_bank" type="number" name="kode_bank"
                        class="w-full border rounded px-3 py-2 text-sm" required>
                </div>

                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="modalHide()"
                        class="px-4 py-2 rounded bg-gray-100">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-4 py-2 rounded bg-secondary text-white">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>