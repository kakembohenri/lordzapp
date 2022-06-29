<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $myRentals = Rental::where('user_id', auth()->user()->id)->get();
        return view('rental.index', [
            'myRentals' => $myRentals
        ]);
    }

    public function rentalForm()
    {
        return view('rental.add');
    }

    public function createRental(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'required|mimes:jpg,png,jpeg',
            'location' => 'required',
            'rent' => 'required'
        ]);

        $newAvatar = 'rental' . '-' . $request->name . "." . $request->avatar->extension();

        $request->avatar->move(public_path('img'), $newAvatar);

        // Create new rental
        Rental::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'avatar' => $newAvatar,
            'location' => $request->location,
            'rent' => $request->rent
        ]);

        return redirect()->route('rental')->with('rental_status', 'You have successfully created a new rental');
    }

    public function editRentalForm(Rental $rental)
    {
        return view('rental.edit', [
            'rental' => $rental
        ]);
    }

    public function editRental(Request $request, Rental $rental)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'rent' => 'required'
        ]);

        // Update rental
        $rental->update([
            'name' => $request->name,
            'location' => $request->location,
            'rent' => $request->rent
        ]);

        return redirect()->route('rental')->with('edit_status', 'Successfully edited rental');
    }
}
