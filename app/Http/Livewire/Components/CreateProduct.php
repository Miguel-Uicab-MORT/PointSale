<?php

namespace App\Http\Livewire\Components;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;

class CreateProduct extends Component
{

    public $create = false;
    public $producto, $categorias, $statusList;
    public $name, $description, $stock, $price, $status, $categoria_id;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'stock' => 'required',
        'price' => 'required',
        'categoria_id' => 'required',
        'status' => 'required'
    ];


    public function create()
    {
        if ($this->create == false) {
            $this->create = true;
        } else {
            $this->create = false;
            $this->reset(['name', 'description', 'stock', 'price', 'status', 'categoria_id']);
        }
    }

    public function store()
    {
        $this->validate();

        $producto = new Producto();

        $producto->name = $this->name;
        $producto->description = $this->description;
        $producto->stock = $this->stock;
        $producto->price = $this->price;
        $producto->status = $this->status;
        $producto->categoria_id = $this->categoria_id;

        $producto->save();
        $this->reset(['name', 'description', 'stock', 'price', 'categoria_id', 'status']);
        $this->emit('render');
    }

    public function mount()
    {
        $this->categorias = Categoria::pluck('name', 'id');
        $this->statusList = ['1' => 'Activo', '2' => 'Inactivo'];
    }

    public function render()
    {
        return view('livewire.components.create-product');
    }
}
