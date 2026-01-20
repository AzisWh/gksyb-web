<div id="modalBintaran" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-xl p-6">

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Detail Tulisan Bintaran</h3>
            <button onclick="tutupBintaran()" class="text-gray-500">✖</button>
        </div>

        <div class="space-y-3 text-sm">

            <div>
                <p class="text-gray-500">Judul</p>
                <p id="bintaran_judul" class="font-medium"></p>
            </div>

            <div>
                <p class="text-gray-500">Kategori</p>
                <p id="bintaran_kategori"></p>
            </div>

            <div>
                <p class="text-gray-500">Tanggal Dibuat</p>
                <p id="bintaran_tanggal"></p>
            </div>

            <div>
                <p class="text-gray-500">Status</p>
                <span id="bintaran_status" class="px-2 py-1 text-xs rounded"></span>
            </div>

            <div>
                <p class="text-gray-500">Ringkasan</p>
                <p id="bintaran_ringkasan" class="whitespace-pre-line"></p>
            </div>

        </div>

        <div class="flex justify-end mt-6">
            <button onclick="tutupBintaran()" class="px-4 py-2 bg-gray-100 rounded text-sm">
                Tutup
            </button>
        </div>

    </div>
</div>
