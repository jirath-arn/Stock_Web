<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\HistoryAuthentication;
use App\Models\HistoryTransaction;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'last_login_at',
        'last_logout_at',
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
        'email_verified_at' => 'timestamp',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function history_authentications()
    {
        return $this->hasMany(HistoryAuthentication::class);
    }

    public function history_transactions()
    {
        return $this->hasMany(HistoryTransaction::class);
    }
}
