<?php

namespace App\Http\Livewire\Admin\Address;

use App\Models\Division;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class DivisionCreate extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|unique:divisions,name'
    ];

    public function render()
    {
        return view('livewire.admin.address.division-create');
    }

    public function store(Request $request)
    {
        $this->validate();
        Division::create([
            'name' => $this->name
        ]);
        $this->name = "";
        $this->emitTo('admin.address.divisions','divisionCreated');
    }
}
