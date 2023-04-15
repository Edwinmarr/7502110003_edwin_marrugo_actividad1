<?php

include_once '../model/Student.php';


class StudentsRepository {
    public static function save($student){
        try{
            return $student->save();
        }catch(Exception $e){
            throw new Exception('Error saving student: ' . $e->getMessage());
        }
    }
    public static function delete($id){
        try {
            $studentFound = StudentsRepository::findStudentByIdNumber($id);
            return $studentFound->delete();
        } catch (Exception $e) {
            throw new Exception("Error deleting student: " . $e->getMessage());
        }
    }
    public static function list_students(){
        return Student::all();
    }
    public static function findStudentById($id){
        try {
            return Student::find_by_id($id);
        } catch (Exception $e) {
            throw new Exception("Error finding student: " . $e->getMessage());
        }
    }
    public static function findStudentGradeById($student_id){
        try {
            $student = Student::find_by_id(1);
            return $student->getGrades();
        } catch (Exception $e) {
            throw new Exception("Error finding grades: " . $e->getMessage());
        }
    }
    
}


$student = StudentsRepository::findStudentGradeById(1);

if ($student) {
    foreach ($result as $key => $grades) {
        echo "<b>Id:</b>  $key<br/>";
        echo "<b>teacher:</b>  $key<br/>";
        echo "<b>university:</b>  $key<br/>";
    }
}