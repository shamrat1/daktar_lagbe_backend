<?php

namespace App\Http\Livewire\Admin\Address;

use App\Models\City;
use Livewire\Component;

class Cities extends Component
{
    public $cities;

    protected $listeners = [
        'cityCreated' => '$refresh'
    ];

    public function render()
    {
        $this->cities = City::with('division')->get(['id','name','division_id']);
        return view('livewire.admin.address.cities');
    }
}
