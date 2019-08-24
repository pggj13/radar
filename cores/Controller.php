<?php

class Controller {

    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        include './views/' . $viewName . '.php';
    }

    public function loadTemplate($viewName, $viewData = array()) {

        try {
            global $config;
            $dbh = new PDO("mysql:dbname=" . $config['dbname'] . ';host=' . $config['host'], $config['dbuser'], $config['dbpass']);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $sql = $dbh->query("SELECT eixo_x,eixo_y FROM voo");
        if ($sql->rowCount() > 0) {
            $voos = $sql->fetchAll();
        }
        include './views/template.php';
    }

    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData);
        include './views/' . $viewName . '.php';
    }

}
