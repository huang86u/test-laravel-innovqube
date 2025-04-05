<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Property;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingManager extends Component
{
    public $propertyId;
    public $startDate;
    public $endDate;

    public function createBooking(){
    $this->validate([
        'propertyId' => 'required|exists:properties,id',
        'startDate' => 'required|date|after_or_equal:today',
        'endDate' => 'required|date|after:startDate',
    ]);

    \App\Models\Booking::create([
        'user_id' => auth()->id(),
        'property_id' => $this->propertyId,
        'start_date' => $this->startDate,
        'end_date' => $this->endDate,
    ]);

    session()->flash('message', 'Réservation enregistrée !');
    $this->reset(['propertyId', 'startDate', 'endDate']);
}

    public function render(){
        return view('livewire.booking-manager', [
            'properties' => Property::all(),
        ]);
    }
}
