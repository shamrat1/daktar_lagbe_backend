<?php

namespace App\Http\Livewire\Hospital;

use App\Models\Surgery as ModelsSurgery;
use Livewire\Component;
use Livewire\WithPagination;

class Surgery extends Component
{
    use WithPagination;
    public $name,$name_bn,$features,$extra,$price;
    protected $rules = [
        'name' => 'required|string|min:6',
        'name_bn' => 'required|string|min:6',
        'price' => 'required|numeric',
        'features' => 'nullable|string',
        'extra' => 'nullable|string',
    ];
    public function render()
    {
        $surgeries = ModelsSurgery::latest()->paginate(15);
        return view('livewire.hospital.surgery',['surgeries' => $surgeries]);
    }

    public function submit()
    {
        $this->validate();

        ModelsSurgery::create([
            'name' => $this->name,
            'name_bn' => $this->name_bn,
            'price' => $this->price,
            'features' => $this->features,
            'extra' => $this->extra
        ]);
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->name = "";
        $this->name_bn = "";
        $this->price = "";
        $this->features = "";
        $this->extra = "";
    }
}
