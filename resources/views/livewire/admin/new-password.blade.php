<div>
    @if (session('message'))
        <x-alert icon="o-check-circle" class="alert-success flex justify-center ">
            <p>{{ __('passwords.sent') }}</p>
        </x-alert>
    @endif
    <form wire:submit="newPassword" method="POST" class="w-screen h-screen flex justify-center items-center">
        <div class="bg-gray-100 w-1/5">
            <x-card title="Reset Password" shadow separator class="w-full">
                <div class="mb-6">
                    <x-input label="Email" wire:model="email" name="email" placeholder="Mail Address" type="email"
                        class="no-border" />
                </div>
                <div class="mb-6">
                    <x-input label="Password" wire:model="password" name="password" placeholder="Password"
                        type="password" class="no-border" />
                </div>
                <div>
                    <x-input label="Password Confirmation" wire:model="password_confirmation"
                        name="password_confirmation" placeholder="Password Confirmation" type="password"
                        class="no-border" />
                </div>

                <x-input wire:model="token" name="token" type="hidden" />
                <x-button type="submit" label="Send" class="btn-primary w-full !text-white text-lg mt-6" />
            </x-card>
        </div>
    </form>
</div>
