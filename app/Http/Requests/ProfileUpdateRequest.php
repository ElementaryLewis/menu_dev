<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'firstname' => ['required', 'string', 'max:255'],
			'surname' => ['required', 'string', 'max:255'],
			'email' => [
				'required',
				'string',
				'lowercase',
				'email',
				'max:255',
				function ($attribute, $value, $fail) {
					// Check if the email is already in use by another user
					$user = User::where('email', $value)->first();

					// If the email is found and it doesn't belong to the current user or the user being updated, fail the validation
		
				},
			],
		];
	}
}
