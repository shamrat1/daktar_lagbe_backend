<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department as ModelsDepartment;
use Livewire\Component;

class Department extends Component
{
    public $departments;
    protected $listeners = ['departmentCreated'];

    public function render()
    {
        $this->departments = ModelsDepartment::get();
        return view('livewire.admin.department');
    }

    public function departmentCreated()
    {
        # code...
    }
}
