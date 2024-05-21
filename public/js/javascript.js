//Menu responsive

const toggleMenu = document.getElementById("hamburgerMenu-btn");
const menuMobile = document.getElementById("item-h-nav-container");

toggleMenu.addEventListener("click", () => {
    menuMobile.classList.toggle("toggleMenu");
});

//Menu déroulant Admin : gestion des width

function updateFluidWidth() {
    setTimeout(function () {
        const widthFluidElement = document.getElementById("adminMenuBTN");
        const widthFluidJS = widthFluidElement.clientWidth;
        const widthFluidItems = document.querySelectorAll(".widthFluid");
        widthFluidItems.forEach(function (item) {
            item.style.width = widthFluidJS + "px";
        });
    }, 455);
}

updateFluidWidth();
window.addEventListener("resize", updateFluidWidth);

//Menu déroulant Admin : Toggle

const toggleAdmin = document.getElementById("adminMenuBTN");
const menuAdmin = document.getElementById("adminItems");

toggleAdmin.addEventListener("click", () => {
    menuAdmin.classList.toggle("toggleAdminClass");
});

//Toggle PopUp

function togglePupUp() {
    let popup = document.querySelector("#popUp");
    popup.classList.toggle("open");
}

function togglePupUp2() {
    let popup = document.querySelector("#popUp2");
    popup.classList.toggle("open");
}

function togglePupUp3() {
    let popup = document.querySelector("#popUp3");
    popup.classList.toggle("open");
}

function togglePupUp4() {
    let popup = document.querySelector("#popUp4");
    popup.classList.toggle("open");
}

function togglePupUp5() {
    let popup = document.querySelector("#popUp5");
    popup.classList.toggle("open");
}

function togglePupUp6() {
    let popup = document.querySelector("#popUp6");
    popup.classList.toggle("open");
}

function togglePupUp12() {
    let popup = document.querySelector("#popUp12");
    popup.classList.toggle("open");
}

function togglePupUp13() {
    let popup = document.querySelector("#popUp13");
    popup.classList.toggle("open");
}
//Pour la surpression du compte
function togglePupUp20() {
    let popup = document.querySelector("#popUp20");
    popup.classList.toggle("open");
}

//RESET PASSWORD PAGE

var hide = true;

function change() {
    if (hide) {
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("eye").src =
            baseUrl + "/img/masquer-mot-de-passe.png";
        hide = false;
    } else {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("eye").src =
            baseUrl + "/img/afficher-mot-de-passe.png";
        hide = true;
    }
}

function change1() {
    if (hide) {
        document
            .getElementById("current_password")
            .setAttribute("type", "text");
        document.getElementById("eye1").src =
            baseUrl + "/img/masquer-mot-de-passe.png";
        hide = false;
    } else {
        document
            .getElementById("current_password")
            .setAttribute("type", "password");
        document.getElementById("eye1").src =
            baseUrl + "/img/afficher-mot-de-passe.png";
        hide = true;
    }
}

function change2() {
    if (hide) {
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("eye2").src =
            baseUrl + "/img/masquer-mot-de-passe.png";
        hide = false;
    } else {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("eye2").src =
            baseUrl + "/img/afficher-mot-de-passe.png";
        hide = true;
    }
}

function change3() {
    if (hide) {
        document
            .getElementById("password_confirmation")
            .setAttribute("type", "text");
        document.getElementById("eye3").src =
            baseUrl + "/img/masquer-mot-de-passe.png";
        hide = false;
    } else {
        document
            .getElementById("password_confirmation")
            .setAttribute("type", "password");
        document.getElementById("eye3").src =
            baseUrl + "/img/afficher-mot-de-passe.png";
        hide = true;
    }
}

//Date du jour

var inputElement = document.getElementById("selctDate");
var currentDate = new Date();
var formattedDate = currentDate.toISOString().split("T")[0];
inputElement.value = formattedDate;
