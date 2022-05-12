<div class="p-3">
    <div class="flex items-center p-3">
        <div class="flex items-center flex-1">
            <x-jet-input class="flex-1" wire:model="search" type="text" placeholder="Buscar producto" required
                autofocus />
        </div>
    </div>

    <div>
        <table class="w-full tables">
            <thead>
                <th>CATEGORIA</th>
                <th>NOMBRE</th>
                <th>DESCRIPCIÓN</th>
                <th>EXISTENCIA</th>
                <th>PRECIO</th>
                <th></th>
            </thead>

            @if ($search != null)
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
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
                                {{ $producto->stock }}
                            </td>
                            <td class="text-center font-bold">
                                <b>$</b>{{ number_format($producto->price, 2, '.', ',') }}
                            </td>
                            <td>
                                <x-jet-button wire:click='addItem({{ $producto }})'>
                                    VENDER
                                </x-jet-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="py-3 text-center">
                                <span class="text-lg text font-bold text-gray-700">
                                    Aun no ha realizado ninguna busqueda.
                                </span>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            @endif
        </table>
    </div>
</div>
