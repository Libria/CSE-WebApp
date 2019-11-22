/*
function pimpinClick() {
    var el = $('textarea');
    var style = window.getComputedStyle(el, null).getPropertyValue('font-size');
    var fontSize = parseInt(style);
    console.log(fontSize);
    el.style.fontSize = (fontSize + 2) + 'pt';
}
*/

function pimpinClick() {
    const timer = setInterval(() => 
    {
        var el = $('textarea');
        var style = window.getComputedStyle(el, null).getPropertyValue('font-size');
        var fontSize = parseInt(style);
        el.style.fontSize = (fontSize + 2) + 'pt';
    }, 500);
}

function boxChecked() {
    var checked = $('check').checked;

    if(checked) {
        $('textarea').style.fontWeight = "bold";
        $('textarea').style.color = "green";
        $('textarea').style.textDecoration = "underline";
    } else {
        $('textarea').style.fontWeight = "normal";
    }
}

function snoopify() {
    //$('textarea').style.textTransform = "uppercase";
    var s = $('textarea').value;
    s = s.toUpperCase();
    s = s.split('.');
    s = s.join('-izzle.');
    $('textarea').value = s;
}