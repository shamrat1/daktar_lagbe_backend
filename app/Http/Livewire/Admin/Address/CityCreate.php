<?php

namespace App\Http\Livewire\Admin\Address;

use App\Models\City;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class CityCreate extends Component
{
    public $division_id, $name;

    protected $rules = [
        'division_id' => 'required|numeric|exists:divisions,id',
        'name' => 'required|string|unique:cities,name'
    ];

    public function render()
    {
        return view('livewire.admin.address.city-create');
    }

    public function store(Request $request)
    {
        $this->validate();
        City::create([
            'division_id' => $this->division_id,
            'name' => $this->name,
        ]);
        $this->division_id = "";
        $this->name = "";
        $this->emitTo('admin.address.cites','cityCreated');
    }
}
