<div>
    <x-button wire:click="export" class="h-8 px-8 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg 
    focus:shadow-outline hover:bg-indigo-800 py-2 font-semibold" label="Export"/>

    @if($exporting && !$exportFinished)
        <div class="d-inline" wire:poll="updateExportProgress">Exporting...please wait.</div>
    @endif

    @if($exportFinished)
        Done. Download file <a class="stretched-link" wire:click="downloadExport">here</a>
    @endif
</div>