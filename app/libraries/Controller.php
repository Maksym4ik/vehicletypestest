<?php

//Load the model and the view
class Controller
{

    public function __construct()
    {

    }

    public function model($model)
    {
        //Require model file
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    //Load the view (checks for the file)
    public function setView($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exists.");
        }
    }

    public function isLoggedIn() {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
    public function isApproveAccess($user_role_id) {
        if(intval($_SESSION['user_role_id']) === $user_role_id) {
            return true;
        } else {
            header('location:' . URLROOT . '/vehicle-types/list');
        }
    }
}