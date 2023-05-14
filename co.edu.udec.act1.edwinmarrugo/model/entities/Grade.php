<?php

namespace Act1Model\entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model{
    use HasFactory;
    public function student(){
        return $this->belongsTo(Student::class,'students_id');
    }

}
