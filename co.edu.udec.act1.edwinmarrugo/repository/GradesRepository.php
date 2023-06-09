<?php

require_once "../vendor/autoload.php";
require_once "../config/Configuration.php";
require_once "../repository/StudentsRepository.php";

use Act1Model\entities\Grade;

class GradesRepository {

    public static function save($grade,$student){
        try{
            $grade->student()->associate($student);
            return $grade->save();
        }catch(Exception $e){
            throw new Exception('Error saving grade: ' . $e->getMessage());
        }
    }
    public static function edit($grade){
        try{
            return $grade->update();
        }catch(Exception $e){
            throw new Exception('Error saving grade: ' . $e->getMessage());
        }
    }
    public static function delete($id){
        try {
            $gradeFound = GradesRepository::findGradeById($id);
            return $gradeFound->delete();
        } catch (Exception $e) {
            throw new Exception("Error deleting grade: " . $e->getMessage());
        }
    }
    public static function list_grades(){
        return Grade::all();
    }
    public static function findGradeById($id){
        try {
            return Grade::where('id',$id)->first();
        } catch (Exception $e) {
            throw new Exception("Error finding grade: " . $e->getMessage());
        }
    }
}
$result = GradesRepository::list_grades();
echo $result;
