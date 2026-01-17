<div id="qrDialog"
    class="fixed inset-0 z-30 flex items-center justify-center backdrop-blur-sm"
    style="display:none;">

    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">

        {{-- CLOSE --}}
        <button type="button"
            onclick="qrHide()"
            class="absolute top-3 right-3 text-gray-400 hover:text-gray-700">

            <svg xmlns="http://www.w3.org/2000/svg"
                width="22" height="22"
                fill="none" viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <h2 id="qrTitle"
            class="text-lg font-bold mb-4">
            Tambah QR Code
        </h2>

        <form id="qrForm"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            {{-- spoof method --}}
            <input type="hidden"
                name="_method"
                id="qrMethod"
                value="POST">

            <input type="hidden"
                id="qr_id"
                name="qr_id">

            {{-- NAMA METODE --}}
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">
                    Nama Metode
                </label>

                <input
                    id="nama_metode"
                    type="text"
                    name="nama_metode"
                    placeholder="Contoh: QRIS BCA / Dana"
                    class="w-full border rounded px-3 py-2 text-sm
                        focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">
                    Deskripsi
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    placeholder="Opsional..."
                    class="w-full border rounded px-3 py-2 text-sm
                        focus:outline-none focus:ring focus:border-blue-300"
                    rows="2"></textarea>
            </div>

            {{-- UPLOAD IMAGE --}}
            <div class="mb-3">

                <label class="block text-sm font-medium mb-1">
                    Gambar QR Code
                </label>

                <input
                    id="qr_img"
                    type="file"
                    name="qr_img"
                    accept="image/*"
                    onchange="previewQr(event)"
                    class="w-full border rounded px-3 py-2 text-sm">

                <div class="mt-3 flex justify-center">
                    <img id="qrPreview" src="" class="w-48 h-48 object-contain border rounded hidden">
                </div>

                <p class="text-xs text-gray-400 mt-1">
                    Format: jpg, png, jpeg, svg (max 2MB)
                </p>

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-2 mt-4">

                <button type="button"
                    onclick="qrHide()"
                    class="px-4 py-2 rounded
                        bg-gray-100 text-gray-700
                        hover:bg-gray-200">

                    Batal
                </button>

                <button type="submit"
                    class="px-4 py-2 rounded
                        bg-secondary text-white
                        font-semibold">

                    Simpan
                </button>

            </div>

        </form>

    </div>
</div>

<script>
    function previewQr(event){

        const img = document.getElementById('qrPreview');

        img.classList.remove('hidden');

        const reader = new FileReader();

        reader.onload = function(){
            img.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    }

    function qrHide(){
        document.getElementById('qrDialog').style.display = 'none';
        document.getElementById('qrPreview').classList.add('hidden');
    }
</script>
