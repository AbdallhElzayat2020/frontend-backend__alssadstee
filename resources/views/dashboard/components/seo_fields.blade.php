@php
    $s = $seoModel ?? null;
@endphp

<div class="col-12 mt-4">
    <h6 class="fw-semibold mb-3 border-bottom pb-2">SEO (optional)</h6>
</div>

<div class="col-md-6">
    <label class="form-label" for="meta_title_en">Meta title (English)</label>
    <input type="text" id="meta_title_en" name="meta_title_en"
        class="form-control @error('meta_title_en') is-invalid @enderror"
        value="{{ old('meta_title_en', $s->meta_title_en ?? '') }}" maxlength="255" />
    @error('meta_title_en')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label class="form-label" for="meta_title_ar">Meta title (Arabic)</label>
    <input type="text" id="meta_title_ar" name="meta_title_ar" dir="rtl"
        class="form-control @error('meta_title_ar') is-invalid @enderror"
        value="{{ old('meta_title_ar', $s->meta_title_ar ?? '') }}" maxlength="255" />
    @error('meta_title_ar')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label" for="meta_description_en">Meta description (English)</label>
    <textarea id="meta_description_en" name="meta_description_en" rows="3"
        class="form-control @error('meta_description_en') is-invalid @enderror">{{ old('meta_description_en', $s->meta_description_en ?? '') }}</textarea>
    @error('meta_description_en')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label class="form-label" for="meta_description_ar">Meta description (Arabic)</label>
    <textarea id="meta_description_ar" name="meta_description_ar" rows="3" dir="rtl"
        class="form-control @error('meta_description_ar') is-invalid @enderror">{{ old('meta_description_ar', $s->meta_description_ar ?? '') }}</textarea>
    @error('meta_description_ar')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label" for="meta_keywords_en">Meta keywords (English)</label>
    <input type="text" id="meta_keywords_en" name="meta_keywords_en"
        class="form-control @error('meta_keywords_en') is-invalid @enderror"
        value="{{ old('meta_keywords_en', $s->meta_keywords_en ?? '') }}" maxlength="1024" />
    @error('meta_keywords_en')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label class="form-label" for="meta_keywords_ar">Meta keywords (Arabic)</label>
    <input type="text" id="meta_keywords_ar" name="meta_keywords_ar" dir="rtl"
        class="form-control @error('meta_keywords_ar') is-invalid @enderror"
        value="{{ old('meta_keywords_ar', $s->meta_keywords_ar ?? '') }}" maxlength="1024" />
    @error('meta_keywords_ar')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label" for="canonical_url_en">Canonical URL (English locale)</label>
    <input type="url" id="canonical_url_en" name="canonical_url_en"
        class="form-control @error('canonical_url_en') is-invalid @enderror"
        value="{{ old('canonical_url_en', $s->canonical_url_en ?? '') }}" maxlength="2048"
        placeholder="https://..." />
    @error('canonical_url_en')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label class="form-label" for="canonical_url_ar">Canonical URL (Arabic locale)</label>
    <input type="url" id="canonical_url_ar" name="canonical_url_ar" dir="rtl"
        class="form-control @error('canonical_url_ar') is-invalid @enderror"
        value="{{ old('canonical_url_ar', $s->canonical_url_ar ?? '') }}" maxlength="2048"
        placeholder="https://..." />
    @error('canonical_url_ar')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="col-md-6">
    <label class="form-label" for="schema_markup_en">Schema markup JSON-LD (English)</label>
    <textarea id="schema_markup_en" name="schema_markup_en" rows="6"
        class="form-control font-monospace small @error('schema_markup_en') is-invalid @enderror"
        placeholder='{"@@context":"https://schema.org",...}'>{{ old('schema_markup_en', $s->schema_markup_en ?? '') }}</textarea>
    @error('schema_markup_en')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6">
    <label class="form-label" for="schema_markup_ar">Schema markup JSON-LD (Arabic)</label>
    <textarea id="schema_markup_ar" name="schema_markup_ar" rows="6" dir="rtl"
        class="form-control font-monospace small @error('schema_markup_ar') is-invalid @enderror"
        placeholder='{"@@context":"https://schema.org",...}'>{{ old('schema_markup_ar', $s->schema_markup_ar ?? '') }}</textarea>
    @error('schema_markup_ar')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
