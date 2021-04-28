<?php

namespace App\Http\Livewire\Admin;

use App\Models\Designation as ModelsDesignation;
use Livewire\Component;

class Designation extends Component
{
    // public $designations;
    protected  $listeners = ["designationCreated"];

    public function render()
    {
        $designations = ModelsDesignation::latest()->paginate(20);    
        return view('livewire.admin.designation',compact('designations'));
    }

    public function designationCreated()
    {
        # code...
    }

    public function edit($id)
    {
        $this->emit('editDesignation',$id);
    }
}
