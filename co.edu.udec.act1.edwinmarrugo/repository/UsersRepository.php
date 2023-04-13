<?php

include_once '../model/Users.php';


class UsersRepository {
    public static function save($user){
        try{
            return $user->save();
        }catch(Exception $e){
            throw new Exception('Error saving user: ' . $e->getMessage());
        }
    }
    public static function delete($idNumber){
        try {
            $userFound = UsersRepository::findUserByIdNumber($idNumber);
            return $userFound->delete();
        } catch (Exception $e) {
            throw new Exception("Error deleting user: " . $e->getMessage());
        }
    }
    public static function list_users(){
        return User::all();
    }
    public static function findUserByIdNumber($id_number){
        try {
            return User::find_by_id_number($id_number);
        } catch (Exception $e) {
            throw new Exception("Error finding user: " . $e->getMessage());
        }
    }
    
}
/*
$list = UsersRepository::list_users();

foreach ($list as $key => $user) {
    echo "<b>Id:</b>  $user->id<br/>";
    echo "<b>pass:</b>  $user->pass<br/>";
    echo "<b>name:</b>  $user->name<br/>";
    echo "<b>email:</b>  $user->email<br/>";
}

$userFound = UsersRepository::findUserByIdNumber(12345);
echo "<b>Id:</b>  $userFound->name<br/>";

$state = UsersRepository::delete(12345);
echo "<b>State:</b> $state<br/>";
*/
/*
$user = new User();

$user->name = "test3";
$user->id_number = "12345";
$user->pass = "12345";
$user->last_name = "test3";
$user->sex = "F";
$user->email = "asdasd@example.us";

$state = UsersRepository::save($user);
echo "<b>State:</b> $state<br/>";
*/