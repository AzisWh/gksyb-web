<div class="px-4 py-2 fs-style-manrope">

<form action="{{ route('admin.seo.store') }}" method="POST" class="space-y-6">
@csrf

<input type="hidden" name="id" value="{{ $seo->id ?? '' }}">

{{-- Meta Description --}}
<div>
    <label class="block mb-1 text-sm font-medium text-gray-700">
        Meta Description
    </label>

    <textarea
        name="meta_desc"
        rows="3"
        class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
        placeholder="Deskripsi website untuk SEO"
    >{{ $seo->meta_desc ?? '' }}</textarea>
</div>

{{-- Meta Keyword --}}
<div>
    <label class="block mb-1 text-sm font-medium text-gray-700">
        Meta Keyword
    </label>

    <input
        name="meta_keyword"
        value="{{ $seo->meta_keyword ?? '' }}"
        class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
        placeholder="contoh: gereja, paroki, misa, bintaran"
    >

    <p class="text-xs text-gray-500 mt-1">
        Pisahkan dengan koma (,)
    </p>
</div>

{{-- Google Analytics ID --}}
<div>
    <label class="block mb-1 text-sm font-medium text-gray-700">
        Google Analytics ID
    </label>

    <input
        name="google_id"
        value="{{ $seo->google_id ?? '' }}"
        class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
        placeholder="G-XXXXXXXX"
    >
</div>

{{-- Maintenance Mode --}}
<div class="flex items-center gap-3">
    <input
        type="checkbox"
        name="maintenance_mode"
        value="1"
        {{ isset($seo) && $seo->maintenance_mode ? 'checked' : '' }}
        class="w-5 h-5"
    >

    <label class="text-sm font-medium text-gray-700">
        Aktifkan Maintenance Mode
    </label>
</div>

<div class="pt-4">
    <button
        type="submit"
        class="inline-flex items-center gap-2 px-6 py-2 text-sm font-medium text-white rounded-lg bg-secondary"
    >
        Simpan Perubahan
    </button>
</div>

</form>

</div>
