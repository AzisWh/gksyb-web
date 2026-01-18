<div
    id="modalJam"
    class="fixed flex inset-0 z-50 hidden items-center justify-center bg-black/50 px-4"
>
    <div class="w-full max-w-lg overflow-hidden rounded-xl bg-white shadow-lg">

        <div class="flex items-center justify-between border-b px-6 py-4">
            <h2 id="modalTitle" class="text-sm font-semibold text-gray-800">
                Tambah Jam Pelayanan
            </h2>
            <button
                type="button"
                onclick="closeModal()"
                class="text-gray-400 hover:text-gray-600"
            >
                ✕
            </button>
        </div>

        <form id="jamForm" method="POST" action="{{ route('admin.kontak.jam.store') }}" class="px-6 py-5 space-y-4">
            @csrf
            <input type="hidden" name="id" id="jam_id">
            <input type="hidden" name="kontak_id" value="{{ $kontak->id ?? 1 }}">
            <input type="hidden" name="_method" id="formMethod">

            {{-- HARI --}}
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Dari Hari <span class="text-red-500">*</span>
                    </label>
                    <select
                        name="hari_dari"
                        id="hari_dari"
                        class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
                    >
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                        <option>Minggu</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Sampai Hari <span class="text-red-500">*</span>
                    </label>
                    <select
                        name="hari_sampai"
                        id="hari_sampai"
                        class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
                    >
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                        <option>Minggu</option>
                    </select>
                </div>
            </div>

            {{-- JAM --}}
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Jam Mulai <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="time"
                        name="jam_mulai"
                        id="jam_mulai"
                        class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
                    >
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Jam Selesai <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="time"
                        id="jam_selesai"
                        name="jam_selesai"
                        class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
                    >
                </div>
            </div>

            {{-- PREVIEW --}}
            <div class="rounded-lg border border-blue-200 bg-blue-50 px-4 py-3 text-sm">
                <p class="mb-1 font-medium text-gray-700">Preview:</p>
                <p class="text-gray-800">
                    Senin – Jumat
                </p>
                <p class="text-gray-600">
                    08.00 WIB – 17.00 WIB
                </p>
            </div>

            {{-- FOOTER --}}
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button
                    type="button"
                    onclick="closeModal()"
                    class="px-4 py-2 text-sm border rounded-lg text-gray-600 hover:bg-gray-50"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2 text-sm font-medium text-white rounded-lg bg-secondary hover:bg-secondary/80"
                >
                    💾 Simpan
                </button>
            </div>
        </form>
    </div>
</div>
