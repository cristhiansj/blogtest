 
<?php
session_start();

class Auth{

    public function logIn() {
	$_SESSION['username'] = 'admin';
/*
        if (!isset($_SESSION['username']) || strlen($_SESSION['username'])==0) {
            if (!isset($_SESSION['login']) || strlen($_SESSION['login'])==0) {
                $_SESSION['login'] = null;
                header('Inicie sesión');
                header('HTTP/1.0 401 Unauthorized');
                echo 'Ingrese un usuario y contraseña válido';
                echo '<p><a href="?action=logOut">Reintentar</a></p>';
                exit;
            } else {
                $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
                $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
                $result = $this->authenticate($user, $password);
                if ($result == 0) {
                    $_SESSION['username'] = $user;
                } else {
                    session_unset($_SESSION['login']);
                    $this->errMes($result);
                    echo '<p><a href="">Reintentar</a></p>';
                    exit;
                };
            };
        }*/
    }

    public function authenticate($user, $password) {
        if (($user == UserAuth)&&($password == PasswordAuth)){ 
            return 0;
        }else{
            return 1;
        }
    }

    public function errMes($errno) {
        switch ($errno) {
            case 0:
                break;
            case 1:
                echo 'Usuario o contraseña incorrecto';
                break;
            default:
                echo 'Error desconocido';
        };
    }

    public  function logOut() {
        session_destroy();
        if (isset($_SESSION['username'])) {
            session_unset($_SESSION['username']);
            echo "Cerraste sesión<br>";
        } else {
            header("Location: ?action=logIn", TRUE, 301);
        };
        if (isset($_SESSION['login'])) { session_unset($_SESSION['login']); };
        exit;
    }
}
