@include('head')
@if (!empty(auth()->user()->id))
    @include('sidebar')
@endif
@yield('isi')
@include('foot')
@yield('fot_dinamis')