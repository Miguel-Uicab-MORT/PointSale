<div>
    <x-jet-button wire:click='create'>
        Añadir Categoria
    </x-jet-button>

    <x-jet-dialog-modal wire:model='create'>

        <x-slot name="title">
            Editar Categoria
        </x-slot>
        <x-slot name="content">
            {!! Form::open() !!}
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <x-jet-label>Nombre del producto:</x-jet-label>
                    {!! Form::text('name', null, ['wire:model' => 'name', 'class' => 'form-input', 'placeholder' => 'Nombre del producto']) !!}
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Estatus:</x-jet-label>
                    {!! Form::select('status', $statusList, null, ['wire:model' => 'status', 'placeholder' => 'Elija una opción']) !!}
                    <x-jet-input-error for="status"></x-jet-input-error>
                </div>
            </div>
            {!! Form::close() !!}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click='create'>
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click='store'>
                Guardar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
