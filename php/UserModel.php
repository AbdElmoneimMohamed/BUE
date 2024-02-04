<?php

require_once('Connection.php');

class UserModel
{
    private $conn;
    public function __construct()
    {
        $instance = Connection::getInstance();

        $this->conn = $instance->getConnection();
    }

    public function list()
    {
        $sql = "select * from users";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function insert($data) :string
    {
        $name = $data['name'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $sql = "INSERT INTO users (name,email,mobile) VALUES ('$name','$email','$mobile')";

        try {
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return "Success";
        } catch (PDOException $exception)
        {
            return $exception->getMessage();
        }


    }


    public function delete($id): string
    {
        $sql = "Delete from users where id= :id";

        try {
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam("id", $id);

            $stmt->execute();
            return "Success";

        }
        catch (PDOException $exception)
        {
            return $exception->getMessage();
        }

    }

}
