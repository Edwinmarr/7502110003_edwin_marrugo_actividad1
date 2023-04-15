<?php

include_once '../libs/Configuration.php';

class Grade extends ActiveRecord\Model
{
    static $belongs_to = array(
        array('student'),
    );
   
}

$grades = new Grade();


