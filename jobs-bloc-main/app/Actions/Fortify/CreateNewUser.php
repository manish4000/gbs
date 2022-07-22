<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {   
    

        Validator::make($input, [
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required'],
            'role' => ['required'],
            'job_category_id' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user =  User::create([
            'username' => $input['username'],
            'phone' => $input['phone'],
            'role' => $input['role'],
            'job_category_id' => $input['job_category_id'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        if($input['role'] == "candidate"){  

            

        }elseif($input['role'] == "employer"){

        }


        return $user;
    }
}
