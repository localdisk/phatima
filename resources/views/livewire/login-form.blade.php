<div class="flex items-center justify-center h-screen w-screen">
  <div class="md:w-1/5 w-full p-2">
    <p>@error('login') <p class="text-red-500">{{ $message }}</p> @enderror</p>
    <label class="block my-1 text-lg">
      メールアドレス
      <input type="text" wire:model.lazy="email" class="w-full">
      @error('email') <p class="text-red-500">{{ $message }}</p> @enderror
    </label>
    <label class="block my-1 text-lg">
      パスワード
      <input type="password" wire:model.lazy="password" class="w-full">
      @error('password') <p class="text-red-500">{{ $message }}</p> @enderror
    </label>
    <p class="my-3">
      <button wire:click="login" class="p-3 w-full shadow-lg bg-blue-600 text-white">ログイン</button>
    </p>
  </div>
</div>
