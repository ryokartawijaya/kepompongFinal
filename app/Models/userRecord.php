<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class userRecord extends Model
{
    use HasFactory;

    protected $table = "user_record";

    protected $fillable = [
        'name', 'studentID', 'info','meetingID',
    ];
    public $timestamps = false;

    

}
