<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MjuStudent extends Model
{
    use HasFactory;
    protected $primaryKey = 'student_code';
    // protected $table = 'mju_sutdents';

    public function major(){
        return $this->belongsTo(Major::class,'major_id');
    }

    protected $fillable = [
        'student_code',
        'first_name',
        'last_name',
        'first_name_en' ,
        'last_name_en',
        'major_id' ,
        'idcard',
        'gender',
        'birthdate',
        'address',
        'phone' ,
        'email',
    ];

}