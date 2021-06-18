<?php

namespace App\Models\Client;

use App\Enums\Client\GenderEnum;
use App\Models\Product\Product;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Kouja\ProjectAssistant\Traits\ModelTrait;

class User extends Authenticatable
{
    use HasFactory, Notifiable, ModelTrait, SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'phone',
        'password',
        'profile_img',
        'user_scope',
        'email',
        'gender',
        'birthday',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'phone_verified_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'birthday' => 'date',
    ];

    protected $enumCasts = [
        'gender' => GenderEnum::class
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function cartProducts()
    {
        return $this->belongsToMany(Product::class, 'carts', 'user_id', 'product_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getUserName($value)
    {
        $username = str_replace(' ', '_', $value);
        $userRows = $this->getAllUserSameName($username);
        $countUser = count($userRows) + 1;
        $value = ($countUser > 1) ? "{$username}_{$countUser}" : $username;
        return strtolower($value);
    }

    private function getAllUserSameName($name)
    {
        return User::whereRaw("username REGEXP '^{$name}(_[0-9]*)?$'")->get();
    }

    public function loginUser($data)
    {
        $user = null;
        if (Auth::attempt($data, true)) {
            $user = Auth::user();
        }
        return $user;
    }
}
