var no = 0;
var x;

function order() {
    document.getElementById("order_model").style.display = "block";
}

function waiter() {
    document.getElementById("request_waiter_model").style.display = "block";
}

function reservation() {
    document.getElementById("reservation").style.display = "block";
}

function close_model() {
    document.getElementById("order_model").style.display = "none";
    document.getElementById("request_waiter_model").style.display = "none";
    document.getElementById("reservation").style.display = "none";
}


function tabclick(tabname, tb) {
    document.getElementById("tab1").style.display = "none";
    document.getElementById("tab2").style.display = "none";
    document.getElementById("tab3").style.display = "none";
    document.getElementById("tab4").style.display = "none";
    document.getElementById("tab5").style.display = "none";
    document.getElementById(tabname).style.display = "block";
    document.getElementById('tb1').style.background = '#4f7c2b';
    document.getElementById('tb2').style.background = '#4f7c2b';
    document.getElementById('tb3').style.background = '#4f7c2b';
    document.getElementById('tb4').style.background = '#4f7c2b';
    document.getElementById('tb5').style.background = '#4f7c2b';
    document.getElementById(tb).style.background = '#334e1d';






}



function alertsubmit() {

    alert('You must Loging frist');

}







function slideshow() {

    no++;

    switch (no) {
        case 1:
            document.getElementById("imgc").src = "images/0.jpg";
            break;
        case 2:
            document.getElementById("imgc").src = "images/2.jpg";
            break;
        case 3:
            document.getElementById("imgc").src = "images/3.jpg";
            break;
        case 4:
            document.getElementById("imgc").src = "images/4.jpg";
            break;
        case 5:
            document.getElementById("imgc").src = "images/5.jpg";
            break;
        case 6:
            document.getElementById("imgc").src = "images/6.jpg";
            break;
        case 7:
            document.getElementById("imgc").src = "images/7.jpg";
            break;
        case 8:
            document.getElementById("imgc").src = "images/8.jpg";
            break;
        case 9:
            document.getElementById("imgc").src = "images/9.jpg";
            break;
        case 10:
            document.getElementById("imgc").src = "images/10.jpg";
            no = 0;
            break;
    }
}

function load() {
    setInterval(slideshow, 5000);

}