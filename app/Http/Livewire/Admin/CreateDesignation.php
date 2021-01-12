<?php

namespace App\Http\Livewire\Admin;

use App\Models\Designation;
use Livewire\Component;

class CreateDesignation extends Component
{
    public $name,$nameBn,$description,$descriptionBn;

    protected $rules = [
        'name' => 'required|string|min:6',
        'nameBn' => 'nullable|string|min:6',
        'description' => 'required|string|min:10',
        'descriptionBn' => 'nullable|string|min:10',
    ];
    public function create()
    {
        $this->validate();

        Designation::create([
            'name' => $this->name,
            'name_bn' => $this->nameBn,
            'description_bn' => $this->descriptionBn,
            'description' => $this->description,
        ]);
        $this->resetForm();
        $this->emit('designationCreated');
    }
    public function render()
    {
        return view('livewire.admin.create-designation');
    }
    private function resetForm()
    {
        $this->name = "";
        $this->nameBn = "";
        $this->description = "";
        $this->descriptionBn = "";
    }
}
