@csrf
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <label class="form-label" for="name_en">Name (English)</label>
            <input type="text" id="name_en" name="name[en]" class="form-control @error('name.en') is-invalid @enderror"
                value="{{ old('name.en', isset($product) ? $product->getTranslation('name', 'en') : '') }}"
                placeholder="Product name in English" />
            @error('name.en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="name_ar">Name (Arabic)</label>
            <input type="text" id="name_ar" name="name[ar]" dir="rtl"
                class="form-control @error('name.ar') is-invalid @enderror"
                value="{{ old('name.ar', isset($product) ? $product->getTranslation('name', 'ar') : '') }}"
                placeholder="اسم المنتج بالعربية" />
            @error('name.ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="description_en">Description (English)</label>
            <textarea id="description_en" name="description[en]" rows="6"
                class="form-control @error('description.en') is-invalid @enderror"
                placeholder="Product description in English...">{{ old('description.en', isset($product) ? $product->getTranslation('description', 'en') : '') }}</textarea>
            @error('description.en')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="description_ar">Description (Arabic)</label>
            <textarea id="description_ar" name="description[ar]" rows="6" dir="rtl"
                class="form-control @error('description.ar') is-invalid @enderror"
                placeholder="وصف المنتج بالعربية...">{{ old('description.ar', isset($product) ? $product->getTranslation('description', 'ar') : '') }}</textarea>
            @error('description.ar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-lg-4">
        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror"
                accept="image/*" />
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        @isset($product)
            @if($product->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="img-fluid rounded border" />
                </div>
            @endif
        @endisset
    </div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">
        <i class="ti ti-check me-1"></i>
        Save
    </button>
    <a href="{{ route('dashboard.products.index') }}" class="btn btn-label-secondary">Cancel</a>
</div>
