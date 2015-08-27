<?php

namespace IAmLegend;

use DraperStudio\Friendable\Contracts\Friendable;
use DraperStudio\Friendable\Traits\Friendable as FriendableTrait;
use IAmLegend\Traits\FollowableTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laracasts\Presenter\PresentableTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, Friendable, Teamwork
{
    use Authenticatable, CanResetPassword, PresentableTrait, FollowableTrait, FriendableTrait, Teamwork;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Path to the User Presenter
     * @var String
     */
    protected $presenter = 'IAmLegend\Presenters\UserPresenter';

    /**
     * The relationship between the User and the Status Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses()
    {
        return $this->hasMany(Status::class)->latest();
    }

    /**
     * Checks if the Authenticated user is the same as the current user's Profile
     *
     * @param $user
     * @return bool
     */
    public function is($user)
    {
        if (is_null($user)) return false;

        return $this->id == $user->id;
    }

    /**
     * The relationship between the User and the Comment Model
     *
     * @return @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_members');
    }

}
