@extends('master')

@section('content')
    <section class="w-full p-6 flex flex-col justify-center items-center">

        <router-view></router-view>

    </section>
@endsection

@push('footer_scripts')
    <script src="{{mix('/js/auth.js')}}"></script>
@endpush