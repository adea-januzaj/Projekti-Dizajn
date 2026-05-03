<?php


class User{
    private $conn;
    private $table_name = "useri";
    public function __construct($db){
        $this->conn = $db;
}


public function isDuplicate($field, $value) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE " . $field . " = :value LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':value', $value);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}

public function register($username, $email, $password): bool {
    $query = "INSERT INTO {$this->table_name} (Username, Email, Password, Role) 
              VALUES (:username, :email, :password, 'user')";

    $stmt = $this->conn->prepare($query);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    return $stmt->execute();
}

public function login($username, $password) {
    $query = "SELECT * FROM {$this->table_name} WHERE Username = :username LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['Password'])) {
        return $user;
    }

    return false;
}
}
?>