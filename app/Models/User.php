<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'status',
        'avatar',
        'address'
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
        'password' => 'hashed',
    ];

    public function getRoleLabelAttribute()
    {
        return match ($this->role) {
            'admin' => ['class' => 'badge bg-soft-warning text-warning', 'text' => 'Quản trị viên'],
            'staff' => ['class' => 'badge bg-soft-teal text-teal', 'text' => 'Nhân viên'],
            default => ['class' => 'badge bg-soft-success text-success', 'text' => 'Khách hàng'],
        };
    }

    public function getStatusLabelAttribute()
    {
        //Trạng thái tài khoản bị soft delete
        if ($this->trashed()) {
            return ['class' => 'badge bg-soft-danger text-danger', 'text' => 'Tài khoản bị khóa'];
        }
        return match ($this->status) {
            default => ['class' => 'badge bg-soft-success text-success', 'text' => 'Hoạt động'],
        };
    }
}
