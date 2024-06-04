<?php
    $sessionTime=86400;
    class User{
        private int $year;
        private int $month;
        private int $day;
        private string $login;
        private string $password;

        public function __construct(int $year, int $month, int $day, string $login, string $password){
            $this->year = $year;
            $this->month = $month;  
            $this->day = $day;  
            $this->login = $login;
            $this->password = sha1($password);
        }

        public function toArray(): array {
            return [
                'year' => $this->year,
                'month' => $this->month,
                'day' => $this->day,
                'login' => $this->login,
                'password' => $this->password
            ];
        }
    }

    function getUserList(): array{
        $users = json_decode(file_get_contents("dataBase.json"),true);
        return $users??[];
    }

    function existsUser($login):bool{
        $users = getUserList();
        foreach($users as $user){
            if($user['login']==$login){
                return true;
            }
        }
        return false;
    }

    function checkPassword($login, $password):bool{
        if(existsUser($login)){
            $users = getUserList();
            foreach($users as $user){
                if($user['login']==$login && $user['password']==sha1($password)){
                    return true;
                }
            }
        }
        return false;
    }

    function getCurrentUser():?string{
        if(isset($_SESSION)){
            return $_SESSION['login']??'';
        }
        return null;
    }
