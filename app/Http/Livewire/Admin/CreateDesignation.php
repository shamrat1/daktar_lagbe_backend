<?php

namespace App\Http\Livewire\Admin;

use App\Models\Designation;
use Livewire\Component;

class CreateDesignation extends Component
{
    public $name,$nameBn,$description,$descriptionBn,$designation_id;

    protected $rules = [
        'name' => 'required|string|min:6',
        'nameBn' => 'nullable|string|min:6',
        'description' => 'required|string|min:10',
        'descriptionBn' => 'nullable|string|min:10',
    ];

    protected $listeners = [
        'editDesignation'
    ];

    public function create()
    {
        $this->validate();

        Designation::updateOrCreate([
            'id' => $this->designation_id
        ],[
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

    public function editDesignation($id)
    {
        $data = Designation::findOrFail($id);
        $this->designation_id = $data->id;
        $this->name = $data->name;
        $this->nameBn = $data->name_bn;
        $this->descriptionBn = $data->description_bn;
        $this->description = $data->description;
    }

    private function resetForm()
    {
        $this->designation_id = null;
        $this->name = "";
        $this->nameBn = "";
        $this->description = "";
        $this->descriptionBn = "";
    }
}
