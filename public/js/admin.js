function edittitle($a, $b) {

    var $label = $("#head_name");
    var text = $label.text();
    $label.text(text.replace($b, $a));

    if ($b.includes(" ")) {
        console.log("incl");
        $b = $b.replace(" ", "_");
    }

    $c = 'div_' + $b

    console.log($c);


    if ($a.includes(" ")) {
        console.log("incl");
        $a = $a.replace(" ", "_");
    }

    $d = 'div_' + $a

    document.getElementById($c).style.display = "none";
    document.getElementById($d).style.display = "block";

}

function editcat(a, b) {

    if (a.includes(" ")) {
        console.log("incl");
        a = a.replace(" ", "_");
    }

    var label = $('#head_cat');
    var text = label.text();
    label.text(text.replace(b, a));



    document.getElementById(text).style.display = "none";
    document.getElementById(a).style.display = "block";



}




function updateTIP(selectObject) {

    var value = selectObject;
    var a = `<?php update('${value}'); ?>`;

    console.log(a);

    document.getElementById("fff").innerHTML = a;

}