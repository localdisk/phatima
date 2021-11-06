<div class="flex items-center justify-center h-screen w-screen">
    <div class="md:w-1/5 w-full p-2">
        <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
        <label class="block my-1 text-lg">
            <p>{{ __('Email') }}</p>
            <input type="text" wire:model.lazy="email" class="w-full">
            @error('email') <p class="text-red-500">{{ $message }}</p> @enderror
          </label>
    </div>
  </div>
