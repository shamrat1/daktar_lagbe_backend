<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;

class CreateDepartment extends Component
{
    public $name,$nameBn,$description,$dept_id;

    protected $listeners = [
        'editDepartment'
    ];

    public function create()
    {
        Department::updateOrcreate([
            'id' => $this->dept_id
        ],[
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
    public function editDepartment($id)
    {
        $dept = Department::findOrFail($id);
        $this->dept_id = $dept->id;
        $this->name = $dept->name;
        $this->nameBn = $dept->name_bn;
        $this->description = $dept->description;
    }
    public function resetForm()
    {
        $this->dept_id = null;
        $this->name = "";
        $this->nameBn = "";
        $this->description = "";
    }
}
