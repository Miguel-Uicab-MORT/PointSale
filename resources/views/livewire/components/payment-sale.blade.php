<div>
    <x-jet-button wire:click='paymentModal'>
        Pagar
    </x-jet-button>

    <x-jet-dialog-modal wire:model='paymentModal'>
        <x-slot name="title">
            Pago
        </x-slot>
        <x-slot name="content">
            <div>
                {!! Form::label('total', 'Total a pagar:', []) !!}
               <strong>$</strong>{!! Form::number('total', Cart::subtotal(), ['disabled']) !!}
            </div>

            <div>
                {!! Form::label('recibido', 'Recibido:', []) !!}
                <strong>$</strong>{!! Form::number('recibido', null, ['wire:model' => 'recibido']) !!}
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click='paymentModal'>
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click='cambioModal'>
                Cobrar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model='cambioModal'>
        <x-slot name="title">
            Detalles
        </x-slot>
        <x-slot name="content">
            <div>
                {!! Form::label('total', 'Total a pagar:', []) !!}
               <strong>$</strong>{!! Form::number('total', Cart::subtotal(), ['disabled']) !!}
            </div>

            <div>
                {!! Form::label('recibido', 'Recibido:', []) !!}
                <strong>$</strong>{!! Form::number('recibido', $recibido, ['disabled']) !!}
            </div>
            <div>
                {!! Form::label('total', 'Cambio', []) !!}
               <strong>$</strong>{!! Form::number('total', $cambio, ['disabled']) !!}
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click='cambioModal'>
                Finalizar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
