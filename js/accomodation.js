function order() {
    document.getElementById("order_model").style.display = "block";
}

function roomboking() {
    document.getElementById("roomboking").style.display = "block";
}

function roomservice() {
    document.getElementById("roomservice").style.display = "block";
}

function close_model() {
    document.getElementById("order_model").style.display = "none";
    document.getElementById("roomboking").style.display = "none";
    document.getElementById("roomservice").style.display = "none";
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