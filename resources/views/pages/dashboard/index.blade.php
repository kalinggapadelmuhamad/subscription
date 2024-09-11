@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="row mt-3">
                <div class="col-12 mb-4">
                    <div class="hero text-white hero-bg-image hero-bg-parallax"
                        style="background:  background-repeat: no-repeat; background-position: 0% -100%; background-size: 350px">
                        <div class="hero-inner">
                            <h2>Halo, {{ Auth::user()->name }}</h2>
                            @if (Auth::user()->privilege)
                                @if (Auth::user()->Subcription->isNotEmpty())
                                    <p>Subscription Expired In {{ Auth::user()->Subcription[0]->end_date }}</p>
                                @else
                                    <p>No active subscription</p>
                                @endif
                            @else
                                <p>Selamat Datang Di Dashboard Admin</p>
                            @endif
                            {{-- <div class="mt-4">
                                <a href="" class="btn btn-outline-white btn-lg btn-icon icon-left"><i
                                        class="far fa-user"></i>
                                    Setup Akun</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endSection

@push('script')
@endpush
