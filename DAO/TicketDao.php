<?php 

namespace DAO;

use Core\Model;
use \Models\Ticket;

class TicketDao extends Model
{
    public function getAll($id) :array
    {
        $dados = array();

        $sql = "SELECT * FROM tickets WHERE user_id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
        }
        
        return $dados;
    }

    public function get(int $id)
    {
        $sql = "SELECT * FROM tickets WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dados = $sql->fetch();

            $ticket = new Ticket();
            $ticket->setTitulo($dados['titulo']);
            $ticket->setDescricao($dados['descricao']);
            $ticket->setDataCriacao($dados['data_criacao']);
            $ticket->setStatus($dados['status']);

            return $ticket;
        }

        return false;
    }

    public function save(Ticket $ticket) :bool
    {
        if($this->tituloExists($ticket->getTitulo(), $ticket->getUser()->getId())){

            $sql = "INSERT INTO tickets (titulo, descricao, data_criacao, status, user_id) VALUES (:titulo, :descricao, :dataCriacao, :status, :user)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':titulo', $ticket->getTitulo());
            $sql->bindValue(':descricao', $ticket->getDescricao());
            $sql->bindValue(':dataCriacao', $ticket->getDataCriacao());
            $sql->bindValue(':status', $ticket->getStatus());
            $sql->bindValue(':user', $ticket->getUser()->getId());
            $sql->execute();

            return true;
        }

        return false;
    }

    public function update(Ticket $ticket, int $id) :bool
    {
        if(!empty($id)){
            $sql = "UPDATE tickets SET titulo = :titulo, descricao = :descricao, data_criacao = :dataCriacao, status = :status WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->bindValue(':titulo', $ticket->getTitulo());
            $sql->bindValue(':descricao', $ticket->getDescricao());
            $sql->bindValue(':dataCriacao', $ticket->getDataCriacao());
            $sql->bindValue(':status', $ticket->getStatus());
            $sql->execute();

            return true;
        }
        return false;
    }


    public function delete(int $id) :void
    {
        $sql = "DELETE FROM tickets WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function tituloExists(string $titulo, int $id) :bool
    {
        $sql = "SELECT * FROM tickets WHERE titulo = :titulo AND user_id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':titulo', $titulo);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() === 0) {
            return true;
        }

        return false;
    }
}