/*

function airplane(x, y) {

    var canvas = document.getElementById("canvas");
    var image = document.getElementById('aviao');
    var ctx = canvas.getContext('2d');
    var image = document.getElementById("source");
    ctx.strokeStyle = '#000';
    ctx.lineWidth = 2;
    ctx.lineJoin = 'round';
    ctx.moveTo(185, 0);
    ctx.lineTo(185, 370);
    ctx.moveTo(0, 185);
    ctx.lineTo(370, 185);
    ctx.stroke();
    x = 176 + x;
    y = 176 - y;

    ctx.drawImage(image, x, y, 20, 20);
}
/*
function iniciarlizarVoo() {

    setTimeout(getVoo, 1000);
}
function getVoo() {
    $.ajax({
        url: 'ajax/getVoo',
        dataType: 'json',
        success: function (json) {

            setTimeout(getVoo, 1000);
        },
        error: function () {
            setTimeout(getVoo, 1000);
        }
    });
}
*/
/*
 * function airplane(x, y) {
 
 var canvas = document.getElementById("canvas");
 var image = document.getElementById('aviao');
 var ctx = canvas.getContext('2d');
 var image = document.getElementById("source");
 ctx.strokeStyle = '#000';
 ctx.lineWidth = 2;
 ctx.lineJoin = 'round';
 ctx.moveTo(250, 0);
 ctx.lineTo(250, 500);
 ctx.moveTo(0, 250);
 ctx.lineTo(500, 250);
 ctx.stroke();
 x = 230 + x;
 y = 230 - y;
 
 ctx.drawImage(image, x, y, 40, 40);
 }
 */