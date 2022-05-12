<?php

namespace App\Http\Livewire\Components;

use App\Models\Venta;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class PaymentSale extends Component
{
    public $paymentModal = false;
    public $cambioModal = false;
    public $recibido;
    public $cambio = 0;


    public function paymentModal()
    {
        if ($this->paymentModal == false) {
            $this->paymentModal = true;
        } elseif ($this->paymentModal == true) {
            $this->paymentModal = false;
        }
    }

    public function cambioModal()
    {
        if ($this->cambioModal == false) {
            $this->cambioModal = true;

            $this->cambio = $this->recibido - Cart::subtotal();
            $this->paymentSale();
        } elseif ($this->cambioModal == true) {
            $this->cambioModal = false;
            $this->paymentModal = false;

            Cart::destroy();
            redirect()->route('pointsale.create');
        }
    }

    public function paymentSale()
    {
        $venta = new Venta();

        $venta->total = Cart::subtotal();
        $venta->recibido = $this->recibido;
        $venta->cambio = $this->cambio;
        $venta->content = Cart::content();
        $venta->user_id = auth()->user()->id;

        $venta->save();
    }

    public function render()
    {
        return view('livewire.components.payment-sale');
    }
}
