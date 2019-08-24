<?php

class radar extends model {

    public function insertCartesiano($x, $y, $r, $a, $v, $d) {

        $a = number_format($a, 2, '.', '');
        $r = number_format($r, 2, '.', '');


        $sql = "INSERT INTO voo SET eixo_x ='$x',eixo_y = '$y',raio = '$r',angulo = '$a',velocidade = '$v',direcao = '$d'";
        $sql = $this->db->query($sql);
        if ($sql->rowcount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insertPolar($x, $y, $r, $a, $v, $d) {

        $x = number_format($x, 2, '.', '');
        $y = number_format($y, 2, '.', '');

        $sql = "INSERT INTO voo SET eixo_x ='$x',eixo_y = '$y',raio = '$r',angulo = '$a',velocidade = '$v',direcao = '$d'";
        $sql = $this->db->query($sql);
        if ($sql->rowcount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function translandar($x, $y, $opcao) {

        foreach ($opcao as $item) {

            $sql = "SELECT eixo_x,eixo_y FROM voo WHERE id = '$item'";
            $sql = $this->db->query($sql);
            if ($sql->rowcount() > 0) {

                $array = $sql->fetch();
                $x1 = $x + $array['eixo_x'];
                $y1 = $y + $array['eixo_y'];

//    var r = Math.sqrt(x * x + y * y);
//    var a = Math.atan2(y, x) * 180 / Math.PI;

                $r = sqrt($x1 * $x1 + $y1 * $y1);
                $a = atan2($y1, $x1) * 180 / M_PI;

                $a = number_format($a, 2, '.', '');
                $r = number_format($r, 2, '.', '');

                $this->db->query("UPDATE voo SET eixo_x = '$x1',eixo_y = '$y1',raio = '$r',angulo = '$a' WHERE id = '$item'");
            }
        }
    }

    public function escalonar($x, $y, $opcao) {

        foreach ($opcao as $item) {

            $sql = "SELECT eixo_x,eixo_y FROM voo WHERE id = '$item'";
            $sql = $this->db->query($sql);
            if ($sql->rowcount() > 0) {

                $array = $sql->fetch();
                $x1 = $x * $array['eixo_x'];
                $y1 = $y * $array['eixo_y'];
                
                $r = sqrt($x1 * $x1 + $y1 * $y1);
                $a = atan2($y1, $x1) * 180 / M_PI;

                $a = number_format($a, 2, '.', '');
                $r = number_format($r, 2, '.', '');

                $this->db->query("UPDATE voo SET eixo_x = '$x1',eixo_y = '$y1',raio = '$r',angulo = '$a' WHERE id = '$item'");
            }
        }
    }

    public function getVoo() {

        $sql = "SELECT eixo_x,eixo_y FROM voo";
        $sql = $this->db->query($sql);

        $array = array();
        if ($sql->rowcount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function tempoMinimo() {

        $array = array();

        $sql = "SELECT *FROM voo";
        $sql = $this->db->query($sql);

        if ($sql->rowcount() > 0) {


            $array = $sql->fetchAll();

            for ($i = 0; $i < count($array); $i++) {
                for ($j = $i + 1; $j < count($array); $j++) {

                    $x1 = $array[$j]['eixo_x'];
                    $x2 = $array[$i]['eixo_x'];
                    $y1 = $array[$j]['eixo_y'];
                    $y2 = $array[$i]['eixo_y'];
                    $m = tanh($array[$i]['direcao']);

                    $d = "{$m}(x2 " . (-$x1) . ")"; //calculando m(x2 - x1) 
                    $e = "y2" . (-$y1); //calculando m(y2 - y1)

                    $mx2 = "{$m}*x2";
                    $mx1 = $m * (-$x1);
                    $y1 = intval($y1);

                    $y3 = $mx1 + $y1;
                    $mx2 = 2;
                    $y2 = $y3 . "{$mx2}"; //y2 final
//                    $Ay = $array[$i]['eixo_y'] - $array[$j]['eixo_y'];
//                    $m = 
//
//                    $dist = pow($Ax, 2) + pow($Ay, 2);
//                    $dist = sqrt($dist);
//                    $dist = number_format($dist, 2, '.', '');
//                    $tempo = 

                    echo($y2);
                    exit;
                }
            }
        }
    }

    public function getVoos() {

        $sql = "SELECT *FROM voo";
        $sql = $this->db->query($sql);

        $array = array();
        if ($sql->rowcount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function removerVoo($vId) {

        $sql = "DELETE FROM voo WHERE id IN($vId)";
        $this->db->query($sql);
    }

    public function rotacionar($eixo_x, $eixo_y, $angulo, $opcao) {

        foreach ($opcao as $item) {

            $sql = "SELECT eixo_x,eixo_y FROM voo WHERE id = '$item'";
            $sql = $this->db->query($sql);
            if ($sql->rowcount() >= 0) {


                $array = $sql->fetch();
                $x1 = $array['eixo_x'];
                $y1 = $array['eixo_y'];

                $x2 = $x1 - $eixo_x;
                $y2 = $y1 - $eixo_y;

                $x3 = $x2 * cos(deg2rad($angulo)) - $y2 * sin(deg2rad($angulo));
                $y3 = $y2 * cos(deg2rad($angulo)) + $x2 * sin(deg2rad($angulo));

                $x3  = $x3 + $eixo_x;
                $y3 = $y3 + $eixo_y;
                
               // $r = sqrt($x3 * $x3 + $y3 * $y3);
               // $a = atan2($y3, $x3) * 180 / M_PI;


                $x1 = number_format($x3, 2, '.', '');
                $y1 = number_format($y3, 2, '.', '');
                

                $this->db->query("UPDATE voo SET eixo_x = '$x1',eixo_y = '$y1',angulo = '$angulo' WHERE id = '$item'");
            }
        }
    }

    public function distanciaMin($eixo_x) {

        $array = array();


        $sql = "SELECT id FROM voo WHERE '$eixo_x' > raio";
        $sql = $this->db->query($sql);

        if ($sql->rowcount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function distanciaMinVoo($eixo_x) {

        $array = array();

        $sql = "SELECT id,eixo_x,eixo_y FROM voo";
        $sql = $this->db->query($sql);

        if ($sql->rowcount() > 0) {

            if ((!isset($ids['voos']))) {
                $ids['voos'] = array();
            }
            $array = $sql->fetchAll();
            // var_dump($array[1]['eixo_x']);exit;
            for ($i = 0; $i < count($array); $i++) {
                for ($j = $i + 1; $j < count($array); $j++) {

                    $Ax = $array[$i]['eixo_x'] - $array[$j]['eixo_x'];
                    $Ay = $array[$i]['eixo_y'] - $array[$j]['eixo_y'];

                    $dist = pow($Ax, 2) + pow($Ay, 2);
                    $dist = sqrt($dist);
                    $dist = number_format($dist, 2, '.', '');

                    //var_dump($dist);exit;
                    if ($dist <= $eixo_x) {
                        $ids['voos'][] = $array[$i]['id'];
                        $ids['voos'][] = $array[$j]['id'];
                    }
                }
            }
        }
        return $ids['voos'];
    }

}
