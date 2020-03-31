@include('quicar.backend.includes.header')
@include('quicar.backend.includes.menu')

<div class="content ht-100v pd-0">
    @include('quicar.backend.includes.top-menu')
    @yield('content')
</div>
@include('quicar.backend.includes.footer')
