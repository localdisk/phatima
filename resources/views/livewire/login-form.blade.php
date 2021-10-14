<div class="flex items-center justify-center h-screen w-screen">
  <div class="md:w-1/5 w-full p-2">
    <label class="block my-1 text-lg">
      ユーザー名
      <input type="text" wire:model="user" class="w-full">
    </label>
    <label class="block my-1 text-lg">
      パスワード
      <input type="password" wire:model="password" class="w-full">
    </label>
    <p class="my-3">
      <button wire:click="login" class="p-3 w-full shadow-lg bg-blue-600 text-white">ログイン</button>
    </p>
  </div>
</div>
