<head>
    @php
        $seoMeta = $seoMeta ?? [
            'title' => null,
            'description' => null,
            'keywords' => null,
            'canonical' => url()->current(),
            'schema_json_ld' => null,
        ];
        $resolvedTitle = !empty($seoMeta['title'])
            ? $seoMeta['title']
            : trim($__env->yieldContent('title'));
        $schemaDecoded = !empty($seoMeta['schema_json_ld'])
            ? json_decode($seoMeta['schema_json_ld'], true)
            : null;
    @endphp
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-site-verification" content="u_xIwmfO0-bubl7Nu3mYCpNFSmdQr2J1g8WsBb2LHWk" />
    <title>{{ $resolvedTitle }}</title>
    @if ($resolvedTitle !== '')
        <meta name="title" content="{{ $resolvedTitle }}" />
    @endif
    @if (!empty($seoMeta['description']))
        <meta name="description" content="{{ $seoMeta['description'] }}" />
    @endif
    @if (!empty($seoMeta['keywords']))
        <meta name="keywords" content="{{ $seoMeta['keywords'] }}" />
    @endif
    @if (!empty($seoMeta['canonical']))
        <link rel="canonical" href="{{ $seoMeta['canonical'] }}" />
    @endif
    @if (is_array($schemaDecoded))
        <script type="application/ld+json">
            {!! json_encode($schemaDecoded, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
        </script>
    @endif
    <link rel="icon" href="{{ asset('assets/website/images/favicon.png') }}" type="image/x-icon">
    @php
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $isRTL = $currentLocale === 'ar';
        $bootstrapCSS = $isRTL
            ? 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css'
            : 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
    @endphp
    <link href="{{ $bootstrapCSS }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}" />
</head>
