<?php 

namespace DAO;

use Core\Model;
use \Models\User;

class UserDao extends Model
{

    public function findById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dados = $sql->fetch();

            $user = new User();
            $user->setEmail($dados['email']);
            $user->setNome($dados['nome']);
            $user->setId($dados['id']);

            return $user;
        } else {
            return false;
        }
    }

    public function get(string $email, string $senha)
    {
        $sql = "SELECT * FROM users WHERE email = :email AND senha = :senha";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dados = $sql->fetch();

            $user = new User();
            $user->setEmail($dados['email']);
            $user->setNome($dados['nome']);
            $user->setId($dados['id']);

            return $user;
        } else {
            return false;
        }
    }

    public function save($nome, $email, $senha) :bool
    {
        if($this->emailUnique($email)){
            $sql = "INSERT INTO users (nome, email, senha) VALUES (:nome, :email, :senha)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', md5($senha));
            $sql->execute();

            return true;
        }

        return false;
    }

    public function emailUnique($email)
    {
        $dados = array();

        $sql = "SELECT email FROM users WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() == 0) {
            return true;
        }

        return false;
    }
}