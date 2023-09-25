<div>
    @push('css')
        <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/themes/prism.min.css" />
        <link rel="stylesheet"
            href="https://uicdn.toast.com/editor-plugin-code-syntax-highlight/latest/toastui-editor-plugin-code-syntax-highlight.min.css" />
    @endpush
    <div>
        <form wire:submit="" method="POST">
            <x-card title="Register Post" shadow separator class="w-full shadow-md">
                <div class="mb-6">
                    <x-input wire:model="form.name" label="Title" placeholder="Title" type="text"
                        class="no-border" />
                </div>
                <div class="mb-6">
                    <x-input label="Email" wire:model="form.email" name="email" placeholder="Mail Address"
                        type="email" class="no-border" />
                </div>
                <div wire:ignore>
                    <div id="editor"></div>
                </div>
                <x-button type="submit" label="Register" class="btn-primary w-full !text-white text-lg mt-6" />
            </x-card>
        </form>
    </div>
    @push('scripts')
        <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
        <script
            src="https://uicdn.toast.com/editor-plugin-code-syntax-highlight/latest/toastui-editor-plugin-code-syntax-highlight-all.min.js">
        </script>
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.hook('component.init', ({
                    component
                }) => {
                    const {
                        Editor
                    } = toastui;
                    const {
                        codeSyntaxHighlight
                    } = Editor.plugin;
                    const editor = new Editor({
                        el: document.querySelector('#editor'),
                        initialEditType: 'markdown',
                        toolbarItems: [],
                        plugins: [codeSyntaxHighlight],
                    });
                    editor.on('change', function(data) {
                        console.log(editor.getMarkdown());
                    })
                })
            })
        </script>
    @endpush
</div>
