<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob', 
        'avatar',
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

    // name initials
    public function getInitialsAttribute()
    {
        $name = $this->name;
        $words = explode(' ', $name);
        $acronym = '';

        foreach ($words as $w) {
            $acronym .= $w[0];
        }

        return $acronym;
    }

    public function details()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_member_permission')
                    ->withPivot('permission_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(CustomPermission::class, 'project_member_permission', 'user_id', 'permission_id')
                    ->withPivot('project_id');
    }

    public function hasPermissionToAccess($project, $permission)
    {
        return $this->hasrole('Admin|Project Manager') || $this->permissions->contains("name", $permission);
    }
}
