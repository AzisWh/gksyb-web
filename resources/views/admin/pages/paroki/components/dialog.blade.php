<div
    id="dialog"
    class="fixed inset-0 z-40 flex items-center justify-center backdrop-blur-sm"
    style="display: none;"
>
    <div class="bg-white w-full max-w-lg p-5 rounded-lg relative shadow-lg">

        <!-- Close Button -->
        <button
            type="button"
            onclick="hide()"
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-800"
        >
            ✖
        </button>

        <!-- Title -->
        <h3
            id="titleDialog"
            class="text-lg font-semibold mb-4"
        >
            Tambah Pastor
        </h3>

        <!-- Form -->
        <form
            id="formPastor"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <input type="hidden" name="_method" id="method" value="POST">
            <input type="hidden" id="id">

            <!-- Nama Pastor -->
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">
                    Nama Pastor
                </label>
                <input
                    id="nama_pastor"
                    name="nama_pastor"
                    type="text"
                    class="w-full border rounded p-2 focus:outline-none focus:ring focus:ring-blue-200"
                    required
                >
            </div>

            <!-- Jabatan -->
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">
                    Jabatan
                </label>
                <input
                    id="jabatan"
                    name="jabatan"
                    type="text"
                    class="w-full border rounded p-2 focus:outline-none focus:ring focus:ring-blue-200"
                    required
                >
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="block text-sm font-medium mb-2">
                    Status
                </label>

                <div class="flex items-center gap-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input
                            id="status_aktif"
                            type="radio"
                            name="status"
                            value="1"
                            class="text-blue-600 focus:ring-blue-500"
                            checked
                        >
                        <span>Aktif</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input
                            id="status_nonaktif"
                            type="radio"
                            name="status"
                            value="0"
                            class="text-blue-600 focus:ring-blue-500"
                        >
                        <span>Nonaktif</span>
                    </label>
                </div>
            </div>


            <!-- Foto Pastor -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">
                    Foto Pastor
                </label>

                <input
                    type="file"
                    name="foto_pastor"
                    accept="image/*"
                    onchange="previewFoto(event)"
                    class="w-full border rounded p-2"
                >

                <img
                    id="preview"
                    class="w-40 mt-3 rounded hidden"
                >
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-2">
                <button
                    type="button"
                    onclick="hide()"
                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="px-4 py-2 bg-secondary text-white rounded hover:opacity-90"
                >
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
