<?php
include_once '../model/Grades.php';

class GradesRepository {
    public static function insert ($grade){
        $state = $grade->save();
        return $state;
    }

    public static function save($grade){
        try{
            return $grade->save();
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
            return Grade::find_by_id($id);
        } catch (Exception $e) {
            throw new Exception("Error finding grade: " . $e->getMessage());
        }
    }
}
