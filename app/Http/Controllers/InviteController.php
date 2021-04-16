<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Invite;
use App\Http\Requests\SendInviteRequest;
//use Illuminate\Support\Facades\Auth;
// use Auth; 

class InviteController extends Controller
{
    public function invite(Request $request)
    {
        // $validated = $request->validated();

        // // if( !Auth::check() ) {
        // if( !Auth::guard('api')->check() ) {
        //     return 'Opps cannot invite.';
        // }

        do {
            // Generate token
            $token = Str::random(16);
        } // Check if token already exists
        while(Invite::where('token', $token)->first());

        // Create new invite record
        $invite = Invite::create([
            'email' => $request['email'],
            'token' => $token
        ]);

        // send an invitation email, but i don't have an SMTP server

        return redirect()->back();
    }

    public function accept($token)
    {
        // Validate token invitation
        if(!$invite = Invite::where('token', $token)->first()) {
            abort(404); // Terminate if invalid token
        }

        // Delete the invitation after validation so it cannot be used again
        $invite->delete();

        // Here it will show the registration form to create an account.
        echo 'Show the registration form.';
    }
}
