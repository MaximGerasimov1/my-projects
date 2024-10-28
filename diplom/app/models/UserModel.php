<?php
    require_once 'DB.php';
    class UserModel {
        private $email;
        private $login;
        private $password;
        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($email, $login, $password)
        {
            $this->email = $email;
            $this->login = $login;
            $this->password = $password;
        }

        public function ValidForm() {
            if(strlen($this->email) < 6)
                return "Email слишком короткий";
            else if(strlen($this->login) < 4)
                return "Логин слишком короткий";
            else if(strlen($this->password) < 3 )
                return "Пароль слишком короткий";
            else {
                $stmt = $this->_db->prepare("SELECT login, email FROM users WHERE login = :login OR email = :email");
                $stmt->execute(['login' => $this->login, 'email' => $this->email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Проверка на существование логина и email
                if ($user) {
                    if ($user['email'] === $this->email) {
                        return "Данный email уже используется";
                    }
                    if ($user['login'] === $this->login) {
                        return "Пользователь с таким логином уже существует";
                    }
                }

                return "Верно";
            }
        }

        public function setAuth($login) {
            setcookie('login', $login, time() + 3600 * 24 * 30, '/');
            header('Location: /user');
        }

        public function addUser() {
            $sql = 'INSERT INTO users(email, login, password) VALUES(:email, :login, :password)';
            $query = $this->_db->prepare($sql);
            $password = password_hash($this->password, PASSWORD_DEFAULT);
            $query->execute(['email' => $this->email, 'login' => $this->login, 'password' => $password]);

            $this->setAuth($this->login);
        }

        public function getUser() {
//            if (!isset($_COOKIE['login'])) {
//                return null; // Или обработайте ошибку
//            }

            $login = $_COOKIE['login'];
            $stmt = $this->_db->prepare("SELECT * FROM users WHERE login = :login");
            $stmt->execute(['login' => $login]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function logOut() {
            setcookie('login', $this->login, time() - 3600 * 24 * 30, '/');
            unset($_COOKIE['login']);
            header('Location: /user/auth');
            exit();
        }

        public function auth($login, $password) {
            $stmt = $this->_db->prepare("SELECT * FROM users WHERE login = :login");
            $stmt->execute(['login' => $login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                return 'Пользователя с таким логином не существует';
            } else if (password_verify($password, $user['password'])) {
                $this->setAuth($login);
            } else {
                return 'Пароли не совпадают';
            }
        }
    }
