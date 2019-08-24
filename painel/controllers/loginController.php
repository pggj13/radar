<?php

class loginController extends Controller {

    public function __construct() {
        if (isset($_SESSION['admins']) && !empty($_SESSION['admins'])) {
            header("Location:".BASE_URL.'/home');
        }
    }
    public function index() {
        $dados = array('erro'=>'');
        $this->loadView('login', $dados);
    }

}
