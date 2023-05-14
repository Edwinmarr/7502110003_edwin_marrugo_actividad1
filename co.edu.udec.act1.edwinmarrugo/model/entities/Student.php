<?php

namespace Act1Model\entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model{

  use HasFactory;

    public function grades(){
      return $this->hasMany(Grade::class,'id');
    }
   
}