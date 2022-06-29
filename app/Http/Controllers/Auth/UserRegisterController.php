<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Landlord;
use App\Models\Tenant;
use App\Models\User;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function RegisterLandlord(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'phonenumber' => 'required',
            'password' => 'required|confirmed'
        ]);

        // Create user 'landlord'
        User::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'phone_number' => $request->phonenumber,
            'password' =>  Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        // dd(auth()->user());
        Landlord::create([
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('landlord')->with('status_landlord', 'Successfully registered as landlord');
    }


    public function RegisterTenant(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'phonenumber' => 'required|numeric',
            'avatar' => 'required|mimes:jpg,png,jpeg',
            'password' => 'required|confirmed'
        ]);

        $newAvatar = 'avatar' . '-' . $request->firstname . ' ' . $request->lastname . '.' . $request->avatar->extension();

        $request->avatar->move(public_path('img'), $newAvatar);

        // /* Get credentials from .env */
        // $token = getenv("TWILIO_AUTH_TOKEN");
        // $twilio_sid = getenv("TWILIO_SID");
        // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        // $twilio = new Client($twilio_sid, $token);
        // $twilio->verify->v2->services($twilio_verify_sid)
        //     ->verifications
        //     ->create($request->phonenumber, "sms");


        // Create user 'tenant'
        User::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'phone_number' => $request->phonenumber,
            'avatar' => $newAvatar,
            'password' =>  Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        Tenant::create([
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('tenant')->with('tenant', 'Successfully registered as tenant');

        // return redirect()->route('verify')->with(['phone_number' => $request->phonenumber]);
    }
}
