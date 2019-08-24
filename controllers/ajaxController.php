<?php

class ajaxController extends Controller {

    public function insertCartesiano() {

        $radar = new radar();

        if (isset($_POST['x'])) {

            $eixo_x = addslashes($_POST['x']);
            $eixo_y = addslashes($_POST['y']);
            $raio = addslashes($_POST['r']);
            $angulo = addslashes($_POST['a']);
            $veloc = addslashes($_POST['v']);
            $direcao = addslashes($_POST['d']);

            $radar->insertCartesiano($eixo_x, $eixo_y, $raio, $angulo, $veloc, $direcao);
            echo json_encode("Dados Cadastrados com sucesso");
        }
    }

    public function insertPolar() {

        $radar = new radar();

        if (isset($_POST['r'])) {

            $eixo_x = addslashes($_POST['x']);
            $eixo_y = addslashes($_POST['y']);
            $raio = addslashes($_POST['r']);
            $angulo = addslashes($_POST['a']);
            $veloc = addslashes($_POST['v']);
            $direcao = addslashes($_POST['d']);
            $radar->insertPolar($eixo_x, $eixo_y, $raio, $angulo, $veloc, $direcao);
            echo json_encode("Dados Cadastrados com sucesso");
        }
    }

    public function translandar() {

        if (isset($_POST['x'])) {

            $opcao = '';
            $eixo_x = addslashes($_POST['x']);
            $eixo_y = addslashes($_POST['y']);
            if (isset($_POST['opcao'])) {
                $opcao = $_POST['opcao'];
            }

            if (!empty($eixo_y) && !empty($opcao)) {

                $radar = new radar();
                $radar->translandar($eixo_x, $eixo_y, $opcao);
                //echo json_encode("Dados atualizado com sucesso");
            } else {
                echo json_encode("Selectione o voo");
                exit;
            }
        }
    }

    public function escalonar() {

        if (isset($_POST['x'])) {

            $opcao = '';
            $eixo_x = addslashes($_POST['x']);
            $eixo_y = addslashes($_POST['y']);

            if (isset($_POST['opcao'])) {
                $opcao = $_POST['opcao'];
            }
            if (!empty($eixo_y) && !empty($opcao)) {

                $radar = new radar();
                $radar->escalonar($eixo_x, $eixo_y, $opcao);
                //echo json_encode("Dados atualizado com sucesso");
            } else {
                echo json_encode("Selectione o voo");
                exit;
            }
        }
    }

    //public function getVoo(){}
    public function rotacionar() {

        if (isset($_POST['x'])) {

            $opcao = '';
            
            
            $eixo_x = addslashes($_POST['x']);
            $eixo_y = addslashes($_POST['y']);
            $angulo = addslashes($_POST['a']);

            if (isset($_POST['opcao'])) {
                $opcao = $_POST['opcao'];
            }
            
            if (!empty($opcao)) {

                $radar = new radar();
                $radar->rotacionar($eixo_x, $eixo_y, $angulo, $opcao);
                //echo json_encode("Dados atualizado com sucesso");
            } else {
                echo json_encode("Selectione o voo");
                exit;
            }
        }
    }

    public function distanciaMin() {

        $data = array();
        if (isset($_POST['x'])) {

            $eixo_x = addslashes($_POST['x']);
            $radar = new radar();
            $data['relatorio'] = $radar->distanciaMin($eixo_x);
            
            
            echo json_encode($data);
        }
    }

    public function distanciaMinVoo() {

        $data = array();
        if (isset($_POST['x'])) {

            $eixo_x = addslashes($_POST['x']);
            $radar = new radar();
            $data['relatorio'] = $radar->distanciaMinVoo($eixo_x);
            
           //var_dump($data['relatorio']);exit;
            echo json_encode($data);
        }
    }

    public function getVoo() {
        
        $radar = new radar();
        $data = $radar->getVoo();
        echo json_encode($data);   
    }
    public function tempoMinimo(){
        
        $data = array();
        if (isset($_POST['x'])) {
            $eixo_x = addslashes($_POST['x']);
            $radar = new radar();
            $data['relatorio'] = $radar->tempoMinimo($eixo_x);
            echo json_encode($data);
        }
    }

}
