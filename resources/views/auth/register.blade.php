@extends('layouts.guest')

@section('content')
    <form action="{{ route('register') }}" method="POST"
        class="h-screen w-screen flex items-center justify-center bg-gray-100">
        @csrf
        <div class="bg-gray-100 w-1/5">
            @error('email')
                <x-button label="{{ __('auth.failed') }}" class="bg-red-400 w-full mb-6 text-white" />
            @enderror
            <x-card title="Register" shadow separator class="w-full">
                <div>
                    <x-input label="Name" name="name" placeholder="Name" type="text" />
                </div>
                <div>
                    <x-input label="Email" name="email" placeholder="Mail Address" type="email" />
                </div>
                <div class="mt-6">
                    <x-input label="Password" name="password" placeholder="Password" type="password" />
                </div>
                <div class="mt-6">
                    <x-input label="Password Confirmation" name="password_confirmation" placeholder="Password Confirmation"
                        type="password" />
                </div>

                <x-button type="submit" label="Register" class="btn-success w-full !text-white text-lg mt-6" />
            </x-card>
        </div>
    </form>
@endsection
