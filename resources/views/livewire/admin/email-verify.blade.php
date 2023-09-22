<div class="bg-gray-100">
    <form wire:submit="verify" method="POST" class="w-screen h-screen flex justify-center items-center">
        <div class="w-1/5">
            <x-card title="Email Verify" shadow separator class="w-full">
                <p>{{ __('auth.verification-link-sent') }}</p>
            </x-card>
        </div>
    </form>

</div>
