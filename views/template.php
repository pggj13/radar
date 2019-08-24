<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="<?php echo BASE ?>assets/css/bootstrap.css"/>
        <link rel="stylesheet" href="<?php echo BASE ?>assets/css/template.css"/>
        <script type="text/javascript" src="<?php echo BASE ?>assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE ?>assets/js/voo.js"></script>
        <script type="text/javascript" src="<?php echo BASE ?>assets/js/scripts.js"></script>
        <link rel="stylesheet" href="<?php echo BASE ?>assets/js/bootstrap.min.css">
        <script type="text/javascript" src="<?php echo BASE ?>assets/js/bootstrap.min.js"></script>
    </head>
    <body onload="
    <?php foreach ($voos as $v): ?>
                airplane(<?php echo $v['eixo_x'] ?>,<?php echo $v['eixo_y'] ?>);
        <?php
    endforeach;
    ?>
          ">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Radar</a></li>
                </ul>
            </div>
        </nav>
        <div class="body">
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        </div>
    </body>
</html>
