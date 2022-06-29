<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Rental;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $balance = Bill::where('tenant_id', auth()->user()->tenant->id)->where('status', 'unpaid')->sum('balance');
        $due = Bill::where('tenant_id', auth()->user()->tenant->id)->sum('due');
        $paid = Bill::where('tenant_id', auth()->user()->tenant->id)->sum('paid');

        return view('tenant.dashboard', [
            'balance' => $balance,
            'due' => $due,
            'paid' => $paid
        ]);
    }

    public function landlord_tenants()
    {
        $rentals = Rental::select('id')->where('user_id', auth()->user()->id)->get();
        return view('tenant.show', [
            'rentals' => $rentals
        ]);
    }

    public function add_tenant(Request $request, Rental $rental)
    {
        if ($request->search) {
            $search = $request->search;
            $users = User::where('first_name', $search)->orWhere('last_name', 'LIKE', $search)->get();

            return view('tenant.add', [
                'users' => $users,
                'rental' => $rental
            ]);
        } else {
            return view('tenant.add', [
                'rental' => $rental
            ]);
        }
    }

    public function update_tenant(User $user, Rental $rental)
    {
        $user->tenant()->update([
            'rental_id' => $rental->id
        ]);

        // Create bill
        Bill::create([
            'landlord_id' => $rental->user->landlord->id,
            'tenant_id' => $user->tenant->id,
            'rental_id' => $rental->id,
            'due' => $rental->rent,
            'paid' => 0,
            'balance' => $rental->rent
        ]);

        return redirect()->route('rental')->with('success', 'Added ' . $user->first_name . " " . $user->last_name . " to rental " . $rental->name);
    }
}
