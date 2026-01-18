
<div x-data="{ edit:false }">
    @if(!$identitas)

        <form action="{{ route('admin.identitas.store') }}" 
            method="POST" 
            enctype="multipart/form-data">

        @csrf

        <div class="space-y-4">

            <div>
                <label>Nama Website</label>
                <input type="text" name="nama_website" 
                    class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label>Logo</label>
                <input type="file" name="logo" class="w-full border p-2 rounded">
            </div>

            <button class="bg-secondary text-white px-4 py-2 rounded">
                Simpan
            </button>

        </div>
        </form>


        @else


        <form action="{{ route('admin.identitas.update', $identitas->id) }}"
            method="POST"
            enctype="multipart/form-data">

        @csrf
        @method('PATCH')

        <div class="space-y-4">

            <div>
                <label>Nama Website</label>
                <input 
                    type="text" 
                    name="nama_website" 
                    value="{{ $identitas->nama_website }}"
                    :disabled="!edit"
                    class="w-full border p-2 rounded">
            </div>

            <div>
                <label>Logo</label>

                @if($identitas->logo)
                <img 
                    src="{{ asset('storage/'.$identitas->logo) }}" 
                    class="h-24 mb-2">
                @endif

                <input 
                    type="file" 
                    name="logo"
                    :disabled="!edit"
                    class="w-full border p-2 rounded">
            </div>


            <div class="flex gap-2">

                <button 
                    type="button"
                    @click="edit = true"
                    x-show="!edit"
                    class="bg-secondary text-white px-4 py-2 rounded">
                    Edit
                </button>

                <button 
                    x-show="edit"
                    class="bg-secondary text-white px-4 py-2 rounded">
                    Simpan
                </button>

                <button 
                    type="button"
                    x-show="edit"
                    onclick="hapus({{ $identitas->id }})"
                    class=" text-white px-4 py-2 rounded" style="background-color: red">
                    Delete
                </button>

            </div>

        </div>
        </form>

        @endif
    </div>

    <script>
        function hapus(id) {
            Swal.fire({
                title: 'Yakin hapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {

                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/identitas/' + id;

                    let csrf = document.createElement('input');
                    csrf.name = '_token';
                    csrf.value = '{{ csrf_token() }}';

                    let method = document.createElement('input');
                    method.name = '_method';
                    method.value = 'DELETE';

                    form.appendChild(csrf);
                    form.appendChild(method);

                    document.body.appendChild(form);
                    form.submit();
                }
            })
        }
    </script>

</div>