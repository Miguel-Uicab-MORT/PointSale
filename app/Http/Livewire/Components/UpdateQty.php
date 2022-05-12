<?php

namespace App\Http\Livewire\Components;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class UpdateQty extends Component
{
    protected $listeners = ['render' => 'render'];

    public $rowId, $qty;

    public function mount()
    {
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;
    }

    public function addItem()
    {
        $this->qty = $this->qty + 1;
        Cart::update($this->rowId, $this->qty);
        $this->emit('render');
    }

    public function removeItem()
    {
        $this->qty = $this->qty - 1;
        Cart::update($this->rowId, $this->qty);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.components.update-qty');
    }
}
