@extends('layouts.layout')
@section('content')
        <nav>
            @include('component.navbar')
        </nav>

        <section class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </section>

        <footer >
            @include('component.footer')
        </footer>
@endsection
