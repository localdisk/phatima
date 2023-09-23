<div class="bg-gray-50">
    @if (session()->has('status'))
        <div class="mb-6 ">
            <x-alert icon="o-exclamation-triangle"
                class="alert-{{ session('type') ? session('type') : 'info' }} flex justify-center">
                <p class="font-semibold">{{ session('status') }}</p>
            </x-alert>
        </div>
    @endif
    <form wire:submit="login" method="POST" class="w-screen h-screen flex justify-center items-center">
        <div class="w-1/5">
            <x-card title="Login" shadow separator class="w-full shadow-md">
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
                    <a href="{{ route('admin.password.request') }}">パスワードを忘れた場合</a>
                </div>
                <x-button type="submit" label="Login" class="btn-primary w-full !text-white text-lg mt-6" />
            </x-card>
        </div>
    </form>

</div>
