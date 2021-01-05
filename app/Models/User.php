<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function chamados()
    {
        return $this->belongsToMany(Chamado::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin()
    {
        return $this->roleExistOnUser('Admin');
    }

    public function roleExistOnUser($role)
    {
        if (is_string($role)){
            $role = Role::where('name', '=', $role)->firstOrFail();
        }

        return (boolean) $this->roles()->find($role->id);
    }

    public function addRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', '=', $role)->firstOrFail();
        }

        if ($this->roleExistOnUser($role)) {
            return;
        }

        return $this->roles()->attach($role);
    }

    public function removeRole($role)
    {
        if(is_string($role)){
            $role = Role::where('name', '=', $role)->firstOrFail();
        }

        return $this->roles()->detach($role);
    }

    public function userHaveRole($roles)
    {
        $userRoles = $this->roles;
        return $roles->intersect($userRoles)->count();
    }
}
