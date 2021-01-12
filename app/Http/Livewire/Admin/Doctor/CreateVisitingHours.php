<?php

namespace App\Http\Livewire\Admin\Doctor;

use App\Models\VisitHour;
use Livewire\Component;

class CreateVisitingHours extends Component
{
    public $days,$from,$to;

    public function create()
    {
        VisitHour::create([
            'days' => $this->days,
            'from' => $this->from,
            'to' => $this->to,
        ]);
        $this->resetForm();
        $this->emit('hourCreated');
    }
    public function render()
    {
        return view('livewire.admin.doctor.create-visiting-hours');
    }
    private function resetForm(){
        $this->days = "";
        $this->to = "";
        $this->from = "";
    }
}
