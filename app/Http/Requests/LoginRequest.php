<?php
/** 
 * it-jobSight. 
**/

namespace App\Http\Requests;

use Illuminate\Support\Str;

class LoginRequest extends AuthRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		// If previous page is not the Login page...
		if (!Str::contains(url()->previous(), 'login')) {
			// Save the previous URL to retrieve it after success or failed login.
			session()->put('url.intended', url()->previous());
		}
		
		$rules = parent::rules();
		
		$rules['password'] = ['required'];
		
		return $rules;
	}
}
