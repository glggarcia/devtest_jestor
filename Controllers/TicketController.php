<?php

namespace Controllers;

use \Core\Controller;

use DAO\TicketDao;
use DAO\UserDao;
use Models\Ticket;

class TicketController extends Controller
{
    public function __construct()
    {
         if(!isset($_SESSION['user_name']) && empty($_SESSION['user_name'])){
             header("Location: ". BASE_URL . "auth/login");
         }
    }

    public function index() :void
    {
        $ticketDao = new TicketDao();
        $dados = array(
            'tickets' => $ticketDao->getAll($_SESSION['user_id'])
        );

        $this->loadTemplate('ticket/index', $dados);
    }

    public function create() :void
    {
        $dados = array(
            'error' => ''
        );

        if (!empty($_GET['error'])) {
            $dados['error'] = $_GET['error'];
        }

        $this->loadTemplate('ticket/create', $dados);
    }

    public function store() :void
    {
        if(!empty(filter_input(INPUT_POST, 'titulo'))) {

            $titulo      = filter_input(INPUT_POST, 'titulo');
            $descricao   = filter_input(INPUT_POST, 'descricao');
            $dataCriacao = date('d/m/y');
            $status      = 0;

            $ticket = new Ticket();
            $ticket->setTitulo($titulo);
            $ticket->setDescricao($descricao);
            $ticket->setDataCriacao($dataCriacao);
            $ticket->setStatus($status);

            $userDao = new UserDao();
            $user = $userDao->findById($_SESSION['user_id']);

            $ticket->setUser($user);

            $ticketDao = new TicketDao();

            if($ticketDao->save($ticket)){
                header("Location: ". BASE_URL."ticket/");
            } else {
                header("Location: " .BASE_URL. "ticket/create?error=exists" );
            }

        } else {
            header("Location: " .BASE_URL. "ticket/create?error=exists" );
        }
    }

    public function edit(int $id) :void
    {
        $dados = array(
            'error' => '',
            'id' => $id,
        );

        if (!empty($_GET['error'])) {
            $dados['error'] = $_GET['error'];
        }

        $ticketDao = new TicketDao();
        $ticket = $ticketDao->get($id);

        if($ticket->getTitulo()){
            $dados['ticket'] = $ticket;
            $this->loadTemplate('ticket/edit', $dados);
            exit;
            }

        header("Location: ".BASE_URL."ticket");
    }

    public function update()
    {
         if(!empty(filter_input(INPUT_POST, 'descricao'))){
            $id          = filter_input(INPUT_POST, 'id');
            $descricao   = filter_input(INPUT_POST, 'descricao');      
                  
            $ticketDao = new TicketDao();
            $ticket = $ticketDao->get((int)$id);

            $ticket->setDescricao($descricao);

            if($ticketDao->update($ticket, $id)){
                header("Location: ". BASE_URL."ticket/");
            } else {
                header("Location: " .BASE_URL. "ticket/edit/".$id."?error=exists" );
            }
         }
    }

    public function delete(int $id) :void
    {
        if(!empty($id)) {
            $ticketDao = new TicketDao();
            $ticketDao->delete($id);
        }

        header("Location: " .BASE_URL."/ticket");
    }

}