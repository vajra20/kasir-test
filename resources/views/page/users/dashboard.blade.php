@extends('layout.sidebar.sidebar')
@section('title', 'Dashboard User')

@section('content-web')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="flex flex-col gap-10 items-center justify-center">
            <div class="text-3xl font-semibold text-white">Selamat Datang, {{ Auth::user()->username }}!</div>
            <div class="shadow-md !shadow-white rounded-full flex justify-center">
                <img src="{{ asset('images/user.gif') }}" alt="" class="w-full h-full max-w-2xl rounded-full">
            </div>
        </div>
    </div>
@endsection
