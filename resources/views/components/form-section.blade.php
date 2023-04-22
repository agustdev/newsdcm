@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>
    <div class="card">
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-section-title>
        <form wire:submit.prevent="{{ $submit }}">
            <div class="card-body">
                <div class="">
                    <div class="">
                        {{ $form }}
                    </div>
                </div>
            </div>
            @if (isset($actions))
            <div class="card-footer">
                {{ $actions }}
            </div>
            @endif
        </form>

    </div>

</div>
