<div>
    <x-card title="Administrator List" shadow separator class="w-full shadow-md">
        <div class="mb-6">
            <x-input wire:model="form.name" label="Name" placeholder="Name" type="text" class="no-border" />
        </div>
        <div class="mb-6">
            <x-input label="Email" wire:model="form.email" name="email" placeholder="Mail Address" type="email"
                class="no-border" />
        </div>
        <div class="mb-6">
            <x-input label="Password" wire:model="form.password" name="password" placeholder="Password" type="password"
                class="no-border" />
        </div>
        <div>
            <x-input label="Password Confirmation" wire:model="form.password_confirmation" name="password_confirmation"
                placeholder="Password Confirmation" type="password" class="no-border" />
        </div>
        <x-button type="submit" label="Register" class="btn-primary w-full !text-white text-lg mt-6" />
    </x-card>

</div>
