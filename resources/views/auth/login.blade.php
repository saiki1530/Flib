<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                @error('email')
                    <p class="mt-1 text-[12px] text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="password" value="{{ __('Mật khẩu') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                @error('password')
                    <p class="mt-1 text-[12px] text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4 flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Nhớ tài khoản') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md " href="{{ route('password.request') }}">
                        {{ __('Quên mật khẩu ?') }}
                    </a>
                @endif
            </div>
            <div class="flex items-center justify-between mt-4 ">
                <a class="decoration-1 underline " href="{{ route('register') }}">tôi chưa có tài khoản</a>
                <x-button class="ml-4">
                    {{ __('Đăng nhập') }}
                </x-button>
            </div>
            <div class="mt-4">
                <a href="{{ route('auth.google') }}" class="flex items-center justify-center flex-1 border py-2 px-4 rounded-sm hover:bg-slate-200 hover:bg-opacity-20">
                    <img class="mr-2" src="{{ asset('assets/img/icon/google.png') }}" alt="logo-google" width="20">
                    đăng nhập với google
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
