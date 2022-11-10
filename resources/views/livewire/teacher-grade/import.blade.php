<div>
    <form wire:submit.prevent="import" enctype="multipart/form-data">
        @csrf
        <button class="h-8 px-4 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">
            <span class="py-2 px-4 font-semibold">Import</span>
        </button>
        <input class="px-2 py-2" type="file" wire:model="importFile" class="@error('import_file') is-invalid @enderror">
        @error('import_file')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </form>

    @if($importing && !$importFinished)
        <div wire:poll="updateImportProgress">Importing...please wait.</div>
    @endif

    @if($importFinished)
        Finished importing.
    @endif
</div>