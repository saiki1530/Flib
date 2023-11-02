<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Thông tin cá nhân') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Cập nhật thông tin hồ sơ & địa chỉ Email của tài khoản của bạn") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')


        <div>
            <x-input-label for="name" :value="__('Họ Tên')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="avatar">Ảnh đại diện:
                
                @if(Auth::user()->avatar)
                <img src="{{ asset('public/assets/img/avatars/' . Auth::user()->avatar) }}" alt="Avatar" style=" width: 20%; border-radius: 70%;">
                @else
                <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar">
                @endif

                <input type="file" id="avatar" name="avatar" accept="image/*">

        </div>

        <div>
            <label for="balance" id="balance" name="balance">Ví Fcoins: {{ $user->balance }}</label>
        </div>


        <!-- <div>
            <x-input-label for="avatar" :value="__('Ảnh đại điện')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" accept="image/*" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div>
            <x-input-label for="balance" :value="__('Số dư tài khoản')" />
            <x-text-input id="balance" name="balance" type="text" class="mt-1 block w-full" :value="old('balance', $user->balance)" readonly />
        </div> -->


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Địa chỉ email của bạn chưa được xác minh.') }}

                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Bấm vào đây để gửi lại email xác minh.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600">
                    {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Lưu thông tin') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>