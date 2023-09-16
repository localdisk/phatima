@extends('layouts.guest')

@section('content')
    <form action="{{ route('login') }}" method="POST" class="h-screen w-screen flex items-center justify-center bg-gray-100">
        @csrf
        <div class="bg-gray-100 w-1/5">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endif
            {{-- <x-button label="ログインに失敗しました" class="bg-red-400 w-full mb-6 text-white" /> --}}
            <x-card title="Login" shadow separator class="w-full">
                <div>
                    <x-input label="Email" name="email" placeholder="Mail Address" type="email" />
                </div>
                <div class="mt-6">
                    <x-input label="Password" name="password" placeholder="Password" type="password" />

                </div>

                <x-button type="submit  " label="Login" class="btn-success w-full !text-white text-lg mt-6"></x-button>
            </x-card>
        </div>
    </form>
@endsection
