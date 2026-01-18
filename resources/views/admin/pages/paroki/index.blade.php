@extends('layout.admin')

@section('title', 'Pastor Paroki')

@section('content')
<div class="fs-style-manrope">

    <div class="flex flex-col justify-start text-left py-4">
        <h1 class="text-lg">Pastor Paroki</h1>
        <p class="text-sm">
            Kelola informasi pastor yang melayani di Paroki Bintaran
        </p>
    </div>

    <div class="flex flex-row gap-2">
        <button onclick="openDialog()"
            class="bg-secondary p-3 rounded-md text-white text-sm text-center">
            + Tambah Pastor
        </button>
    </div>

    <div class="mt-5">
        <h3 class="font-semibold text-green-700 mb-2">
            Pastor Aktif
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">

            @forelse($data->where('status', 1) as $p)

            <div class="bg-white rounded-lg shadow p-4 border">

                <div class="flex justify-between">
                    <div class="font-semibold">
                        {{ $p->nama_pastor }}
                    </div>

                    <div class="flex gap-2">

                        <button onclick='openEdit(@json($p))'
                            class="" style="color: #1D4ED8">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-1.414.586H7v-3a2 2 0 01.586-1.414z" stroke="#1D4ED8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>

                        {{-- DELETE --}}
                        <button onclick="hapus({{ $p->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="none" viewBox="0 0 24 24" stroke="#DC2626" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V5a1 1 0 011-1h4a1 1 0 011 1v2"/>
                            </svg>
                        </button>

                    </div>
                </div>

                <div class="text-sm text-gray-500">
                    {{ $p->jabatan }}
                </div>

                <div class="mt-2">
                    @if($p->foto_pastor)
                        <img src="{{ asset('storage/FotoPastor/'.$p->foto_pastor) }}"
                            class="w-full h-40 object-cover rounded">
                    @else
                        <div class="text-xs text-gray-400">
                            Tidak ada foto
                        </div>
                    @endif
                </div>

                <div class="mt-2">
                    Status :
                    @if($p->status)
                        <span class="text-green-600">Aktif</span>
                    @else
                        <span class="text-red-600">Nonaktif</span>
                    @endif
                </div>

            </div>

            @empty
                <div class="text-gray-500">
                    Belum ada data pastor
                </div>
            @endforelse

        </div>
    </div>
    <div class="mt-10">
        <h3 class="font-semibold text-red-700 mb-2">
            Pastor Nonaktif
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">

            @forelse($data->where('status', 0)   as $p)

            <div class="bg-white rounded-lg shadow p-4 border">

                <div class="flex justify-between">
                    <div class="font-semibold">
                        {{ $p->nama_pastor }}
                    </div>

                    <div class="flex gap-2">

                        <button onclick='openEdit(@json($p))'
                            class="" style="color: #1D4ED8">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-1.414.586H7v-3a2 2 0 01.586-1.414z" stroke="#1D4ED8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </button>

                        {{-- DELETE --}}
                        <button onclick="hapus({{ $p->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="none" viewBox="0 0 24 24" stroke="#DC2626" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V5a1 1 0 011-1h4a1 1 0 011 1v2"/>
                            </svg>
                        </button>

                    </div>
                </div>

                <div class="text-sm text-gray-500">
                    {{ $p->jabatan }}
                </div>

                <div class="mt-2">
                    @if($p->foto_pastor)
                        <img src="{{ asset('storage/FotoPastor/'.$p->foto_pastor) }}"
                            class="w-full h-40 object-cover rounded">
                    @else
                        <div class="text-xs text-gray-400">
                            Tidak ada foto
                        </div>
                    @endif
                </div>

                <div class="mt-2">
                    Status :
                    @if($p->status)
                        <span class="text-green-600">Aktif</span>
                    @else
                        <span class="text-red-600">Nonaktif</span>
                    @endif
                </div>

            </div>

            @empty
                <div class="text-gray-500">
                    Belum ada data pastor
                </div>
            @endforelse

        </div>
    </div>

</div>

@include('admin.pages.paroki.components.dialog')

<form id="formDelete" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

@endsection


@push('script')
<script>

    function openDialog(){
        document.getElementById('titleDialog').innerText = "Tambah Pastor";

        document.getElementById('formPastor').reset();

        document.getElementById('method').value = "POST";

        document.getElementById('formPastor').action =
            "{{ route('admin.paroki.store') }}";

        document.getElementById('preview').src = "";
        show();
    }

    function openEdit(data){

        document.getElementById('titleDialog').innerText = "Edit Pastor";

        document.getElementById('method').value = "PATCH";

        document.getElementById('id').value = data.id;
        document.getElementById('nama_pastor').value = data.nama_pastor;
        document.getElementById('jabatan').value = data.jabatan;
        if(data.status == 1){
            document.getElementById('status_aktif').checked = true;
        } else {
            document.getElementById('status_nonaktif').checked = true;
        }

        if(data.foto_pastor){
            document.getElementById('preview').src =
                "/storage/FotoPastor/" + data.foto_pastor;
        }

        document.getElementById('formPastor').action =
            "/admin-pastor-paroki/update/" + data.id;

        show();
    }

    function hapus(id){

        Swal.fire({
            title: 'Yakin hapus?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya hapus'
        }).then((result)=>{

            if(result.isConfirmed){

                const f = document.getElementById('formDelete');

                f.action =
                    "/admin-pastor-paroki/destroy/" + id;

                f.submit();
            }

        })
    }

    function previewFoto(e){

        const reader = new FileReader();

        reader.onload = function(){
            document.getElementById('preview').src =
                reader.result;
        }

        reader.readAsDataURL(e.target.files[0]);
    }

    function show(){
        document.getElementById('dialog')
            .style.display='flex';
    }

    function hide(){
        document.getElementById('dialog')
            .style.display='none';
    }

</script>
@endpush
