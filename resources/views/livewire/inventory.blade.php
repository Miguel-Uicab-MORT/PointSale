<div class="p-3">

    <div class="flex items-center p-3">
        <div class="flex items-center flex-1">
            <x-jet-input class="flex-1" wire:model="search" type="text" placeholder="Buscar producto" required
                autofocus />
        </div>
        <div class="ml-2">
            @livewire('components.create-product')
        </div>
    </div>

    <div>
        <table class="w-full tables">
            <thead>
                <th>CODIGOS</th>
                <th>CATEGORIA</th>
                <th>NOMBRE</th>
                <th>DESCRIPCIÓN</th>
                <th>ESTADO</th>
                <th>EXISTENCIA</th>
                <th>PRECIO</th>
                <th></th>
            </thead>

            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td class="text-center">
                            {{ $producto->categoria->name }}
                        </td>
                        <td class="text-center">
                            {{ $producto->categoria->name }}
                        </td>
                        <td>
                            {{ $producto->name }}
                        </td>
                        <td>
                            {{ $producto->description }}
                        </td>
                        <td class="text-center">
                            @switch($producto->status)
                                @case(1)
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-green-500 rounded-full">
                                        Activo
                                    </span>
                                @break

                                @case(2)
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-red-800 rounded-full">
                                        Inactivo
                                    </span>
                                @break

                                @default
                            @endswitch
                        </td>
                        <td class="text-center">
                            {{ $producto->stock }}
                        </td>
                        <td class="text-center font-bold">
                            <b>$</b>{{ number_format($producto->price, 2, '.', ',') }}
                        </td>
                        <td class="flex justify-end">
                            <x-jet-secondary-button wire:click='edit({{ $producto }})'>
                                Actualizar
                            </x-jet-secondary-button>
                            <x-jet-danger-button class="ml-1" wire:click='delete({{ $producto }})'>
                                Borrar
                            </x-jet-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">
                        <div class="py-1 text-center">
                            {{ $productos->links() }}
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <x-jet-dialog-modal wire:model='edit'>

        <x-slot name="title">

        </x-slot>
        <x-slot name="content">
            {!! Form::open() !!}
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <x-jet-label>Nombre del producto:</x-jet-label>
                    {!! Form::text('ename', null, ['wire:model' => 'producto.name', 'class' => 'form-input', 'placeholder' => 'Nombre del producto']) !!}
                    <x-jet-input-error for="producto.name"></x-jet-input-error>
                </div>
                <div>

                </div>
                <div>
                    <x-jet-label>Categoria:</x-jet-label>
                    {!! Form::select('ecategoria_id', $categorias, null, ['wire:model' => 'producto.categoria_id', 'placeholder' => 'Elija una opción']) !!}
                    <x-jet-input-error for="producto.categoria_id"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Precio:</x-jet-label>
                    {!! Form::number('eprice', null, ['wire:model' => 'producto.price', 'placeholder' => 'Precio del producto']) !!}
                    <x-jet-input-error for="producto.price"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>En existencia:</x-jet-label>
                    {!! Form::number('estock', null, ['wire:model' => 'producto.stock', 'placeholder' => 'Excistencia del producto']) !!}
                    <x-jet-input-error for="producto.stock"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Estatus:</x-jet-label>
                    {!! Form::select('estatus', $statusList, null, ['wire:model' => 'producto.status', 'placeholder' => 'Elija una opción']) !!}
                    <x-jet-input-error for="producto.status"></x-jet-input-error>
                </div>
                <div class="col-span-2">
                    <x-jet-label>Descripción:</x-jet-label>
                    {!! Form::text('edescription', null, ['wire:model' => 'producto.description', 'placeholder' => 'Descripción del producto']) !!}
                    <x-jet-input-error for="producto.description"></x-jet-input-error>
                </div>
            </div>
            {!! Form::close() !!}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click='edit({{ $producto }})'>
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click='update'>
                Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
