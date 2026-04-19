@csrf
<div class="row g-4">
    <div class="col-md-6">
        <label class="form-label" for="name_en">Name (English)</label>
        <input type="text" id="name_en" name="name[en]"
            class="form-control @error('name.en') is-invalid @enderror"
            value="{{ old('name.en', isset($blogCategory) ? $blogCategory->getTranslation('name', 'en') : '') }}"
            placeholder="Category name in English" />
        @error('name.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="name_ar">Name (Arabic)</label>
        <input type="text" id="name_ar" name="name[ar]" dir="rtl"
            class="form-control @error('name.ar') is-invalid @enderror"
            value="{{ old('name.ar', isset($blogCategory) ? $blogCategory->getTranslation('name', 'ar') : '') }}"
            placeholder="اسم الفئة بالعربية" />
        @error('name.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-8">
        <label class="form-label" for="slug">URL Slug (English only)</label>
        <input type="text" id="slug" name="slug"
            class="form-control @error('slug') is-invalid @enderror"
            value="{{ old('slug', isset($blogCategory) ? $blogCategory->slug : '') }}"
            placeholder="steel-news" />
        <div class="form-text">Leave empty to auto-generate from the English name.</div>
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 d-flex align-items-end">
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                {{ old('is_active', isset($blogCategory) ? $blogCategory->is_active : true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Active</label>
        </div>
    </div>
</div>

<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary">
        <i class="ti ti-check me-1"></i>Save
    </button>
    <a href="{{ route('dashboard.blog-categories.index') }}" class="btn btn-label-secondary">Cancel</a>
</div>
