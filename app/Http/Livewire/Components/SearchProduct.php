<?php

namespace App\Http\Livewire\Components;

use App\Models\Producto;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class SearchProduct extends Component
{
    public $search;
    public $producto;


    public function addItem(Producto $producto)
    {
        $this->producto = $producto;

        Cart::add([
            'id' => $this->producto->id,
            'name' => $this->producto->description,
            'qty' => 1,
            'price' => $this->producto->price,
            'weight' => 550,
        ]);

        $this->emit('render');
    }

    public function render()
    {
        $productos = Producto::where('name', 'LIKE', '%' . $this->search . '%')
            ->orderBy('name', 'Desc')->get();

        return view('livewire.components.search-product', compact('productos'));
    }
}
