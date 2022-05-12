<div class="p-3">

    <div class="flex items-center p-3">
        <div class="flex items-center flex-1">
            <x-jet-input class="flex-1" wire:model="search" type="text" placeholder="Buscar producto" required
                autofocus />
        </div>
        <div class="ml-2">
            @livewire('components.create-categoria')
        </div>
    </div>

    <div>
        <table class="w-full tables">
            <thead>
                <th>NOMBRE</th>
                <th>ESTADO</th>
                <th></th>
            </thead>

            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td class="text-center">
                            {{ $categoria->name }}
                        </td>
                        <td class="text-center">
                            @switch($categoria->status)
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
                        <td class="flex justify-end">
                            <x-jet-secondary-button wire:click='edit({{ $categoria }})'>
                                Actualizar
                            </x-jet-secondary-button>
                            <x-jet-danger-button class="ml-1" wire:click='delete({{ $categoria }})'>
                                Borrar
                            </x-jet-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <div class="py-1 text-center">
                            {{ $categorias->links() }}
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
