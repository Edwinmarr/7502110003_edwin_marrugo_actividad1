<?php

include_once '../libs/Configuration.php';

class Student extends ActiveRecord\Model
{
  protected $primaryKey = 'id';
  static $has_many = array(
    array('grades')
  );
  public function getGrades() {
    return $this->grades;
  }
   
}

try {
  $student = Student::find_by_id(1);
  $result = $student->getGrades();
  if ($result) {
    foreach ($result as $key => $grades) {
      echo "<b>Id:</b>  $grades->id<br/>";
      echo "<b>pass:</b>  $grades->teacher<br/>";
      echo "<b>email:</b>  $grades->university<br/>";
  }
  }
  
  echo "<b>email:</b>  $student->name<br/>";
} catch (Exception $e) {
  throw new \Exception($e->getMessage);
}
