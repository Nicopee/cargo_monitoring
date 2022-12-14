<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Sender extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table = 'senders';


    /**
     * Encrypt the sender password before saving
     * @param String $password Password to be encrypted
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password, [
            'rounds' => 12,
        ]);
    }
}
