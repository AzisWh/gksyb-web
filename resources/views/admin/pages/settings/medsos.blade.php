<div class="px-4 py-2 fs-style-manropte">
    <form action="{{ route('admin.sosmed.store') }}" method="POST" class="space-y-8">
    @csrf
    <input type="hidden" name="id" value="{{ $sosmed->id ?? '' }}">

    <div class="grid grid-cols-1 gap-4">
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Facebook
            </label>
            <input
                name="url_fb"
                value="{{ $medsos->url_fb ?? '' }}"
                class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
            >
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Instagram
            </label>
            <input
                name="url_ig"
                value="{{ $medsos->url_ig ?? '' }}"
                class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
            >
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Youtube
            </label>
            <input
                name="url_yt"
                value="{{ $medsos->url_yt ?? '' }}"
                class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
            >
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Twitter / X
            </label>
            <input
                name="url_x"
                value="{{ $medsos->url_x ?? '' }}"
                class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
            >
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Google Maps
            </label>
            <input
                name="url_gmaps"
                value="{{ $medsos->url_gmaps ?? '' }}"
                class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
            >
            <p class="font-thin">URL link Google Maps untuk lokasi gereja</p>
        </div>
    </div>

    <div class="pt-4">
        <button
            type="submit"
            class="inline-flex items-center gap-2 px-6 py-2 text-sm font-medium text-white rounded-lg bg-secondary "
        >
            Simpan Perubahan
        </button>
    </div>
</form>
</div>


