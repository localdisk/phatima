<div class="bg-gray-100">
    <form wire:submit="login" method="POST" class="w-screen h-screen flex justify-center items-center">
        <div class="bg-gray-100 w-1/5">
            @error('email')
                <x-button label="{{ __('auth.failed') }}" class="bg-red-400 w-full mb-6 text-white" />
            @enderror
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
                    <a href="">パスワードを忘れた場合</a>
                </div>
                <x-button type="submit" label="Login" class="btn-primary w-full !text-white text-lg mt-6" />
            </x-card>
        </div>
    </form>

</div>
