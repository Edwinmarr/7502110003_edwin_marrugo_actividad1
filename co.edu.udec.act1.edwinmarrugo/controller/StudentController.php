<?php

require_once "../repository/StudentsRepository.php";
require_once "../repository/GradesRepository.php";

use Act1Model\entities\Student;
use Act1Model\entities\Grade;

if(isset($_POST['action'])){
    $action = $_POST['action'];
    StudentController::action($action);
}

if(isset($_GET['getEditForm']) && isset($_GET['id'])){
    StudentController::action("getEditForm");
}

if(isset($_GET['delete']) && isset($_GET['id'])){
    StudentController::action("deleteGrade");
}

class StudentController {

    public static function action($action){
        
        if($action == "Iniciar sesión"){
            echo "Entró a iniciar sesión";
            $formEmail = $_POST['email'];
            $formPassword = $_POST['password'];
            StudentController::login($formEmail,$formPassword);
        }elseif ($action == "register") {
            echo "entró al registro";
            StudentController::register();
        }elseif ($action == "save") {
            echo "Entró al agregar";
            session_start();
            StudentController::saveGrade();
        }elseif ($action == "getEditForm") {
            StudentController::getEditForm($_GET['id']);
        }elseif ($action == "editGrade") {
            StudentController::editGrade($_GET['id']);
        }elseif ($action == "deleteGrade") {
            StudentController::deleteGrade($_GET['id']);
        }
    }
    public static function login($formEmail,$formPassword){
        try {
            $studentFound = StudentsRepository::findStudentByEmail($formEmail);
            if(StudentController::passwordMatches($studentFound,$formPassword)){
                session_start();
                $_SESSION['studentName'] = $studentFound->name;
                $_SESSION['student'] = $studentFound;
                $_SESSION['grades']=  StudentsRepository::findGradesByStudentIdentification($studentFound->id_number,$studentFound->type_id);
                header("location: ../view/users/table_page.php");
            }else {
                //throw new Exception("Password did not match");
                header("location: ../view/users/login.php?login=false&error='passwordMismatch'");
            }
        } catch (Exception $e) {
            //throw new Exception("Error starting session. Try Again: " . $e->getMessage());
            header("location: ../view/users/login.php?login=false&error='loginError'");
        }
    }
    public static function register(){
        $name              = $_POST['name'];
        $lastName          = $_POST['lastName'];
        $typeId            = $_POST['typeId'];
        $numberId          = $_POST['idNumber'];
        $sex               = $_POST['sex'];
        $email             = $_POST['email'];
        $password          = $_POST['password'];
        $passwordConfirmed = $_POST['confirm-password'];


        $newStudent = new Student();
        $newStudent->name      = $name;
        $newStudent->last_name  = $lastName;
        $newStudent->type_id    = $typeId;
        $newStudent->id_number  = $numberId;
        $newStudent->sex       = $sex;
        $newStudent->email     = $email;
        $newStudent->password  = $password;

        if(StudentController::passwordConfirmation($password,$passwordConfirmed)){
            StudentsRepository::save($newStudent);
            header("location: ../view/users/register.php?userCreated=true");
        }else{
            header("location: ../view/users/register.php?passwordsMatch=false");
        }
    }
    public static function passwordConfirmation($password,$passwordConfirmed){
        if ($password == $passwordConfirmed) {
            return true;
        }else {
            return false;
        }

    }
    public static function passwordMatches($student,$password){
        //printf($student->password);
        //printf($password);
        if($student->password == $password){
            return true;
        }else{
            return false;
        }
    }
    public static function saveGrade(){
        if (isset($_SESSION['student'])) {
            //print_r($_SESSION['student']);
            $student = $_SESSION['student'];
            $grade = new Grade();
            $grade->teacher = $_POST['teacher'];
            $grade->subject = $_POST['subject'];
            $grade->carreer = $_POST['carreer'];
            $grade->university = $_POST['university'];
            $grade->period = $_POST['period'];
            $grade->graded_activity = $_POST['graded_activity'];
            $grade->percentage = $_POST['percentage'];
            $grade->activity_grade = $_POST['grade'];
            if(isset($_POST['date'])){
                $grade->date = $_POST['date'];
            }
            $isGradeSaved = GradesRepository::save($grade,$student);
            if ($isGradeSaved) {
                StudentController::refreshTable();
                header("location: ../view/users/table_page.php?gradeSaved=true");
            }
        }else {
            print_r("There's no active session");
        }
    }
    public static function getEditForm($gradeId){
        session_start();
        try {
            $grade = GradesRepository::findGradeById($gradeId);
            $_SESSION['gradeForm'] = $grade;
            header("location: ../view/users/editGrades.php?id=$gradeId");
        } catch (Exception $e) {
            throw $e;
        }
        
    }
    public static function refreshTable(){
        if(isset($_SESSION['student'])){
            $student = $_SESSION['student'];
            $_SESSION['grades'] = StudentsRepository::findGradesByStudentIdentification($student->id_number,$student->type_id);
        }
    }
    public static function editGrade($id){
        session_start();
        $grade = GradesRepository::findGradeById($id);
        $grade->id = $id;
        $grade->teacher = $_POST['teacher'];
        $grade->subject = $_POST['subject'];
        $grade->carreer = $_POST['carreer'];
        $grade->university = $_POST['university'];
        $grade->period = $_POST['period'];
        $grade->graded_activity = $_POST['graded_activity'];
        $grade->percentage = $_POST['percentage'];
        $grade->activity_grade = $_POST['grade'];
        if(isset($_POST['date'])){
            $grade->date = $_POST['date'];
        }
        $state =  GradesRepository::edit($grade);
        if($state){
            StudentController::refreshTable();
            header("location: ../view/users/table_page.php?gradeEdited=true");
        }else{
            StudentController::refreshTable();
            header("location: ../view/users/table_page.php?gradeEdited=false");
        }
    }
    public static function deleteGrade($id){
        session_start();
        $state = GradesRepository::delete($id);
        if ($state) {
            StudentController::refreshTable();
            header("location: ../view/users/table_page.php?gradeDeleted=true");
        }else {
            StudentController::refreshTable();
            header("location: ../view/users/table_page.php?gradeDeleted=false");
        }
    }
}

