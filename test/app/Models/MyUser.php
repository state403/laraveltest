<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyUser extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = ['id1','id2','userID'];
    protected $guarded=[];

    public $timestamps = false;
    // public $incrementing = false;
}
