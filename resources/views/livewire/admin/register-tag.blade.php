<div>
    @if (session()->has('status'))
        <div class="mb-6 ">
            <x-alert icon="o-exclamation-triangle"
                class="alert-{{ session('type') ? session('type') : 'info' }} flex justify-center">
                <p class="font-semibold">{{ session('status') }}</p>
            </x-alert>
        </div>
    @endif
    <form wire:submit="store" method="POST">
        <x-card title="Register Tag" shadow separator class="w-full shadow-md">
            <div class="mb-6">
                <x-input wire:model="name" label="Name" placeholder="Name" type="text" class="no-border" />
            </div>
            <x-button type="submit" label="Register" class="btn-primary w-full !text-white text-lg mt-6" />
        </x-card>
    </form>
</div>
