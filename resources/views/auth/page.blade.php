@extends('master')

@section('content')
    <section class="w-full p-6 flex flex-col justify-center items-center">
        @yield('component_data')
        @if(isset($auth_event))
            @switch($auth_event)
                @case('reset')
                <router-view email="{{$email}}" token="{{$token}}"></router-view>
                @break
                @default
                <router-view></router-view>
                @break
            @endswitch
        @else
            <router-view></router-view>
        @endif
    </section>
@endsection

@push('footer_scripts')
    <script src="{{mix('/js/auth.js')}}"></script>
@endpush
