<?php

namespace Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model{
    static $belongs_to = array(
        array('student'),
    );
}

$grades = new Grade();


