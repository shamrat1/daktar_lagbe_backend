<?php

namespace App\Http\Livewire\Admin\Doctor\VisitingFee;

use App\Models\VisitFee;
use Livewire\Component;

class CreateVisitingFee extends Component
{
    public $fee,$type;

    public function create()
    {
        VisitFee::create([
            'type' => $this->type,
            'fee' => $this->fee,
        ]);
        $this->resetForm();
        $this->emit('feeCreated');
    }
    private function resetForm()
    {
        $this->type = "";
        $this->fee = "";
    }
    public function render()
    {
        return view('livewire.admin.doctor.visiting-fee.create-visiting-fee');
    }
}
