<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Agent extends Authenticatable
{
    use HasFactory, HasApiTokens;

    /**
     * Encrypt the agent password before saving
     * @param String $password Password to be encrypted
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password, [
            'rounds' => 12,
        ]);
    }
}
