<?php
namespace Controllers;

use \Core\Controller;

class HomeController extends Controller 
{

	public function __construct()
	{
		if(!isset($_SESSION['user_name']) && empty($_SESSION['user_name'])){
			header("Location: ". BASE_URL . "auth/login");
		}
	}

	public function index() {
		$dados = array();
		
		$this->loadTemplate('home', $dados);
	}

	

}