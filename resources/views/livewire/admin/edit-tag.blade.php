<div>
    <x-card title="Edit Tag" shadow separator class="w-full shadow-md">
        <form wire:submit="update" method="POST">
            <div class="mb-6">
                <x-input wire:model="name" label="Name" placeholder="Name" type="text" class="no-border" />
            </div>
            <x-button type="submit" label="Register" class="btn-primary w-full !text-white text-lg mt-6" />
        </form>
    </x-card>
</div>
