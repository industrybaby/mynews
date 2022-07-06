<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name','gender','hobby','introduction'];

    use HasFactory;

    public static $rules = array(
        'name' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
}
