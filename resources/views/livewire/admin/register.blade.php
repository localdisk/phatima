<div class="bg-gray-100">
    <form wire:submit="register" method="POST" class="w-screen h-screen flex justify-center items-center">
        <div class="bg-gray-100 w-1/5">
            @error('email')
                <x-button label="{{ __('auth.failed') }}" class="bg-red-400 w-full mb-6 text-white" />
            @enderror
            <x-card title="Register" shadow separator class="w-full">
                <div class="mb-6">
                    <x-input wire:model="form.name" label="Name" placeholder="Name" type="text" />
                </div>
                <div class="mb-6">
                    <x-input label="Email" wire:model="form.email" name="email" placeholder="Mail Address"
                        type="email" />
                </div>
                <div class="mb-6">
                    <x-input label="Password" wire:model="form.password" name="password" placeholder="Password"
                        type="password" />
                </div>
                <div>
                    <x-input label="Password Confirmation" wire:model="form.password_confirmation"
                        name="password_confirmation" placeholder="Password Confirmation" type="password" />
                </div>
                <x-button type="submit" label="Register" class="btn-success w-full !text-white text-lg mt-6" />
            </x-card>
        </div>
    </form>

</div>
