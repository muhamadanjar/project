<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Officer\Officer;
use App\Post\Post;
use App\Post\Comment;
class User extends Authenticatable
{
    use Notifiable;
    const ROLE_ADMIN = 'admin';
    const ROLE_EDITOR = 'editor';
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected function hasTooManyLoginAttempts(Request $request){
        $maxLoginAttempts = 3;
    
        $lockoutTime = 15; // Dalam menit
    
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), $maxLoginAttempts, $lockoutTime
        );
    }
    public function getNameAttribute(){
        return $this->attributes['name'];
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function permissions(){
        return $this->hasManyThrough(Permission::class, Role::class);
    }
    public function isSuper(){
       if ($this->roles->contains('name', 'admin')) {
            return true;
        }
        return false;
    }
    public function isManager(){
       if ($this->roles->contains('name', 'manager')) {
            return true;
        }
        return false;
    }
    public function isRole($level){
       if ($this->roles->contains('name', $level)) {
            return true;
        }
        return false;
    }
    public function hasRole($role){
        if ($this->isSuper()) {
            return true;
        }
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
        return !! $this->roles->intersect($role)->count();
    }
    public function assignRole($role){
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }
        return $this->roles()->attach($role);
    }
    public function revokeRole($role){
        if (is_string($role)) {
            $role = Role::where('name', $role)->first();
        }
        return $this->roles()->detach($role);
    }
    public function officers(){
        return $this->hasOne(Officer::class);
        //return $this->hasMany(Officer::class);
    }
    public function posts(){
        return $this->hasMany(Post::class, 'author_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'author_id');
    }
}
