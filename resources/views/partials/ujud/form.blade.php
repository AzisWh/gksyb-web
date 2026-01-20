<div class="fs-style-manrope p-6 max-w-3xl mx-auto">

    <div class="flex flex-col gap-2 text-center mb-6">
        <h2 class="text-2xl font-semibold ">
            Formulir Permohonan Intensi dan Ujud Doa
        </h2>
        <p>Sampaikan ujud dan intensi doa Anda agar dapat didoakan bersama dalam Perayaan Ekaristi Mingguan.</p>
    </div>

    @include('sweetalert::alert')

    <div class="p-3 border rounded-md">
        <form action="{{ route('landing.ujud.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-4">

                <div>
                    <label class="text-sm font-semibold">Nama</label>
                    <input
                        name="nama"
                        value="{{ old('nama') }}"
                        class="border w-full p-2 rounded"
                        required
                    />
                </div>

                <div>
                    <label class="text-sm font-semibold">Nomor Telepon</label>
                    <input
                        name="nomor_telepon"
                        value="{{ old('nomor_telepon') }}"
                        class="border w-full p-2 rounded"
                        required
                    />
                </div>

                <div>
                    <label class="text-sm font-semibold">Asal Paroki</label>
                    <input
                        name="asal_paroki"
                        value="{{ old('asal_paroki') }}"
                        class="border w-full p-2 rounded"
                        required
                    />
                </div>

                <div>
                    <label class="text-sm font-semibold">Asal Lingkungan</label>
                    <input
                        name="asal_lingkungan"
                        value="{{ old('asal_lingkungan') }}"
                        class="border w-full p-2 rounded"
                        required
                    />
                </div>

                <div>
                    <label class="text-sm font-semibold">Jenis Permohonan</label>

                    <select
                        name="jenis_permohonan"
                        class="border w-full p-2 rounded"
                        required
                    >
                        <option value="">-- Pilih Jenis --</option>
                        <option value="Syukur"
                            {{ old('jenis_permohonan') == 'Syukur' ? 'selected' : '' }}>
                            Syukur
                        </option>

                        <option value="Kesembuhan"
                            {{ old('jenis_permohonan') == 'Kesembuhan' ? 'selected' : '' }}>
                            Kesembuhan
                        </option>

                        <option value="Keluarga"
                            {{ old('jenis_permohonan') == 'Keluarga' ? 'selected' : '' }}>
                            Doa Keluarga
                        </option>

                        <option value="Ujud Pribadi"
                            {{ old('jenis_permohonan') == 'Ujud Pribadi' ? 'selected' : '' }}>
                            Ujud Pribadi
                        </option>

                        <option value="Lainnya"
                            {{ old('jenis_permohonan') == 'Lainnya' ? 'selected' : '' }}>
                            Lainnya
                        </option>
                    </select>
                </div>

                <div>
                    <label class="text-sm font-semibold">Isi Doa</label>

                    <textarea
                        name="isi_doa"
                        class="border w-full p-2 rounded"
                        rows="5"
                        required
                    >{{ old('isi_doa') }}</textarea>
                </div>

            </div>

            <button
                type="submit"
                class="mt-4 px-4 py-2 rounded text-white bg-secondary"
            >
                Kirim Permohonan Doa
            </button>

        </form>
    </div>

</div>