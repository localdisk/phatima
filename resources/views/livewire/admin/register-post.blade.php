<div>
    <div>
        <form wire:submit="" method="POST">
            <x-card title="Register Post" shadow separator class="w-full shadow-md">
                <div class="mb-6">
                    <x-input wire:model="form.name" label="Title" placeholder="Title" type="text" class="no-border" />
                </div>
                <div class="mb-6">
                    <x-input label="Email" wire:model="form.email" name="email" placeholder="Mail Address"
                        type="email" class="no-border" />
                </div>
                <x-button type="submit" label="Register" class="btn-primary w-full !text-white text-lg mt-6" />
            </x-card>
        </form>

    </div>
</div>
