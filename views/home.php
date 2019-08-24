<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="<?php echo BASE ?>assets/css/view.css"/>
    </head>
    <body>
        <div class="row">
            <div class="rowleft">
                <div class="inData">
                    <p>Entrada de Dados</p>
                    <div class="polarInt tabbody">
                        <form>
                            <input type="text"name="x" placeholder="valor x">
                            <input type="text"name="y" placeholder="valor y">
                            <input type="text"name="velocidade" placeholder="velocidade">
                            <input type="text"name="direcao" placeholder="direção">
                            <input type="submit"value="inserir" onclick="insertCartesiano()">&nbsp;coord.Polar
                        </form>
                    </div>
                    <div class="cartesiano tabbody" style="display: none;">
                        <form>
                            <input type="text"name="raio" placeholder="raio">
                            <input type="text"name="angulo" placeholder="angulo">
                            <input type="text"name="vel" placeholder="velocidade">
                            <input type="text"name="dir" placeholder="direção">
                            <input type="submit"value="inserir"onclick="insertPolar()">&nbsp;coord.Cartes
                        </form>
                    </div>
                    <div class="option">
                        <input type="radio" class="tabitem activetab"name="cores[]" value="1">Cartesiano<br>
                        <input type="radio" class="tabitem" name="cores[]" value="2">Polar<br>
                    </div>
                </div>
                <div class="transladar">
                    <p>Funções de Translação</p>
                    <div>
                        <div class="transladarLeft">
                            <div class="formTransl">
                                X:<input type="text"name="x"/>Y:<input type="text"name="y"/><br/>
                                <input type="submit"value="Translandar"onclick="translandar()"/>
                            </div>
                        </div>
                        <div class="transladarRigh">
                            <div class="formTransl">
                                X:<input type="text"name="x"/>Y:<input type="text"name="y"/><br/>
                                <input type="submit"value="Escalonar"onclick="escalonar()"/>
                            </div>
                        </div>
                    </div>
                    <div class="rotacao">
                        <div class="rotacaoRight">
                            Centro de rotação<br/>
                            X:<input type="text"name="x"/>
                            Y:<input type="text"name="y"/>
                        </div>
                        <div class="rotacaoleft">
                            Angulo:<input type="text"name="angulo"/>
                            <input type="submit"value="Translandar"onclick="rotacionar()"/>
                        </div>

                    </div>
                </div>
                <h4>Funções de rastreamento</h4>
                <div class="rastreamento">
                    Distância minima:  <input type="text"name="x"/>
                    <input type="submit"value="Aviões próximo ao aeroporto"onclick="distanciaMin()"/>
                </div>
            </div>
            <div class="rowcenter">
                <div class="radar">
                    <canvas id="canvas" width="400" height="400" ></canvas>
                    <img id="source" src="airplane.png"style="display:none;"/>
                </div>
                <div class="radarDisInTime">
                    <div class="radarDisInTimeLeft">
                        Distância minima:  
                        <input type="text"name="x"/>
                        <input type="submit"value="Aviões próximos"onclick="distanciaMinVoo()"/>
                    </div>
                    <div class="radarDisInTimeRight">
                        Tempo minimo:  
                        <input type="text"name="x"/>
                        <input type="submit"value="Em rota de colisão"onclick="tempoMinimo()"/>
                    </div>
                </div>
            </div>
            <div class="rowright">
                <div class="dataGrid">
                    <p>Data Grid</p>
                    <form method="POST">
                        <table  border="1" width="100%">
                            <tr>
                                <th>#</th>
                                <th>id</th>
                                <th>x</th>
                                <th>y</th>
                                <th>r</th>
                                <th>a</th>
                                <th>v</th>
                                <th>d</th>
                            </tr>
                            <?php foreach ($voos as $voo): ?>
                            
                                <tr>
                                    <td><input type="checkbox" name="opcao[]" value="<?php echo $voo['id'] ?>" class="opcao"></td>
                                    <td><?php echo $voo['id'] ?></td>
                                    <td><?php echo $voo['eixo_x'] ?></td>
                                    <td><?php echo $voo['eixo_y'] ?></td>
                                    <td><?php echo $voo['raio'] ?></td>
                                    <td><?php echo $voo['angulo'] ?></td>
                                    <td><?php echo $voo['velocidade'] ?></td>
                                    <td><?php echo $voo['direcao'] ?></td>
                                </tr>
                           
                            <?php endforeach; ?>
                        </table><br>
                        <input type="submit" value="Remover">
                    </form>
                </div>
                <div class="relatorio">
                    <p>Relatórios</p>
                </div>
            </div> 
        </div>
    </body>
   <!--<script type="text/javascript">iniciarlizarVoo()</script>-->
</html>
