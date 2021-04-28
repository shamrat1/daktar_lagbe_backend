<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department as ModelsDepartment;
use Livewire\Component;

class Department extends Component
{
    // public $departments;
    protected $listeners = ['departmentCreated'];

    public function render()
    {
        $departments = ModelsDepartment::latest()->paginate(20);
        return view('livewire.admin.department',compact('departments'));
    }

    public function departmentCreated()
    {
        # code...
    }

    public function edit($id)
    {
        $this->emit('editDepartment',$id);
    }

    public function delete($id)
    {
        ModelsDepartment::findOrFail($id)->delete();
    }
}
