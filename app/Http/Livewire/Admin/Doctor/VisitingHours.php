<?php

namespace App\Http\Livewire\Admin\Doctor;

use App\Models\VisitHour;
use Livewire\Component;

class VisitingHours extends Component
{
    public $hours;
    protected $listeners = ["hourCreated"];
    
    public function hourCreated()
    {
        # code...
    }
    public function render()
    {
        $this->hours = VisitHour::latest()->get();
        return view('livewire.admin.doctor.visiting-hours');
    }
}
