<?php

namespace App\Http\Livewire\Hospital;

use App\Models\Services as ModelsServices;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{    
    use WithPagination;
    
    public $name,$name_bn,$days,$features,$price;

    protected $rules = [
        'name' => 'required|string',
        'name_bn' => 'required|string',
        'price' => 'required|numeric',
        'features' => 'nullable|string',
        'days' => 'nullable|numeric',
    ];

    public function render()
    {
        $services = ModelsServices::latest()->paginate(15);
        return view('livewire.hospital.services',['services' => $services]);
    }

    public function submit()
    {
        $this->validate();
        ModelsServices::create([
            'name' => $this->name,
            'name_bn' => $this->name_bn,
            'price' => $this->price,
            'features' => $this->features,
            'days' => $this->days,
        ]);
    }
}
