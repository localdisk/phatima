<div class="bg-gray-100">
    @if (session('message'))
        <div class="mb-6 ">
            <x-alert icon="o-exclamation-triangle" class="alert-error flex justify-center">
                <p class="font-semibold">{{ __('auth.failed') }}</p>
            </x-alert>
        </div>
    @endif
    <form wire:submit="login" method="POST" class="w-screen h-screen flex justify-center items-center">
        <div class="bg-gray-100 w-1/5">
            <x-card title="Login" shadow separator class="w-full">
                <div class="mb-6">
                    <x-input label="Email" wire:model="form.email" name="email" placeholder="Mail Address"
                        type="email" class="no-border" />
                </div>
                <div class="mb-6">
                    <x-input label="Password" wire:model="form.password" name="password" placeholder="Password"
                        type="password" class="no-border" />
                </div>
                <div class="mb-6">
                    <x-checkbox label="ログインしたままにする" wire:model="form.remember" class="no-border" />
                </div>
                <div>
                    <a href="{{ route('password.request') }}">パスワードを忘れた場合</a>
                </div>
                <x-button type="submit" label="Login" class="btn-primary w-full !text-white text-lg mt-6" />
            </x-card>
        </div>
    </form>

</div>
