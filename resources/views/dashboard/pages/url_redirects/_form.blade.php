@csrf
@php($r = $redirect ?? null)

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label" for="old_url">Old URL <span class="text-danger">*</span></label>
        <input type="text" id="old_url" name="old_url" class="form-control @error('old_url') is-invalid @enderror"
            value="{{ old('old_url', $r?->source_path ?? '') }}"
            placeholder="/products/old-slug" required />
        <div class="form-text">
            <strong>عربي:</strong> اكتب <strong>المسار الأساسي فقط</strong> — بدون دومين وبدون <code>ar</code> أو <code>en</code>.
            مثال: <code>/products/reinforcing-steel-bars-1</code> يطابق تلقائيًا <code>/ar/products/...</code> و<code>/en/products/...</code>.
            <br>
            <strong>EN:</strong> Base path only (no domain, no language prefix). You may paste a full URL; we save the path without the locale.
        </div>
        @error('old_url')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="form-label" for="new_url">New URL <span class="text-danger">*</span></label>
        <input type="text" id="new_url" name="new_url" class="form-control @error('new_url') is-invalid @enderror"
            value="{{ old('new_url', $r?->target_url ?? '') }}"
            placeholder="/products/new-slug" required />
        <div class="form-text">
            <strong>عربي:</strong> نفس الفكرة: مسار أساسي مثل <code>/products/reinforcing-steel-bars</code> —
            اللغة الحالية للزائر تُضاف تلقائيًا عند التحويل. للروابط خارج موقعك استخدم رابطًا كاملًا يبدأ بـ <code>http(s)://</code>.
            <br>
            <strong>EN:</strong> Same: base path → visitor’s locale is applied. Use a real product slug or you’ll get 404.
        </div>
        @error('new_url')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label" for="redirect_type">Redirect type <span class="text-danger">*</span></label>
        <select id="redirect_type" name="redirect_type" class="form-select @error('redirect_type') is-invalid @enderror"
            required>
            @foreach ($redirectTypes as $type)
                <option value="{{ $type }}"
                    {{ old('redirect_type', $r?->redirect_type ?? \App\Models\UrlRedirect::TYPE_301) === $type ? 'selected' : '' }}>
                    @if ($type === '301')
                        301 — Permanent (SEO-friendly)
                    @else
                        302 — Temporary
                    @endif
                </option>
            @endforeach
        </select>
        <div class="form-text"><strong>301</strong> permanent · <strong>302</strong> temporary</div>
        @error('redirect_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label" for="status">Status <span class="text-danger">*</span></label>
        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
            @foreach ($statuses as $st)
                <option value="{{ $st }}"
                    {{ old('status', $r?->status ?? \App\Models\UrlRedirect::STATUS_ACTIVE) === $st ? 'selected' : '' }}>
                    {{ ucfirst($st) }}
                </option>
            @endforeach
        </select>
        <div class="form-text">Only <strong>active</strong> redirects run on the site.</div>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label class="form-label" for="description">Description</label>
        <textarea id="description" name="description" rows="3" class="form-control @error('description') is-invalid @enderror"
            placeholder="Optional note about why this redirect exists">{{ old('description', $r?->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
