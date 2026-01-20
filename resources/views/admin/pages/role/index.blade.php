@extends('layout.admin')

@section('title', 'Manajemen Role')

@section('content')
<div class="fs-style-manrope">
    <div class="flex justify-between items-start py-4">
        <div>
            <h1 class="text-lg font-semibold">Pengguna & Hak Akses</h1>
            <p class="text-sm text-gray-600">
                Kelola akun admin dan pengaturan hak akses sistem
            </p>
        </div>

        <button 
            onclick="openCreateModal()"
            class="px-4 py-2 bg-secondary text-white rounded hover:opacity-90">
            + Tambah Akun
        </button>
    </div>

    <div class="grid grid-cols-2 gap-6 mb-8">

        <div class="border rounded-lg p-6 flex flex-col gap-2">
            <div class="flex items-center gap-2 mb-2">
                🛡️ <h3 class="font-semibold">Super Admin (Komsos)</h3>
            </div>
            <ul class="text-sm text-gray-700 space-y-1">
                <li>✓ Kelola semua konten dan publikasi</li>
                <li>✓ Kelola dokumen dan media</li>
                <li>✓ Kelola profil gereja dan pastor</li>
                <li>✓ Kelola pesan masuk dan FAQ</li>
                <li>✓ Kelola pengguna dan hak akses</li>
                <li>✓ Pengaturan website</li>
            </ul>
        </div>

        <div class="border rounded-lg p-6 flex flex-col gap-2">
            <div class="flex items-center gap-2 mb-2">
                🛡️ <h3 class="font-semibold">Admin (Sekretariat)</h3>
            </div>
            <ul class="text-sm text-gray-700 space-y-1">
                <li>✓ Kelola jadwal ibadat</li>
                <li>✓ Kelola dokumen paroki</li>
                <li>✓ Kelola panduan perayaan</li>
                <li>✓ Kelola pesan masuk dan FAQ</li>
                <li>✓ Pengaturan website</li>
                <li class="text-red-600">✗ Tidak bisa kelola pengguna</li>
            </ul>
        </div>
    </div>

    <h3 class="font-semibold mb-2">Tabel Super Admin (Komsos)</h3>
    <table class="w-full border mb-8">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">Nama</th>
                <th class="border px-3 py-2">Email</th>
                <th class="border px-3 py-2">Login Terakhir</th>
                <th class="border px-3 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($komsos as $user)
            <tr>
                <td class="border px-3 py-2">{{ $user->name }}</td>
                <td class="border px-3 py-2">{{ $user->email }}</td>
                <td class="border px-3 py-2">
                    @if($user->last_login_at)
                        {{ $user->last_login_at->format('d M Y H:i') }}
                    @else
                        -
                    @endif
                </td>
                <td class="border px-3 py-2 flex gap-2">
                     <button 
                        onclick="openEditModal({{ $user }})"
                        class="px-3 py-1 text-white rounded" style="background-color: #15803D">
                        Edit
                    </button>

                    <form id="form-delete-{{ $user->id }}"
                        action="{{ route('admin.role.delete', $user->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button"
                            onclick="confirmDelete({{ $user->id }})"
                            style="
                                display: inline-flex;
                                align-items: center;
                                gap: 6px;
                                padding: 8px 12px;
                                border-radius: 8px;
                                background-color: #FEECEC;
                                color: #DC2626;
                                font-weight: 500;
                                border: none;
                                cursor: pointer;
                            ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="none" viewBox="0 0 24 24" stroke="#DC2626" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V5a1 1 0 011-1h4a1 1 0 011 1v2"/>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="font-semibold mb-2">Tabel Admin (Sekretariat)</h3>
    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">Nama</th>
                <th class="border px-3 py-2">Email</th>
                <th class="border px-3 py-2">Login Terakhir</th>
                <th class="border px-3 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sekre as $user)
            <tr>
                <td class="border px-3 py-2">{{ $user->name }}</td>
                <td class="border px-3 py-2">{{ $user->email }}</td>
                <td class="border px-3 py-2">
                    {{ $user->last_login_at ?? '-' }}
                </td>
                <td class="border px-3 py-2 flex gap-2">
                    <button 
                        onclick="openEditModal({{ $user }})"
                        class="px-3 py-1 text-white rounded" style="background-color: #15803D">
                        Edit
                    </button>

                    <form id="form-delete-{{ $user->id }}"
                        action="{{ route('admin.role.delete', $user->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button"
                            onclick="confirmDelete({{ $user->id }})"
                            style="
                                display: inline-flex;
                                align-items: center;
                                gap: 6px;
                                padding: 8px 12px;
                                border-radius: 8px;
                                background-color: #FEECEC;
                                color: #DC2626;
                                font-weight: 500;
                                border: none;
                                cursor: pointer;
                            ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="none" viewBox="0 0 24 24" stroke="#DC2626" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V5a1 1 0 011-1h4a1 1 0 011 1v2"/>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="userModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-md p-6 relative">
        <button onclick="closeModal()" class="absolute right-3 top-3">✖</button>

        <h3 id="modalTitle" class="font-semibold mb-4">Tambah User</h3>

        <form id="userForm" method="POST">
            @csrf
            <input type="hidden" id="formMethod" value="store">

            <div class="mb-3">
                <label>Nama</label>
                <input id="name" name="name" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input id="email" name="email" type="email" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <div class="relative">
                    <input id="password" name="password" type="password" class="w-full border p-2 rounded pr-10">
                    <span 
                        onclick="togglePassword()" 
                        class="absolute right-3 top-2 cursor-pointer">
                        👁️
                    </span>
                </div>
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select id="role_type" name="role_type" class="w-full border p-2 rounded">
                    <option value="2">Super Admin (Komsos)</option>
                    <option value="1">Admin (Sekretariat)</option>
                </select>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeModal()" class="px-3 py-2 bg-gray-200 rounded">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-secondary text-white rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    function openCreateModal() {
        document.getElementById('modalTitle').innerText = 'Tambah User';
        document.getElementById('userForm').action = "{{ route('admin.role.store') }}";

        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
        document.getElementById('role_type').value = '1';

        document.getElementById('userModal').classList.remove('hidden');
        document.getElementById('userModal').classList.add('flex');
    }

    function openEditModal(user) {
        document.getElementById('modalTitle').innerText = 'Edit User';
        document.getElementById('userForm').action = `/admin-manajemen-role/update/${user.id}`;

        document.getElementById('name').value = user.name;
        document.getElementById('email').value = user.email;
        document.getElementById('password').value = '';
        document.getElementById('role_type').value = user.role_type;

        document.getElementById('userModal').classList.remove('hidden');
        document.getElementById('userModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('userModal').classList.add('hidden');
        document.getElementById('userModal').classList.remove('flex');
    }

    function togglePassword() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }

    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33'
        }).then(result => {
            if (result.isConfirmed) {
                document.getElementById(`form-delete-${id}`).submit();
            }
        });
    }
</script>
@endsection
