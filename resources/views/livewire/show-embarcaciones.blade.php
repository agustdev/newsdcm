<div>
    <x-input type="text" wire:model="search" placeholder="Buscar embarcación" />

    @if (count($embarcaciones))
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($embarcaciones as $emb)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" wire:model="selectedEmb" value="{{ $emb->id }}">
                    <span>{{ $emb->nombre }}</span>
                </label>
            @endforeach
        </div>
    @else
        <div class="px-2 py-2">No se encuentra información en la busqueda:
            <strong>{{ $search }}</strong>
        </div>
    @endif
</div>
