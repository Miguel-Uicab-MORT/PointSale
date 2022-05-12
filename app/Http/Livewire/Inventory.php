<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class Inventory extends Component
{
    use WithPagination;

    public $search;
    public $producto, $categorias, $statusList;
    public $edit = false;

    protected $listeners = ['render' => 'render'];

    protected $rules = [
        'producto.barcode' => 'required',
        'producto.name' => 'required',
        'producto.description' => 'required',
        'producto.stock' => 'required',
        'producto.price' => 'required',
        'producto.status' => 'required',
        'producto.categoria_id' => 'required'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit(Producto $producto)
    {
        $this->producto = $producto;
        $this->validate();

        if ($this->edit == false) {
            $this->edit = true;
        } elseif ($this->edit == true) {
            $this->edit = false;
            $this->reset(['producto']);
        }
    }

    public function update()
    {
        $this->validate();

        $this->producto->save();

        $this->edit = false;

        $this->emit('render');

    }

    public function delete(Producto $producto)
    {
        $this->producto = $producto;
        $this->producto->delete();
        $this->render();
    }

    public function mount()
    {
        $this->categorias = Categoria::pluck('name', 'id');
        $this->statusList = ['1' => 'Activo', '2' => 'Inactivo'];
    }

    public function render()
    {
        $productos = Producto::where('name', 'LIKE', '%' . $this->search . '%')
            ->orderBy('name', 'Desc')->paginate('15');

        return view('livewire.inventory', compact('productos'));
    }
}
