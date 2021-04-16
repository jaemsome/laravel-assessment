<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Auth;
use Auth;

class SendInviteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Only allow Admin users to send invites
        // if( Auth::check() && strtolower( Auth::user()->user_role ) == 'admin' ) {
        // if( Auth::check() ) {
        if( Auth::guard('api')->check() && Auth::guard('api')->user()->user_role == 'admin' ) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
