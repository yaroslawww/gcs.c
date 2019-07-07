@extends('master')

@section('content')
    <section class="w-full p-6 flex flex-col justify-center items-center">
        <div class="form form_auth form_register text-white">
            <div class="font-bold text-xl mb-4">{{ __('Verify Your Email Address') }}</div>

                <div class="font-bold text-sm ">
                    @if (session('resent'))
                        <div
                            class=" bg-gray-200 rounded-2 px-3 py-2 mb-2 font-semibold text-gray-700 mr-2"
                             role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                        <a
                            class=" transition text-gray-500 hover:text-gray-300"
                            href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
        </div>
    </section>
@endsection

@push('footer_scripts')
    <script src="{{mix('/js/auth.js')}}"></script>
@endpush
