<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class Verify extends Controller
{
    public function verify()
    {
        return view('auth.verify');
    }

    public function post_code(Request $request)
    {
        $this->validate($request, [
            'verification_code' => 'required|numeric',
            'phone_number' => 'required|string',
        ]);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($request->verification_code, array('to' => $request->phone_number));
        if ($verification->valid) {
            $user = User::where('phone_number', $request->phone_number)->update(['isVerified' => true]);
            /* Authenticate user */
            auth()->attempt($user->phone_number, $user->password);

            Tenant::create([
                'user_id' => auth()->user()->id
            ]);

            return redirect()->route('tenant')->with('tenant', 'Successfully registered as tenant');
        }
        return back()->with('error', 'Invalid verification code entered!');
    }
}
