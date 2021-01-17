<?php

namespace App\Http\Livewire\Admin\Address;

use App\Models\City;
use Livewire\Component;

class Cities extends Component
{
    // public $cities;

    protected $listeners = [
        'cityCreated' => 'refresh'
    ];

    public function render()
    {
        $cities = City::with('division')->select(['id','name','division_id'])->orderBy('id','desc')->paginate(15);
        return view('livewire.admin.address.cities',['cities' => $cities]);
    }

    public function refresh()
    {
        # code...
    }
}
