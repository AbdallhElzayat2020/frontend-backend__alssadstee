@csrf
<div class="row g-4">

    {{-- Category + Status --}}
    <div class="col-md-6">
        <label class="form-label" for="blog_category_id">Category</label>
        <select id="blog_category_id" name="blog_category_id"
            class="form-select @error('blog_category_id') is-invalid @enderror">
            <option value="">— No category —</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ old('blog_category_id', isset($blog) ? $blog->blog_category_id : '') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->getTranslation('name', 'en') }} / {{ $cat->getTranslation('name', 'ar') }}
                </option>
            @endforeach
        </select>
        @error('blog_category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label" for="status">Status</label>
        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
            <option value="active"
                {{ old('status', isset($blog) ? $blog->status : 'active') === 'active' ? 'selected' : '' }}>Active
            </option>
            <option value="inactive"
                {{ old('status', isset($blog) ? $blog->status : 'active') === 'inactive' ? 'selected' : '' }}>Inactive
            </option>
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Title --}}
    <div class="col-12">
        <h6 class="fw-semibold mb-3 border-bottom pb-2">Title</h6>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="title_en">Title (English)</label>
        <input type="text" id="title_en" name="title[en]"
            class="form-control @error('title.en') is-invalid @enderror"
            value="{{ old('title.en', isset($blog) ? $blog->getTranslation('title', 'en') : '') }}"
            placeholder="Blog title in English" />
        @error('title.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="title_ar">Title (Arabic)</label>
        <input type="text" id="title_ar" name="title[ar]" dir="rtl"
            class="form-control @error('title.ar') is-invalid @enderror"
            value="{{ old('title.ar', isset($blog) ? $blog->getTranslation('title', 'ar') : '') }}"
            placeholder="عنوان المقال بالعربية" />
        @error('title.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Short Title --}}
    <div class="col-12">
        <h6 class="fw-semibold mb-3 border-bottom pb-2">Short Title</h6>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="short_title_en">Short Title (English)</label>
        <input type="text" id="short_title_en" name="short_title[en]"
            class="form-control @error('short_title.en') is-invalid @enderror"
            value="{{ old('short_title.en', isset($blog) ? $blog->getTranslation('short_title', 'en') : '') }}"
            placeholder="Short title in English" />
        @error('short_title.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="short_title_ar">Short Title (Arabic)</label>
        <input type="text" id="short_title_ar" name="short_title[ar]" dir="rtl"
            class="form-control @error('short_title.ar') is-invalid @enderror"
            value="{{ old('short_title.ar', isset($blog) ? $blog->getTranslation('short_title', 'ar') : '') }}"
            placeholder="العنوان القصير بالعربية" />
        @error('short_title.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Slug --}}
    <div class="col-12">
        <label class="form-label" for="slug">URL Slug (English only)</label>
        <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror"
            value="{{ old('slug', isset($blog) ? $blog->slug : '') }}" placeholder="my-blog-post" />
        <div class="form-text">Leave empty to auto-generate. Same path for both locales, e.g.
            <code>/ar/blog/my-blog-post</code></div>
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Short Description --}}
    <div class="col-12">
        <h6 class="fw-semibold mb-3 border-bottom pb-2">Short Description</h6>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="short_description_en">Short Description (English)</label>
        <textarea id="short_description_en" name="short_description[en]" rows="3"
            class="form-control @error('short_description.en') is-invalid @enderror"
            placeholder="Short description in English...">{{ old('short_description.en', isset($blog) ? $blog->getTranslation('short_description', 'en') : '') }}</textarea>
        @error('short_description.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="short_description_ar">Short Description (Arabic)</label>
        <textarea id="short_description_ar" name="short_description[ar]" rows="3" dir="rtl"
            class="form-control @error('short_description.ar') is-invalid @enderror" placeholder="الوصف القصير بالعربية...">{{ old('short_description.ar', isset($blog) ? $blog->getTranslation('short_description', 'ar') : '') }}</textarea>
        @error('short_description.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Full Description --}}
    <div class="col-12">
        <h6 class="fw-semibold mb-3 border-bottom pb-2">Description</h6>
    </div>
    <div class="col-12">
        <label class="form-label" for="description_en">Description (English)</label>
        <textarea id="description_en" name="description[en]" rows="8"
            class="form-control @error('description.en') is-invalid @enderror" placeholder="Full description in English...">{{ old('description.en', isset($blog) ? $blog->getTranslation('description', 'en') : '') }}</textarea>
        @error('description.en')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label class="form-label" for="description_ar">Description (Arabic)</label>
        <textarea id="description_ar" name="description[ar]" rows="8" dir="rtl"
            class="form-control @error('description.ar') is-invalid @enderror" placeholder="الوصف الكامل بالعربية...">{{ old('description.ar', isset($blog) ? $blog->getTranslation('description', 'ar') : '') }}</textarea>
        @error('description.ar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Image --}}
    <div class="col-12">
        <div class="row g-3 align-items-start">
            <div class="col-md-6 col-lg-4">
                <label class="form-label" for="image">Featured Image</label>
                <input type="file" id="image" name="image"
                    class="form-control @error('image') is-invalid @enderror" accept="image/*" />
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            @isset($blog)
                @if ($blog->image)
                    <div class="col-md-6 col-lg-4">
                        <label class="form-label d-block">Current Image</label>
                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->getTranslation('title', 'en') }}"
                            class="img-fluid rounded border" style="max-height: 180px; object-fit: cover;" />
                    </div>
                @endif
            @endisset
        </div>
    </div>

    {{-- SEO --}}
    @include('dashboard.components.seo_fields', ['seoModel' => $blog ?? null])
</div>

<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary">
        <i class="ti ti-check me-1"></i>Save
    </button>
    <a href="{{ route('dashboard.blogs.index') }}" class="btn btn-label-secondary">Cancel</a>
</div>

@push('css')
<style>
    .blogs-form-card .card-body,
    .blogs-form-card .row {
        overflow: visible !important;
    }
    .note-editor { overflow: visible !important; }
    .note-toolbar { z-index: 2; }
    /* Fix dropdowns appearing behind other elements */
    .note-editor .note-dropdown-menu,
    .note-editor .dropdown-menu {
        z-index: 99999 !important;
    }
    .note-editor.note-frame .note-editing-area .note-editable {
        min-height: 200px;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('vendor/summernote/lang/summernote-ar-AR.min.js') }}"></script>
<script>
$(document).ready(function() {
    var toolbar = [
        ['style',    ['style']],
        ['font',     ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        ['fontsize', ['fontsize']],
        ['color',    ['color']],
        ['para',     ['ul', 'ol', 'paragraph']],
        ['height',   ['height']],
        ['table',    ['table']],
        ['insert',   ['link', 'picture', 'hr']],
        ['view',     ['fullscreen', 'codeview']]
    ];

    $('#description_en').summernote({
        height: 300,
        dialogsInBody: true,
        toolbar: toolbar,
        placeholder: 'Full description in English...',
        callbacks: {
            onInit: function() {
                $(this).closest('.note-editor').find('.note-dropdown-menu, .dropdown-menu').css('z-index', 99999);
            },
            onChange: function() {
                $(this).closest('.note-editor').find('.note-dropdown-menu, .dropdown-menu').css('z-index', 99999);
            }
        }
    });

    $('#description_ar').summernote({
        height: 300,
        lang: 'ar-AR',
        dialogsInBody: true,
        toolbar: toolbar,
        placeholder: 'الوصف الكامل بالعربية...',
        callbacks: {
            onInit: function() {
                $(this).closest('.note-editor').find('.note-dropdown-menu, .dropdown-menu').css('z-index', 99999);
            },
            onChange: function() {
                $(this).closest('.note-editor').find('.note-dropdown-menu, .dropdown-menu').css('z-index', 99999);
            }
        }
    });

    // Bootstrap 5 compatibility: Summernote uses data-toggle (BS3), BS5 needs data-bs-toggle
    function patchSummernoteDropdowns() {
        $('.note-toolbar [data-toggle="dropdown"]').each(function() {
            $(this)
                .attr('data-bs-toggle', 'dropdown')
                .removeAttr('data-toggle');
        });
        // Fix z-index on all dropdown menus inside editors
        $('.note-dropdown-menu, .note-editor .dropdown-menu').css('z-index', 99999);
    }

    // Patch after each editor is initialized
    setTimeout(patchSummernoteDropdowns, 100);

    // Re-patch on any toolbar interaction in case Summernote re-renders buttons
    $(document).on('click', '.note-toolbar', function() {
        setTimeout(function() {
            $('.note-dropdown-menu, .note-editor .dropdown-menu').css('z-index', 99999);
        }, 10);
    });
});
</script>
@endpush
