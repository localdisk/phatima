<div class="flex items-center justify-center h-screen w-screen">
  <div class="md:w-1/5 w-full p-2">
    <input type="hidden" name="token" wire:model="token">
    <label class="block my-1 text-lg">
      {{ __('Password') }}
      <input type="password" wire:model.defer="password" class="w-full">
      @error('password') <p class="text-red-500">{{ $message }}</p> @enderror
    </label>
    <label class="block my-1 text-lg">
      {{ __('Confirm Password') }}
      <input type="password" wire:model.defer="password_confirmation" class="w-full">
      @error('password_confirmation') <p class="text-red-500">{{ $message }}</p> @enderror
    </label>
    <p class="my-3">
      <button wire:click="register" class="p-3 w-full shadow-lg bg-blue-600 text-white">登録</button>
    </p>
  </div>
</div>
