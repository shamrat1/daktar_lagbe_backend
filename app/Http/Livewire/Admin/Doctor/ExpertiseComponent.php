<?php

namespace App\Http\Livewire\Admin\Doctor;

use App\Models\Expertise;
use Livewire\Component;

class ExpertiseComponent extends Component
{
    public $name,$nameBn,$description;

    protected $rules = [
        'name' => 'required|string',
        'nameBn' => 'nullable|string',
        'description' => 'nullable|string'
    ];

    public function render()
    {
        $expertises = Expertise::latest()->paginate(20);
        return view('livewire.admin.doctor.expertise-component',compact('expertises'));
    }

    public function save()
    {
        $this->validate();

        Expertise::create([
            'name' => $this->name,
            'name_bn' => $this->nameBn,
            'description' => $this->description,
        ]);
        $this->reset();
    }

}
