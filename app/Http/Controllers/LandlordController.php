<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class LandlordController extends Controller
{
    public function index()
    {
        $bills = Bill::where('landlord_id', auth()->user()->landlord->id)->where('paid', '0')->get();
        $due = Bill::where('landlord_id', auth()->user()->landlord->id)->sum('due');
        $paid = Bill::where('landlord_id', auth()->user()->landlord->id)->sum('paid');
        $tenants = Bill::select('tenant_id')->where('landlord_id', auth()->user()->landlord->id)->latest()->distinct()->get();
        $updates = Bill::where('landlord_id', auth()->user()->landlord->id)->latest()->get();
        return view('landlord.dashboard', [
            'bills' => $bills,
            'due' => $due,
            'paid' => $paid,
            'updates' => $updates,
            'tenants' => $tenants
        ]);
    }
}
