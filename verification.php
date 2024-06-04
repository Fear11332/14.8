<?php
require_once("functional.php");
    ini_set('session.gc_maxlifetime', $sessionTime);
    ini_set('session.cookie_lifetime', $sessionTime);
    session_start();   
    if(isset($_POST['reg'])){
        if(existsUser($_POST['login'])){
            session_unset();
            session_destroy();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            header("Location: login.php"); 
            exit;
        }
        else{
            $users = getUserList();
            $userDate = explode('-',$_POST['age']);
            $currentUser = new User(+$userDate[0],+$userDate[1],+$userDate[2],$_POST['login'],$_POST['password']);
            $users[] = $currentUser->toArray();
            file_put_contents('dataBase.json',json_encode($users,JSON_PRETTY_PRINT));
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $currentUser->toArray()['login'];
            $_SESSION['password'] = $currentUser->toArray()['password'];
            $_SESSION['year'] = $currentUser->toArray()['year'];
            $_SESSION['month'] = $currentUser->toArray()['month'];
            $_SESSION['day'] = $currentUser->toArray()['day'];
            header("Location: index.php");
            exit;
        }
    }
    elseif(isset($_POST['enter'])){
        if(checkPassword($_POST['login'],$_POST['password'])){
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = sha1($_POST['password']);
            $currentUser = findUser($_POST['login'],$_POST['password']);
            $_SESSION['year'] = $currentUser->toArray()['year'];
            $_SESSION['month'] = $currentUser->toArray()['month'];
            $_SESSION['day'] = $currentUser->toArray()['day'];
            header("Location: index.php");
            exit;
        }
        else{
            session_unset();
            session_destroy();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            header("Location: login.php"); 
            exit;
        }
    }