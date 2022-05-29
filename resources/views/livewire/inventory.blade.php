<div class="container mx-auto p-3">

    <div class="flex items-center p-3">
        <div class="flex items-center flex-1">
            <x-jet-input class="flex-1" wire:model="search" type="text" placeholder="Buscar producto" required
                autofocus />
        </div>
        @can('product.create')
            <div class="ml-2">
                @livewire('components.create-product')
            </div>
        @endcan

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
                            {{ $producto->barcode }}

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
                        <td class="font-bold text-center">
                            <b>$</b>{{ number_format($producto->price, 2, '.', ',') }}
                        </td>
                        <td class="flex justify-end">
                            @can('product.edit')
                                <x-jet-secondary-button wire:click='edit({{ $producto }})'>
                                    Editar
                                </x-jet-secondary-button>
                            @endcan
                            @can('product.delete')
                                <x-jet-danger-button class="ml-1" wire:click='delete({{ $producto }})'>
                                    Borrar
                                </x-jet-danger-button>
                            @endcan
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
            Editar producto
        </x-slot>
        <x-slot name="content">
            {!! Form::open() !!}
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <x-jet-label>Categoria:</x-jet-label>
                    {!! Form::select('ecategoria_id', $categorias, null, ['wire:model' => 'producto.categoria_id', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="producto.categoria_id"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Nombre del producto:</x-jet-label>
                    {!! Form::text('ename', null, ['wire:model' => 'producto.name', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="producto.name"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Slug:</x-jet-label>
                    {!! Form::text('eslug', null, ['wire:model' => 'producto.slug', 'class' => 'form-input', 'disabled']) !!}
                    <x-jet-input-error for="producto.slug"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Descripción:</x-jet-label>
                    {!! Form::text('edescription', null, ['wire:model' => 'producto.description', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="producto.description"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Costo:</x-jet-label>
                    {!! Form::number('ecost', null, ['wire:model' => 'producto.cost', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="producto.cost"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Precio:</x-jet-label>
                    {!! Form::number('eprice', null, ['wire:model' => 'producto.price', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="producto.price"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>En existencia:</x-jet-label>
                    {!! Form::number('estock', null, ['wire:model' => 'producto.stock', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="producto.stock"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Estatus:</x-jet-label>
                    {!! Form::select('estatus', $statusList, null, ['wire:model' => 'producto.status', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="producto.status"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Codigo de barras:</x-jet-label>
                    {!! Form::number('ebarcode', null, ['wire:model' => 'producto.barcode', 'class' => 'form-input', 'disabled']) !!}
                    <x-jet-input-error for="producto.barcode"></x-jet-input-error>
                </div>
                @if ($barcode != null)
                    <div class="flex items-center justify-center">
                        {!! DNS1D::getBarcodeHTML($barcode, 'EAN8') !!}
                    </div>
                @endif

            </div>
            {!! Form::close() !!}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button class="mr-3" wire:click='edit({{ $producto }})'>
                Cancelar
            </x-jet-secondary-button>
            @can('product.update')
                <x-jet-button wire:click='update'>
                    Actualizar
                </x-jet-button>
            @endcan
        </x-slot>

    </x-jet-dialog-modal>
</div>
