<div class="btn-group w-100" wire:key="action-button-{{ $value }}">
    @if (in_array('delete', $action))
        <button type="button" class="btn btn-default" wire:click="$emitUp('deleteAction', {{ $value }})"><i class="fas fa-trash text-danger"></i></button>
    @endif
    @if (in_array('edit', $action))
        <button type="button" class="btn btn-default" wire:click="$emitUp('editAction', {{ $value }})"><i class="fas fa-pencil-alt text-info"></i></button>
    @endif
    @if (in_array('print', $action))
        <button type="button" class="btn btn-default" wire:click="$emitUp('printAction', {{ $value }})"><i class="fas fa-print text-primary"></i></button>
    @endif
</div>
