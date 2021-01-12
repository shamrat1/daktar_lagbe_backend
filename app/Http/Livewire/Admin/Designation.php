<?php

namespace App\Http\Livewire\Admin;

use App\Models\Designation as ModelsDesignation;
use Livewire\Component;

class Designation extends Component
{
    public $designations;
    public  $listeners = ["designationCreated"];

    public function render()
    {
        $this->designations = ModelsDesignation::latest()->get();    
        return view('livewire.admin.designation');
    }

    public function designationCreated()
    {
        # code...
    }
}
