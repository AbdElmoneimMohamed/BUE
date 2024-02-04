<?php

require_once ('UserModel.php');
class Users
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function listUser()
    {
        return $this->userModel->list();
    }
    public function addUser()
    {
        return $this->userModel->insert($_POST);
    }
    public function deleteUser($id)
    {
        return $this->userModel->delete($id);
    }
}


if (isset($_POST['submit']))
{
    $user = new Users();
    echo $user->addUser();
}

if (isset($_POST['delete']))
{
    $user = new Users();
    echo $user->deleteUser($_POST['id']);
}
