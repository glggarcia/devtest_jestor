<?php

namespace Models;

use \Core\Model;
use \DAO\UserDao;

class User extends Model
{
    private int $id;
    private string $nome;
    private string $email;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
 
    public function getEmail()
    {
        return $this->email;
    }
 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function login(string $email, string $senha) :bool
    {
        $userDao = new UserDao();
        $user = $userDao->get($email, $senha);
        
        if($user !== false){
            $_SESSION['user_id']   = $user->getId();
            $_SESSION['user_name'] = $user->getNome();
            return true;
        }
        else {
            return false;
        } 
    }


}