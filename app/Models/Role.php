<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function permissionExistOnRole($permission)
    {
        if(is_string($permission)){
            $permission = Permission::where('name', '=', $permission)->firstOrFail();
        }

        return (boolean) $this->permissions()->find($permission->id);
    }

    public function addPermissionOnRole($permission)
    {
        if(is_string($permission)){
            $permission = Permission::where('name', '=', $permission)->firstOrFail();
        }

        if($this->permissionExistOnRole($permission)){
            return;
        }

        return $this->permissions()->attach($permission);
    }

    public function removePermissionOnRole($permission)
    {
        if(is_string($permission)){
            $permission = Permission::where('name', '=', $permission)->firstOrFail();
        }

        return $this->permissions()->detach();
    }
}
