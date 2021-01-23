<?php

namespace App\Http\Livewire\Hospital;

use App\Models\TestFacilty;
use Livewire\Component;
use Livewire\WithPagination;

class TestFacility extends Component
{
    use WithPagination;
    public $name,$name_bn,$price,$features,$extra;

    protected $rules = [
        'name' => 'required|string|min:6',
        'name_bn' => 'required|string|min:6',
        'features' => 'required|string|min:8',
        'price' => 'required|numeric',
        'extra' => 'nullable|string'
    ];

    public function render()
    {   
        $tests = TestFacilty::latest()->paginate(15);
        return view('livewire.hospital.test-facility',['tests'=>$tests]);
    }

    public function store()
    {
        $this->validate();
        TestFacilty::create([
            'name' => $this->name,
            'name_bn' => $this->name_bn,
            'price' => $this->price,
            'features' => $this->features,
            'extra' => $this->extra,
        ]);
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = "";
        $this->name_bn = "";
        $this->price = "";
        $this->features = "";
        $this->extra = "";
    }
}
