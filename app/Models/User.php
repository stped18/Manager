<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;



    use HasChildren;

    protected $childTypes = [
        'developer' => Developer::class,
        'customer' => Customer::class,
        "projectmanager"=>ProjectManager::class
    ];

    public function isDeveloper(): bool
    {
        return $this->type === 'developer';
    }

    public function isCustomer(): bool
    {
        return $this->type === 'customer';
    }
    public function isProjectmanager(): bool
    {
        return $this->type === 'projectmanager';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
