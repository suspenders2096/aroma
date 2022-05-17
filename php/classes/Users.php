<?php
class User
{
  private $name;
  private $lastname;
  private $email;
  private $id;

  function __construct($id, $name, $lastname, $email) {
    $this->id = $id;
    $this->name = $name;
    $this->lastname = $lastname;
    $this->email = $email;
  }

  function getId() {return $this->id;}
  function getName() {return $this->name;}
  function getLastname() {return $this->lastname;}
  function getEmail() {return $this->email;}

  //Статический метод добавления пользователя
  static function addUser($name, $lastname, $email, $password) {
    global $mysqli;
    $email = trim(mb_strtolower($email));
    $password = trim($password);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");

    if ($result->num_rows !== 0) {
      return json_encode(["result"=>"exist"]);
    } else {
        $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `password`) VALUES ('$name', '$lastname', '$email', '$password')");
        return json_encode(["result"=>"success"]);
    }
  }

  static function authUser ($email, $password) {
    global $mysqli;

    $email = trim(mb_strtolower($email));
    $password = trim($password);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $result = $result->fetch_assoc(); //преобразовывает пришедшее в более понятную форму

        if (password_verify($password, $result['password'])) {
            $_SESSION["id"] = $result["id"];
            return json_encode(["result"=>"ok"]);
        } else {
            return json_encode(["result"=>"invalid"]);
        }
    }

    // Статический метод получения данных пользователя
    static function getUser($userID) {
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$userID'");
        $result = $result->fetch_assoc(); //преобразовывает пришедшее в более понятную форму
        return json_encode($result);
    }

    // статический метод получения пользователей
    static function getUsers() {
        global $mysqli;
        $result = $mysqli->query("SELECT `name`, `lastname`, `email`, `id` FROM `users` WHERE 1");
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return json_encode($users);
    }
}