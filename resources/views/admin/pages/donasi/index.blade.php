@extends('layout.admin')

@section('title', 'Data Donasi')

@section('content')
    <div class="fs-style-manrope">
        <div class="flex flex-col justify-start text-left py-4">
            <h1 class="text-lg">Donasi & Sumbangan</h1>
            <p class="text-sm">Kelola metode pembayaran donasi untuk umat (Transfer Bank dan QR Code)</p>
        </div>
        <div class="flex flex-row gap-2">
            <button onclick="openDonasiDialog()" class="bg-secondary p-3 rounded-md text-white text-sm text-center">+ Tambah Transfer Bank</button>
            <button onclick="openQrDialog()" class="bg-secondary p-3 rounded-md text-white text-sm text-center">+ Tambah QR Code</button>
        </div>
        <div class="flex flex-row gap-2 mt-5">
            <img src="{{ asset('assets/gereja.png') }}" class="w-6 h-6" alt="">
            <h3 class="text-lg font-semibold">Transfer Bank</h3>
        </div>

        @forelse ($transfer as $tf)
            <div class="bg-white rounded-lg shadow border p-5 mt-3 flex flex-col gap-2" style="border:1.5px solid #E5E7EB;">
                <div class="flex flex-row justify-between items-start">
                    <div>
                        <div class="font-semibold text-base">{{ $tf->nama_bank }}</div>
                        <div class="text-xs text-gray-500">Kode Bank: {{ $tf->kode_bank }}</div>
                    </div>
                    <div class="flex flex-row gap-2 items-center">
                        <button class="text-gray-500 hover:text-blue-600" title="Edit" onclick='openEditDialog(@json($tf))'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-1.414.586H7v-3a2 2 0 01.586-1.414z" stroke="#707275" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                        <button class="text-red-500 hover:text-red-700" title="Hapus" onclick="confirmDelete({{ $tf->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="none" viewBox="0 0 24 24" stroke="#DC2626" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V5a1 1 0 011-1h4a1 1 0 011 1v2"/>
                                </svg>
                        </button>
                        
                    </div>
                </div>
                <hr class="my-2">
                <div>
                    <div class="text-xs text-gray-400">Nomor Rekening</div>
                    <div class="font-semibold text-md">{{ $tf->nomor_rekening }}</div>
                </div>
                <div class="mt-2">
                    <div class="text-xs text-gray-400">Atas Nama</div>
                    <div class="font-medium">{{ $tf->atas_nama }}</div>
                </div>
            </div>
        @empty
            <div class="bg-transparent rounded-lg shadow border p-5 mt-3 flex flex-col gap-2" style="border:1.5px solid #E5E7EB;">
                <div class="flex flex-row justify-center items-center">
                    <div class="text-gray-500">Belum ada data Transfer Bank.</div>
                </div>
            </div>
        @endforelse        

        <div class="flex flex-row gap-2 mt-5">
            <img src="{{ asset('assets/gereja.png') }}" class="w-6 h-6" alt="">
            <h3 class="text-lg font-semibold">QR Code</h3>
        </div>
        @forelse ($qrcode as $qr)
            <div class="bg-white rounded-lg shadow border p-5 mt-3 flex flex-col gap-2" style="border:1.5px solid #E5E7EB;">
                <div class="flex flex-row justify-between items-start">
                    <div>
                        <div class="font-semibold text-base">{{ $qr->nama_metode }}</div>
                        <div class="text-xs text-gray-500">Kode Bank: {{ $qr->deskripsi }}</div>
                    </div>
                    <div class="flex flex-row gap-2 items-center">
                        <button class="text-gray-500 hover:text-blue-600" title="Edit" onclick='openEditQr(@json($qr))'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-1.414.586H7v-3a2 2 0 01.586-1.414z" stroke="#707275" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>
                        <button class="text-red-500 hover:text-red-700" title="Hapus" onclick="confirmDeleteQr({{ $qr->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="none" viewBox="0 0 24 24" stroke="#DC2626" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V5a1 1 0 011-1h4a1 1 0 011 1v2"/>
                                </svg>
                        </button>
                        
                    </div>
                </div>
                <div class="mt-2">
                    @if($qr->qr_img)
                        <img
                            src="{{ asset($qr->qr_img) }}"
                            class="w-40 h-40 object-contain border rounded"
                        >
                    @else
                        <div class="text-xs text-gray-400">
                            Tidak ada gambar
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-transparent rounded-lg shadow border p-5 mt-3 flex flex-col gap-2" style="border:1.5px solid #E5E7EB;">
                <div class="flex flex-row justify-center items-center">
                    <div class="text-gray-500">Belum ada data QR Code.</div>
                </div>
            </div>
        @endforelse    
    </div>

    @include('admin.pages.donasi.components.tfdialog')
    @include('admin.pages.donasi.components.qrdialog')

    <form id="deleteForm" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('script')
    <script>
        function openDonasiDialog(){
            document.getElementById('modalTitle').innerText = 'Tambah Transfer Bank';
            document.getElementById('tfForm').reset();
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('tfForm').action =
                "{{ route('admin.donasi.transfer.store') }}";

            modalShow();
        }

        function openEditDialog(data){
            document.getElementById('modalTitle').innerText = 'Edit Transfer Bank';
            document.getElementById('tf_id').value = data.id;
            document.getElementById('nama_bank').value = data.nama_bank;
            document.getElementById('nomor_rekening').value = data.nomor_rekening;
            document.getElementById('atas_nama').value = data.atas_nama;
            document.getElementById('kode_bank').value = data.kode_bank;
            document.getElementById('formMethod').value = 'PATCH';

            document.getElementById('tfForm').action =
                "/admin-donasi/transfer/edit/" + data.id;

            modalShow();
        }

        function modalShow() {
            document.getElementById('tfDialog').style.display = 'flex';
        }

        function modalHide() {
            document.getElementById('tfDialog').style.display = 'none';
        }

        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data transfer bank akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {

                    const form = document.getElementById('deleteForm');

                    form.action = "/admin-donasi/transfer/destroy/" + id;

                    form.submit();
                }
            })
        }

        // qr
        function openQrDialog(){
            document.getElementById('qrTitle').innerText = 'Tambah QR Code';
            document.getElementById('qrForm').reset();

            document.getElementById('qrMethod').value = 'POST';

            document.getElementById('qrForm').action =
                "{{ route('admin.donasi.qr.store') }}";

            document.getElementById('qrPreview').src = '';

            qrShow();
        }

        function openEditQr(data){

            document.getElementById('qrTitle').innerText = 'Edit QR Code';

            document.getElementById('qr_id').value = data.id;
            document.getElementById('nama_metode').value = data.nama_metode;
            document.getElementById('deskripsi').value = data.deskripsi ?? '';

            if(data.qr_img){
                const img = document.getElementById('qrPreview');
                img.src = "/" + data.qr_img;
                img.classList.remove('hidden');
            }

            document.getElementById('qrMethod').value = 'PATCH';

            document.getElementById('qrForm').action =
                "/admin-donasi/qr/edit/" + data.id;

            qrShow();
        }

        function confirmDeleteQr(id){

            Swal.fire({
                title: 'Yakin ingin menghapus QR Code?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if(result.isConfirmed){

                    const form =
                        document.getElementById('deleteForm');

                    form.action =
                        "/admin-donasi/qr/destroy/" + id;

                    form.submit();
                }

            })
        }

        function qrShow(){
            document.getElementById('qrDialog')
                .style.display = 'flex';
        }

        function qrHide(){
            document.getElementById('qrDialog')
                .style.display = 'none';
        }

        function previewQr(event){

            const reader = new FileReader();

            reader.onload = function(){
                document.getElementById('qrPreview')
                    .src = reader.result;
            }

            reader.readAsDataURL(
                event.target.files[0]
            );
        }
    </script>
@endpush