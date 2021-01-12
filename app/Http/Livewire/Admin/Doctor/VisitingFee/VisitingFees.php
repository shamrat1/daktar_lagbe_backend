<?php

namespace App\Http\Livewire\Admin\Doctor\VisitingFee;

use App\Models\VisitFee;
use Livewire\Component;

class VisitingFees extends Component
{
    public $fees;
    protected $listeners = ["feeCreated"];

    public function feeCreated()
    {
        # code...
    }
    public function render()
    {   
        $this->fees = VisitFee::latest()->get();
        return view('livewire.admin.doctor.visiting-fee.visiting-fees');
    }
}
