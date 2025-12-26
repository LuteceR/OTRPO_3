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

    public function comments()
    {
        return $this->hasMany(CardComment::class);
    }

    static public function getUserIdByName($username)
    {
        // Находим пользователя по имени
        $user = User::where('name', $username)->first();

        if ($user) {
            return $user->id;
        }

        return null;
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function friends()
	{
		return $this->belongsToMany(User::class, 'friends_users', 'user_id', 'friend_id');
	}

	public function addFriend(User $user)
	{
		$this->friends()->attach($user->id);
		$user->friends()->attach($this->id);
	}

    public function isFriend($user_id)
    {
        return $this->friends()->where('friend_id', $user_id)->exists();
    }

	public function removeFriend(User $user)
	{
		$this->friends()->detach($user->id);
		$user->friends()->detach($this->id);
	}
}
