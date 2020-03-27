<?php
namespace Controllers;

use \Core\Controller;
use DAO\UserDao;
use \Models\User;

class AuthController extends Controller 
{
    public function index()
    {
        $dados = array(
            'error' => '',
            'register' => ''
        );

        if (!empty($_GET['error'])) {
            $dados['error'] = $_GET['error'];
        }

        if (!empty($_GET['register'])) {
            $dados['register'] = $_GET['register'];
        }

        $this->loadTemplate('auth/login', $dados);
    }

    public function signIn()
    {
        $dados = array(
            'error' => '',
            'register' => ''
        );

        if (!empty($_GET['error'])) {
            $dados['error'] = $_GET['error'];
        }

        $this->loadTemplate('auth/signin', $dados);

    }

    public function register()
    {
        $nome  = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');

        if(!empty($nome) && !empty($email) && !empty($senha)) {
            $userDao = new UserDao();
            
            if($userDao->save($nome, $email, $senha) === true){
                header("Location: ". BASE_URL. "auth/login?register=success");
            } else {
                header("Location: " .BASE_URL. "auth/signin?error=exists" );
            }
        } else {

            header("Location: " .BASE_URL. "auth/signin?error=exists2" );
        }
    }

    public function checkLogin() :void
    {
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');

        if(!empty($email) && !empty($senha)) {
            $user = new User();
            $login = $user->login($email, $senha);

            if($login === true)
            {
                header("Location: ".BASE_URL);
            } else {
                header("Location: " .BASE_URL. "auth/login?error=exists" );
            }
        } else {
            header("Location: " .BASE_URL. "auth/login?error=exists2" );
        }
    }

    public function logout() :void
    {
        session_destroy();
        header("Location: ".BASE_URL."auth/login");
    }
}