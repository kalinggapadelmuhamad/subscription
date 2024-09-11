@extends('layouts.app')

@section('title', 'Tambah Subscription')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">

    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header mt-3">
                <h1>Tambah Subscription</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('subscription.index') }}">Subscription</a></div>
                    <div class="breadcrumb-item">Tambah Subscription</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('subscription.store') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text"
                                            class="form-control @error('username') is-invalid
                                                    @enderror"
                                            name="username" required value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input type="number"
                                            class="form-control @error('duration') is-invalid
                                                    @enderror"
                                            name="duration" required value="{{ old('duration') }}">
                                        @error('duration')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('subscription.index') }}" class="btn btn-danger m-1">Kembali</a>
                                    <button class="btn btn-primary m-1">Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Page Specific JS File -->
@endpush
