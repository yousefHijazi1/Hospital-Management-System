<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required','string','email','max:191',Rule::unique(User::class),],
            'phone' => ['required', 'digits:8'],
            'address' => ['required', 'string', 'max:191'],
            'role' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone'=>$input['phone'],
            'address'=>$input['address'],
            'role'=>$input['role'],
            'password' => Hash::make($input['password']),
        ]);


    }
}
