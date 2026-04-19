@extends('dashboard.layouts.master')
@section('title', 'URL redirects')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h5 class="card-title mb-0">URL redirects</h5>
                    <a href="{{ route('dashboard.url-redirects.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i>
                        Create redirect
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($redirects->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Old path</th>
                                        <th>New URL</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Hits</th>
                                        <th>Last hit</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($redirects as $r)
                                        <tr>
                                            <td><code>{{ $r->source_path }}</code></td>
                                            <td class="text-break"><small>{{ \Illuminate\Support\Str::limit($r->target_url, 48) }}</small></td>
                                            <td>{{ $r->redirect_type }}</td>
                                            <td>
                                                @if ($r->status === \App\Models\UrlRedirect::STATUS_ACTIVE)
                                                    <span class="badge bg-label-success">Active</span>
                                                @else
                                                    <span class="badge bg-label-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ number_format($r->hits_count) }}</td>
                                            <td>
                                                @if ($r->last_hit_at)
                                                    {{ $r->last_hit_at->format('Y-m-d H:i') }}
                                                @else
                                                    <span class="text-muted">Never</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <div class="d-flex gap-2 justify-content-end flex-wrap">
                                                    <a href="{{ route('dashboard.url-redirects.edit', $r) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                    <form action="{{ route('dashboard.url-redirects.destroy', $r) }}"
                                                        method="POST" onsubmit="return confirm('Delete this redirect?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $redirects->links() }}
                        </div>
                    @else
                        <p class="text-muted mb-0">No redirects yet. Create one to forward old links.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
