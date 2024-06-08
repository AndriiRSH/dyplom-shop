<?php

namespace App\Http\Controllers\Admin\Consultation;

use App\Models\Consultation;
use App\Models\Order;
use App\Models\Product;

class ConsultationController
{
    public function index()
    {
        $consultations = Consultation::all();
        return view('admin.consultation.index', compact('consultations'));
    }

    public function show(Consultation $consultation)
    {
        return view('admin.order.show', compact('consultation'));
    }

    public function delete(Consultation $consultation)
    {
        $consultation->delete();
        return redirect()->route('consultation.index');
    }
}
