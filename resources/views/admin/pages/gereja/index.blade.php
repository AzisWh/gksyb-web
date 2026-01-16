@extends('layout.admin')

@section('title', 'Profile Gereja')

@section('content')
<div class="flex flex-col justify-start text-left fs-style-manrope py-4">
    <h1 class="text-lg">Profil Gereja</h1>
    <p class="text-sm">Kelola informasi profil Gereja Santo Yusup Bintaran</p>

    <div class="flex justify-start mt-4">
        <button
            id="btnEdit"
            onclick="toggleEdit(true)"
            class="px-4 py-2 text-sm rounded-lg text-white"
            style="background:#4a0d0d">
            {{ $profil ? 'Edit Profil' : 'Tambah Profil' }}
        </button>

        @if ($profil)
            <button
                id="btnDelete"
                onclick="confirmDelete({{ $profil->id }})"
                class="px-4 py-2 text-sm rounded-lg text-white bg-red-600 ml-6">
                Hapus Profil
            </button>

            <form id="deleteForm-{{ $profil->id }}"
                action="{{ route('admin.gereja.destroy', $profil->id) }}"
                method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        @endif
    </div>
</div>

<div class="bg-white border border-gray-200 shadow rounded-xl fs-style-manrope">
    <div class="max-w-5xl mx-auto p-6">
        {{-- view mode --}}
        <div id="viewMode">

            <div class="flex flex-col">
                <h3 class="font-semibold">Galeri Gambar Gereja (untuk carousel)</h3>
                <p class="text-sm text-gray-500">Maksimal 5 gambar. Ukuran disarankan 1200x800 px</p>
            </div>

            <div class="flex flex-col gap-4 mb-6">
                @php $no = 1; @endphp

                @forelse($profil['galeri'] ?? [] as $index => $img)
                    <div class="flex items-center gap-4 border border-gray-200 rounded-xl p-4">
                        <div class="w-12 h-12 bg-[#5A0A0A] text-white rounded-lg flex items-center justify-center font-bold text-lg">
                            {{ $no++ }}
                        </div>

                        <div class="w-28 h-20 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">
                            <img src="/storage/{{ $img['file'] }}" class="object-cover w-full h-full">
                        </div>

                        <div class="flex flex-col">
                            <h3 class="text-[#3A0D0D] font-medium">
                               {{ $img['caption'] ?? 'Keterangan belum diisi' }}
                            </h3>
                            <p class="text-gray-400 text-sm">Gambar tersedia</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400">Belum ada gambar</p>
                @endforelse
            </div>

            <h3 class="font-semibold">Deskripsi Gereja</h3>
            <p class="text-gray-600 mb-4">{{ $profil['deskripsi'] ?? '-' }}</p>

            <h3 class="font-semibold">Sejarah</h3>
            <p class="text-gray-600 mb-4">{{ $profil['sejarah'] ?? '-' }}</p>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <h3 class="font-semibold">Visi</h3>
                    <p class="text-gray-600">{{ $profil['visi'] ?? '-' }}</p>
                </div>

                <div>
                    <h3 class="font-semibold">Misi</h3>
                    <ul class="list-disc pl-5 text-gray-600">
                        @foreach($profil['misi'] ?? [] as $m)
                            <li>{{ $m }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-6">
                <h3 class="font-semibold">Informasi Kontak</h3>

                <div class="flex flex-col">
                    <h3 class="text-gray-600">Alamat</h3>
                    <p>{{ $profil['alamat'] ?? '-' }}</p>
                </div>

                <div class="flex flex-col md:flex-row md:justify-between mt-4">
                    <div>
                        <h3 class="text-gray-600">Telepon</h3>
                        <p>{{ $profil['telepon'] ?? '-' }}</p>
                    </div>

                    <div>
                        <h3 class="text-gray-600">Email</h3>
                        <p>{{ $profil['email'] ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <h3 class="font-semibold">Lokasi Peta</h3>
                <iframe class="w-full h-64 rounded-lg"
                        src="{{ $profil['maps'] ?? '-' }}"></iframe>
            </div>

        </div>
        {{-- edit --}}
        <form id="editMode" class="hidden mt-6"
              method="POST"
              enctype="multipart/form-data"
              action="{{ $profil ? route('admin.gereja.update', $profil->id) : route('admin.gereja.store') }}">

            @csrf

            <h3 class="font-semibold mb-2">Galeri Gambar</h3>
            <div id="editGallery" class="flex flex-col gap-4">
                @php $no = 1; @endphp
                @foreach($profil['galeri'] ?? [] as $index => $img)
                    <div class="flex items-center gap-4 border border-gray-200 rounded-xl p-4">
                        <div class="w-12 h-12 bg-[#5A0A0A] text-white rounded-lg flex items-center justify-center font-bold text-lg">
                            {{ $no++ }}
                        </div>

                        <div class="w-28 h-20 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">
                            <img src="/storage/{{ $img['file'] }}" class="object-cover w-full h-full">
                        </div>

                        <div class="flex flex-col">
                            <input type="text"
                                   name="keterangan_lama[]"
                                   value="{{ $img['caption'] ?? '' }}"
                                   class="border p-1 rounded text-sm text-[#3A0D0D]" placeholder="Masukkan keterangan gambar">
                            <p class="text-gray-400 text-sm">Gambar lama</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="newImages"></div>

            <button type="button"
                    onclick="openAddModal()"
                    class="mt-2 px-3 py-1 text-sm rounded bg-blue-100 text-blue-700">
                + Tambah Gambar
            </button>

            <div class="mt-6">
                <h3 class="font-semibold">Deskripsi Gereja</h3>
                <textarea name="deskripsi" class="w-full border rounded p-2" placeholder="deskripsi">{{ $profil['deskripsi'] ?? '' }}</textarea>
            </div>

            <div class="mt-4">
                <h3 class="font-semibold">Sejarah</h3>
                <textarea name="sejarah" class="w-full border rounded p-2" placeholder="sejarah">{{ $profil['sejarah'] ?? '' }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-6 mt-4">
                <div>
                    <h3 class="font-semibold">Visi</h3>
                    <input name="visi" type="text"
                            placeholder="Masukkan visi gereja"
                           value="{{ $profil['visi'] ?? '' }}"
                           class="w-full border rounded p-2">
                </div>

                <div>
                    <h3 class="font-semibold">Misi</h3>
                    <div id="misiList" class="flex flex-col gap-2">
                        @foreach($profil['misi'] ?? [] as $m)
                            <div class="flex gap-2">
                                <input type="text" name="misi[]" value="{{ $m }}" class="w-full border rounded p-2" placeholder="Tambah misi baru">
                                <button type="button" onclick="this.parentElement.remove()" class="text-red-500">X</button>
                            </div>
                        @endforeach
                    </div>

                    <button type="button"
                            onclick="addMisi()"
                            class="mt-2 px-2 py-1 text-xs bg-gray-100 rounded" placeholder="Tambah misi baru">
                        + Tambah Misi
                    </button>
                </div>
            </div>

            <div class="mt-6">
                <h3 class="font-semibold">Informasi Kontak</h3>

                <label class="text-gray-600">Alamat</label>
                <textarea name="alamat" placeholder="jalan xxxxxxxx" class="w-full border rounded p-2">{{ $profil['alamat'] ?? '' }}</textarea>

                <div class="flex flex-col md:flex-row md:justify-between mt-4 w-full gap-6">
                    <div class="w-full">
                        <label class="text-gray-600">Telepon</label>
                        <input name="telepon" class="w-full border rounded p-2"  value="{{ $profil['telepon'] ?? '' }}" placeholder="0812xxxxxxx">
                    </div>

                    <div class="w-full">
                        <label class="text-gray-600">Email</label>
                        <input name="email" class="w-full border rounded p-2" value="{{ $profil['email'] ?? '' }}" placeholder="email@example.com">
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <h3 class="font-semibold">Lokasi Peta</h3>
                <input type="text" name="maps" class="w-full border rounded p-2" placeholder="https:google.maps"
                       value="{{ $profil['maps'] ?? '' }}">
            </div>

            <div class="flex gap-3 mt-6">
                <button type="submit" class="px-4 py-2 rounded text-white bg-secondary">
                    Simpan
                </button>

                <button type="button" onclick="toggleEdit(false)" class="px-4 py-2 rounded bg-gray-200">
                    Batal
                </button>
            </div>

        </form>

    </div>
</div>

    @include('admin.pages.gereja.components.dialog')
@endsection


@push('script')
<script>
    let maxImages = 5;

    function toggleEdit(edit) {
        document.getElementById('viewMode').classList.toggle('hidden', edit);
        document.getElementById('editMode').classList.toggle('hidden', !edit);
        document.getElementById('btnEdit').classList.toggle('hidden', edit);
    }

    function openAddModal() {
        document.getElementById('addImageModal').classList.remove('hidden');
    }

    function closeAddModal() {
        document.getElementById('addImageModal').classList.add('hidden');
    }

    function addMisi() {
        document.getElementById('misiList').insertAdjacentHTML('beforeend', `
            <div class="flex gap-2">
                <input type="text" name="misi[]" class="w-full border rounded p-2">
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500">X</button>
            </div>
        `);
    }

    function addImageToEdit() {
        const caption = document.getElementById('modalCaption').value;
        const imgInput = document.getElementById('modalImage');

        if (!caption || imgInput.files.length === 0) {
            alert("Caption dan gambar wajib diisi");
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            const container = document.getElementById('editGallery');
            const newImages = document.getElementById('newImages');

            if (container.children.length >= maxImages) {
                alert("Maksimal 5 gambar");
                return;
            }

            const card = document.createElement("div");
            card.className = "flex items-center gap-4 border border-gray-200 rounded-xl p-4";
            card.innerHTML = `
                <div class="w-12 h-12 bg-[#5A0A0A] text-white rounded-lg flex items-center justify-center font-bold text-lg">
                    ${container.children.length + 1}
                </div>

                <div class="w-28 h-20 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">
                    <img src="${e.target.result}" class="object-cover w-full h-full">
                </div>

                <div class="flex flex-col">
                    <input type="text"
                        value="${caption}"
                        class="border p-1 rounded text-sm text-[#3A0D0D]">
                    <p class="text-gray-400 text-sm">Gambar baru</p>
                </div>
            `;
            container.appendChild(card);

            const fileInput = document.createElement('input');
            fileInput.type = "file";
            fileInput.hidden = true;
            fileInput.name = "gambar_baru[]";

            let dt = new DataTransfer();
            dt.items.add(imgInput.files[0]);
            fileInput.files = dt.files;

            const captionInput = document.createElement('input');
            captionInput.type = "text";
            captionInput.hidden = true;
            captionInput.name = "keterangan_baru[]";
            captionInput.value = caption;

            newImages.appendChild(fileInput);
            newImages.appendChild(captionInput);

            closeAddModal();
        };

        reader.readAsDataURL(imgInput.files[0]);
    }

    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus Profil?',
            text: "Data profil gereja akan hilang permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4A0D0D',
            cancelButtonColor: '#999',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + id).submit();
            }
        });
    }
</script>
@endpush