<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;

class CreateDepartment extends Component
{
    public $name,$nameBn,$description;
    public function create()
    {
        Department::create([
            'name' => $this->name,
            'name_bn' => $this->nameBn,
            'description' => $this->description,
        ]);
        $this->resetForm();
        $this->emit('departmentCreated');
    }
    public function render()
    {
        return view('livewire.admin.create-department');
    }
    public function resetForm()
    {
        $this->name = "";
        $this->nameBn = "";
        $this->description = "";
    }
}
