<?php

class homeController extends Controller {

    public function index() {
        $dados = array(
            'aviso' => '',
            'voos' => ''
        );
        $radar = new radar();
        
        if (isset($_POST['opcao']) && !empty($_POST['opcao'])) {

            $vId = implode(',', $_POST['opcao']);
            $radar->removerVoo($vId);
        }
        $dados['voos'] = $radar->getVoos();
        $this->loadTemplate('home', $dados);
    }
}
