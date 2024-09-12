@extends('layouts.app')

@section('title', 'Subscription')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header mt-3">
                <h1>Data Subscription</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('subscription.index') }}">Subscription</a></div>
                    <div class="breadcrumb-item">Data Subscription</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="p-2">
                                    <div class="float-left">
                                        <div class="section-header-button">
                                            <a href="{{ route('subscription.create') }}" class="btn btn-danger">Tambah
                                                Subscription</a>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <form action="{{ route('subscription.index') }}" method="GET">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search"
                                                    name="search" value="{{ request('search') }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="clearfix  divider mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-lg">
                                        <tr>
                                            <th style="width: 3%">No</th>
                                            <th>Nama</th>
                                            <th>Token</th>
                                            <th>Duration</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Dibuat Pada</th>
                                            <th style="width: 5%" class="text-center">Aksi</th>
                                        </tr>
                                        @foreach ($subcriptions as $index => $subcription)
                                            <tr>
                                                <td>
                                                    {{ $subcriptions->firstItem() + $index }}
                                                </td>
                                                <td>
                                                    {{ $subcription->User->name }}
                                                </td>
                                                <td>
                                                    {{ $subcription->token }}
                                                </td>
                                                <td>
                                                    {{ $subcription->duration }}
                                                </td>
                                                <td>
                                                    {{ $subcription->end_date }}
                                                </td>
                                                <td>
                                                    @if ($subcription->end_date < date('Y-m-d'))
                                                        <span class="badge badge-danger">Expired</span>
                                                    @else
                                                        <span class="badge badge-success">Active</span>
                                                    @endif
                                                </td>
                                                </td>
                                                <td>
                                                    {{ $subcription->created_at->format('d-F-Y') }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{ route('subscription.destroy', $subcription) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-warning btn-icon m-1">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <span>
                                        Showing {{ $subcriptions->firstItem() }}
                                        to {{ $subcriptions->lastItem() }}
                                        of {{ $subcriptions->total() }} entries
                                    </span>
                                    <div class="paginate-sm">
                                        {{ $subcriptions->onEachSide(0)->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
