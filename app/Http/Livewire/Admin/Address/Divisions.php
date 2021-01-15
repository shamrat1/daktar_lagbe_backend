<?php

namespace App\Http\Livewire\Admin\Address;

use App\Models\Division;
use Livewire\Component;

class Divisions extends Component
{
    public $divisions;
    
    protected $listeners = [
        'divisionCreated' => '$refresh',
    ];

    public function render()
    {
        $this->divisions = Division::latest()->get();
        return view('livewire.admin.address.divisions');
    }

    public function delete($id)
    {
        Division::find($id)->delete();
    }

    public function edit($id)
    {
        // Division::find($id)->delete();
    }
}
