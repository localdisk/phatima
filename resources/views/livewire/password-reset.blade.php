<div class="bg-gray-100">
    @if (session('message'))
        <x-alert icon="o-check-circle" class="alert-success flex justify-center ">
            <p>{{ __('passwords.sent') }}</p>
        </x-alert>
    @endif
    <form wire:submit="resetPassword" method="POST" class="w-screen h-screen flex justify-center items-center">
        <div class="bg-gray-100 w-1/5">
            <x-card title="Reset Password" shadow separator class="w-full">
                <div class="mb-6">
                    <x-input label="Email" wire:model="form.email" name="email" placeholder="Mail Address"
                        type="email" class="no-border" />
                </div>
                <x-button type="submit" label="Send" class="btn-primary w-full !text-white text-lg mt-6" />
            </x-card>
        </div>
    </form>

</div>
