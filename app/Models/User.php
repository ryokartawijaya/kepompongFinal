<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tb_user';
    // protected $primaryKey = 'user_id';
    protected $guarded = ['id'];
//    protected $primaryKey = 'userID';

    protected $fillable = [
        'userID',
        'name',
        'address',
        'gender',
        'email',
        'dob',
        'school',
        'grade',
        'username',
        'password',
        'category',
        'courseID',
        'userCategory',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->HasMany(Comment::class)->whereNull('parent_id');
    }

    public function userResults()
    {
        return $this->hasMany(Result::class);
    }


    public $incrementing = false;

}
