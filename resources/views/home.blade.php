@extends('master')

@section('content')
    <section class="w-full p-6 flex justify-center items-center">

        <span class="text-white uppercase font-bold">Home Page</span>

    </section>
@endsection

@push('footer_scripts')
    <script src="{{mix('/js/app.js')}}"></script>
@endpush