
function airplane(x, y) {

    var canvas = document.getElementById("canvas");
    var image = document.getElementById('aviao');
    var ctx = canvas.getContext('2d');
    var image = document.getElementById("source");
    ctx.strokeStyle = '#000';
    ctx.lineWidth = 2;
    ctx.lineJoin = 'round';
    ctx.moveTo(193, 0);
    ctx.lineTo(193, 400);
    ctx.moveTo(0, 193);
    ctx.lineTo(400, 193);
    ctx.stroke();
    x = 176 + x;
    y = 176 - y;

    ctx.drawImage(image, x, y, 30, 30);
}

$(function () {
    $('.tabitem').on('click', function () {

        $('.activetab').removeClass('activetab');
        $(this).addClass('activetab');

        var item = $('.activetab').index();
        $('.tabbody').hide();
        if (item == '2') {
            $('.cartesiano').show();
        }
        if (item == '0') {
            $('.polarInt').show();
        }
    });
});

//Função de inserção cartesiano
function insertCartesiano() {

    var x = parseFloat($('input[name=x]').val());
    var y = parseFloat($('input[name=y]').val());
    var v = parseFloat($('input[name=velocidade]').val());
    var d = parseFloat($('input[name=direcao]').val());

    var r = Math.sqrt(x * x + y * y);
    var a = Math.atan2(y, x) * 180 / Math.PI;

    $.ajax({
        type: 'POST',
        url: 'ajax/insertCartesiano',
        data: {x: x, y: y, v: v, d: d, r: r, a: a},
        success: function (json) {
            alert(json);
        }
    });
}
// função de inserção polar
function insertPolar() {

    var r = parseFloat($('input[name=raio]').val());
    var a = parseFloat($('input[name=angulo]').val());
    var v = parseFloat($('input[name=vel]').val());
    var d = parseFloat($('input[name=dir]').val());

    var x = r * Math.cos(a * Math.PI / 180);
    var y = r * Math.sin(a * Math.PI / 180);

    $.ajax({
        type: 'POST',
        url: "ajax/insertPolar",
        data: {x: x, y: y, v: v, d: d, r: r, a: a},
        success: function (json) {
            alert(json);
        }
    });
}
// Fazendo translandar 
function translandar() {

    var x = parseFloat($('.formTransl input[name=x]').val());
    var y = parseFloat($('.formTransl input[name=y]').val());

    var opcao = $('input:checkbox:checked.opcao').map(function () {
        return this.value;
    }).get();

    $.ajax({
        type: 'POST',
        url: "ajax/translandar",
        data: {x: x, y: y, opcao: opcao},
        success: function (json) {
            window.location.href = "http://localhost/radar/home";
        }

    });
}
//Fazendo escalonação
function escalonar() {

    var x = parseFloat($('.transladarRigh input[name=x]').val());
    var y = parseFloat($('.transladarRigh input[name=y]').val());

    var opcao = $('input:checkbox:checked.opcao').map(function () {
        return this.value;
    }).get();

    $.ajax({
        type: 'POST',
        url: "ajax/escalonar",
        data: {x: x, y: y, opcao: opcao},
        success: function (json) {
            window.location.href = "http://localhost/radar/home";
        }

    });

}
//Fazendo Rotação
function rotacionar() {

    var x = parseFloat($('.rotacaoRight input[name=x]').val());
    var y = parseFloat($('.rotacaoRight input[name=y]').val());
    var a = parseFloat($('.rotacaoleft input[name=angulo]').val());


    var opcao = $('input:checkbox:checked.opcao').map(function () {
        return this.value;
    }).get();

    $.ajax({
        type: 'POST',
        url: "ajax/rotacionar",
        data: {x: x, y: y, a: a, opcao: opcao},
        success: function (json) {
            window.location.href = "http://localhost/radar/home";
        }

    });

}
//Distancia minima do aeroporto
function distanciaMin() {

    var x = parseFloat($('.rastreamento input[name=x]').val());

    $.ajax({
        type: 'POST',
        url: "ajax/distanciaMin",
        dataType: 'json',
        data: {x: x},
        success: function (json) {
            resetRelatorio();
            for (var i in json.relatorio) {
                $('.relatorio').append("<div class='relatorioitem'>" + json.relatorio[i].id + " - voo próximo do aeroporto</div>");
            }
        }
    });
}
//Distancia minima entre os voos
function distanciaMinVoo() {

    var x = parseFloat($('.radarDisInTimeLeft input[name=x]').val());

    $.ajax({
        type: 'POST',
        url: "ajax/distanciaMinVoo",
        dataType: 'json',
        data: {x: x},
        success: function (json) {
            resetRelatorio();



            if (json.relatorio == '') {
                alert("Nenhum voo encontra-se próximo um do outro");
            } else {
                $('.relatorio').append("<div class='relatorioitem'><p>Voos próximo um do outro</p>" + json.relatorio + "</div>");
            }
        }
    });
}

//Funcao Tempo minimo
function tempoMinimo() {

    var x = parseFloat($('.radarDisInTimeRight input[name=x]').val());
    $.ajax({
        type: 'POST',
        url: "ajax/tempoMinimo",
        dataType: 'json',
        data: {x: x}
    });
}
function resetRelatorio() {
    $('.relatorioitem').remove();
}
