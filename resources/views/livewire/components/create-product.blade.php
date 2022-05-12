<div>
    <x-jet-button wire:click='create'>
        Añadir Producto
    </x-jet-button>


    <x-jet-dialog-modal wire:model='create'>

        <x-slot name="title">
            Editar Producto
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

                </div>
                <div>
                    <x-jet-label>Categoria:</x-jet-label>
                    {!! Form::select('categoria_id', $categorias, null, ['wire:model' => 'categoria_id', 'placeholder' => 'Elija una opción']) !!}
                    <x-jet-input-error for="categoria_id"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Precio:</x-jet-label>
                    {!! Form::number('price', null, ['wire:model' => 'price', 'placeholder' => 'Precio del producto']) !!}
                    <x-jet-input-error for="price"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>En existencia:</x-jet-label>
                    {!! Form::number('stock', null, ['wire:model' => 'stock', 'placeholder' => 'Excistencia del producto']) !!}
                    <x-jet-input-error for="stock"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Estatus:</x-jet-label>
                    {!! Form::select('status', $statusList, null, ['wire:model' => 'status', 'placeholder' => 'Elija una opción']) !!}
                    <x-jet-input-error for="status"></x-jet-input-error>
                </div>
                <div class="col-span-2">
                    <x-jet-label>Descripción:</x-jet-label>
                    {!! Form::text('description', null, ['wire:model' => 'description', 'placeholder' => 'Descripción del producto']) !!}
                    <x-jet-input-error for="description"></x-jet-input-error>
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
