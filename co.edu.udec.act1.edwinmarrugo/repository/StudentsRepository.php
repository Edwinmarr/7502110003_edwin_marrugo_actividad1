<?php

require_once "../vendor/autoload.php";
require_once "../config/Configuration.php";

use Act1Model\entities\Student;

class StudentsRepository {
    public static function save($student){
        try{
            return $student->save();
        }catch(Exception $e){
            throw new Exception('Error saving student: ' . $e->getMessage());
        }
    }
    public static function delete($idNumber,$typeId){
        try {
            $studentFound = StudentsRepository::findStudentByIdentification($idNumber,$typeId);
            return $studentFound->delete();
        } catch (Exception $e) {
            throw new Exception("Error deleting student: " . $e->getMessage());
        }
    }
    public static function list_students(){
        return Student::all();
    }
    public static function findStudentByIdentification($idNumber,$typeId){
        try {
            return Student::where('type_id',$typeId)
                            ->where('id_number',$idNumber)
                            ->get();
        } catch (Exception $e) {
            throw new Exception("Error finding student: " . $e->getMessage());
        }
    }
    public static function findGradesByStudentIdentification($idNumber,$typeId){
        try {
            $grades = Student::where('type_id',$typeId)
            ->where('id_number',$idNumber)
            ->join('grades', 'grades.students_id', '=', 'students.id')
            ->select(
                'grades.id',
                'students.name',
                'grades.date',
                'grades.teacher',
                'grades.subject',
                'grades.carreer',
                'grades.university',
                'grades.period',
                'grades.graded_activity',
                'grades.percentage',
                'grades.activity_grade')
            ->get();
            return $grades;
        } catch (Exception $e) {
            throw new Exception("Error finding student's grades: " . $e->getMessage());
        }
    }
    public static function findStudentByEmail($email){
        try {
            return Student::where('email',$email)
                            ->first();
        } catch (Exception $e) {
            throw new Exception("Error finding student by email: " . $e->getMessage());
        }
    }
    
}


