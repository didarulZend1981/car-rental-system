<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ✅ isAdmin() Method Add
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // ✅ isCustomer() Method Add
    public function isCustomer()
    {
        return $this->role === 'customer';
    }
}


