@extends('layouts.layout')
@section('content')
        {{-- <x-jet-banner /> --}}
        <div class="min-h-screen bg-gray-100">

            <section class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </section>

        @stack('modals')
        @livewireScripts
@endsection
