<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPasswordNotification;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'images',
        'gender',
        'birthday',
        'address',
        'phone',
        'is_active',
        'department',
        'rank',
        'team'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     // SEARCH FUNCTIONS
     public function scopeSearch($query, ...$colums)
     {
         $keyWord = request()->search;
         foreach ($colums as $colum) {
             $query->orWhere($colum, 'like', "%$keyWord%");
         }
     }

     public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function getOder()
    {
        return $this->hasMany('App\Models\Oder', 'user_id');
    }

    public function getWork()
    {
        return $this->hasMany('App\Models\Oder', 'pic_id');
    }

    public function getSocial()
    {
        return $this->hasMany('App\Models\Oder', 'pic_social_id');
    }
}
