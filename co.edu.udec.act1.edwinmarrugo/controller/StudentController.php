<?php

require_once "../repository/StudentsRepository.php";

use Act1Model\entities\Student;

$action = $_POST['action'];

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
        }
    }
    public static function login($formEmail,$formPassword){
        try {
            $studentFound = StudentsRepository::findStudentByEmail($formEmail);
            if(StudentController::passwordMatches($studentFound,$formPassword)){
                session_start();
                $_SESSION['studentName'] = $studentFound->name;
                $_SESSION['student'] = $studentFound;
                $_SESSION['grades']=  StudentsRepository::findGradesByStudentIdentification($studentFound->id_number,$studentFound->type_id);;
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

        StudentController::passwordConfirmation($password,$passwordConfirmed);

        $newStudent = new Student();
        $newStudent->name      = $name;
        $newStudent->last_name  = $lastName;
        $newStudent->type_id    = $typeId;
        $newStudent->id_number  = $numberId;
        $newStudent->sex       = $sex;
        $newStudent->email     = $email;
        $newStudent->password  = $password;

        StudentsRepository::save($newStudent);
        header("location: ../view/users/register.php?userCreated=true");
    }
    public static function passwordConfirmation($password,$passwordConfirmed){
        if ($password == $passwordConfirmed) {
            return true;
        }else {
            header("location: ../view/users/register.php?passwordsMatch=false");
            return false;
        }

    }
    public static function passwordMatches($student,$password){
        printf($student->password);
        printf($password);
        if($student->password == $password){
            return true;
        }else{
            return false;
        }
    }
}

StudentController::action($action);