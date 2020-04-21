<?php
class SessionModel extends Model{
    public static function loginAction($username, $password) {
        $sql = (self::query("
            SELECT users.confirmed, user_id
            FROM users 
            LEFT JOIN passwords ON users.id = passwords.user_id 
            WHERE users.login='$username' AND passwords.password='$password'
        "));
        if (!$sql == null) {
            return $sql;
        }
        else return null;
    }

    public static function registerAction($login, $email, $type_id, $phone, $password) {
        self::query("
            INSERT INTO users (login, email, type_id, phone)
            VALUES ('$login', '$email', '$type_id', '$phone');
        ");

        $id = self::query("SELECT id FROM users WHERE login='$login'");
        $user_id = $id[0]['id'];

        self::query("
            INSERT INTO passwords (user_id, password)
            VALUES ('$user_id', '$password');
        ");
    }

    public static function loginRepeated($login) {
        $sql = (self::query("SELECT login FROM users WHERE login='$login'"));
        if(!empty($sql[0]['login'])) return true;
        else return false;
    }

    public static function emailRepeated($email) {
        $sql = (self::query("SELECT email FROM users WHERE email='$email'"));
        if(!empty($sql[0]['email'])) return true;
        else return false;
    }
}