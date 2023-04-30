// SLIDESHOW

let slideIndex = 1;

let image = document.getElementsByClassName("image")[0];

function plusIndex(n) {// Next/previous controls
    slideIndex += n;
    checkIndex();
}

function checkIndex() {// Thumbnail image controls
    image.classList.toggle("darken");
    image.classList.toggle("darken");
    if (slideIndex < 1) {
        slideIndex = 3;
    } else if (slideIndex > 3) {
        slideIndex = 1;
    }
    if(slideIndex == 1) {
        image.style.backgroundImage = "url('images/1.jpg')";
    } else if (slideIndex == 2) {
        image.style.backgroundImage = "url('images/2.jpg')";
    } else if (slideIndex == 3) {
        image.style.backgroundImage = "url('images/3.jpg')";
    }
}

//Automatically Switch Images
if(document.getElementsByClassName("slideshow")[0])
{
    var timer;
         
    function AutomaticSlide() {
        timer = setInterval(function() {
            plusIndex(1);
        }, 7000);
    }
    AutomaticSlide();
}


//Login POP-UP
try{document.getElementById("indexwrapper").addEventListener("click", removeLogin);} catch(err){console.log(err);}


function removeLogin() {
    try{document.getElementById("login").classList.add("hidden");}catch(err){console.log(err);}
    try{document.getElementById("home").classList.add("currentDiv");}catch(err){console.log(err);}
    try{document.getElementById("homeA").classList.add("current");}catch(err){console.log(err);}
    try{document.getElementById("loginButton").classList.remove("currentDiv");}catch(err){console.log(err);}
    try{document.getElementById("loginButtonA").classList.remove("current");}catch(err){console.log(err);}
}

function toggleLogin() {
    try{document.getElementById("login").classList.toggle("hidden");}catch(err){console.log(err);}
    try{document.getElementById("home").classList.toggle("currentDiv");}catch(err){console.log(err);}
    try{document.getElementById("homeA").classList.toggle("current");}catch(err){console.log(err);}
    try{document.getElementById("loginButton").classList.toggle("currentDiv");}catch(err){console.log(err);}
    try{document.getElementById("loginButtonA").classList.toggle("current");}catch(err){console.log(err);}
}

//Dashboard
function toggleMenu(i){
    if(i == "Users") {
        location.href='dashboard.php?view=users';
    } else if(i == "Accomodation Requests") {
        location.href='dashboard.php?view=requests';
    } else if(i == "Accomodation Managers") {
        location.href='dashboard.php?view=managers';
    } else if(i == "Admins") {
        location.href='dashboard.php?view=admins';
    } else if(i == "Booking") {
        location.href='dashboard.php?view=booking';
    } else if(i == "My Requests") {
        location.href='dashboard.php?view=myrequests';
    } else if(i == "My Profile") {
        location.href='dashboard.php?view=profile';
    }

    var view = window.location.search.split("?")[1].replace('view=', '');
    let menuid = 'm' + view;
    document.getElementById(menuid).classList.add("currentW");
}

function setMenu(i) {
    if(document.getElementsByClassName("lmenu")[0]){
        document.getElementById(i).classList.add("currentW");
    }
}

//Password Validation
function checkPass() {
    if(document.getElementById("pass").value != "" || document.getElementById("pass2").value != "") {
        document.getElementsByClassName("passerror")[0].classList.remove("hide");
        if(document.getElementById("pass").value == document.getElementById("pass2").value) {
            document.getElementById("registerb").removeAttribute("disabled");
            document.getElementById("registerb").classList.remove("disabled");
            try{document.getElementsByClassName("passerror")[0].classList.add("green");} catch(err){}
            document.getElementsByClassName("passerror")[0].innerText = "Passwords match!";
        } else {
            document.getElementById("registerb").setAttribute("disabled", "");
            document.getElementById("registerb").classList.add("disabled");
            try{document.getElementsByClassName("passerror")[0].classList.remove("green");} catch(err){}
            document.getElementsByClassName("passerror")[0].innerText = "Passwords Do not match!";
        }
    } else {
        document.getElementsByClassName("error")[0].classList.remove("hide");
        document.getElementsByClassName("error")[0].innerText = "Please complete the form!";
    }
}

//Get Date for forum
let output = new Date();
let date = output.getFullYear() + '-' + String(output.getMonth() + 1).padStart(2, '0') + '-' + String(output.getDate()).padStart(2, '0');
try{document.getElementById("date").value = date;} catch(err) {}

//Automatic current page
var page = window.location.pathname.split("/").pop().split('.')[0];
if (page == '') {
    
} else if (page == 'dashboard') {
    document.getElementById('home').classList.remove("currentDiv");
    document.getElementById('homeA').classList.remove("current");
    document.getElementById('dashboard').classList.add("currentDiv");
    document.getElementById('dashboardA').classList.add("current");
} else if (page == 'index') {
    console.log();
} else {
    document.getElementById('home').classList.remove("currentDiv");
    document.getElementById('homeA').classList.remove("current");
    document.getElementById('dashboard').classList.remove("currentDiv");
    document.getElementById('dashboardA').classList.remove("current");

    document.getElementById('random').classList.remove("hidden");
    document.getElementById('randomA').innerText = page;
    document.getElementById('random').classList.add("currentDiv");
    document.getElementById('randomA').classList.add("current");
}

//Search users
function searchs() {
    try{var view2 = window.location.search.split("?")[1].replace('view=', '').split("&")[0];} catch(err){console.log(err);}
    if(!window.location.search.split("?")[1])
    {
        view2 = 'users';
    }
    let s = '?view=' + view2 + '&search=' + document.getElementById("searchbox").value;
    window.location.href=s;
}

function clearSearchs() {
    var view2 = window.location.search.split("?")[1].replace('view=', '').split("&")[0];
    window.location.href='?view=' + view2;
}

function clearButton() {
    if(document.getElementById("searchbox").value == ""){
        document.getElementById("clearb").classList.remove("clearImg");
    } else {
        document.getElementById("clearb").classList.add("clearImg");
    }
}
try {document.getElementById("clearb").classList.add("clearImg");} catch(err) {console.log(err);}
try{let detect = window.location.search.split("?")[1].replace('view=', '').split("&")[1].split("=")[1];} catch(err) {
    try{document.getElementById("clearb").classList.remove("clearImg");} catch(err){console.log(err);}
}

//Search requests
function searchReqs() {
    var view2 = window.location.search.split("?")[1].replace('view=', '').split("&")[0];
    let s = '?view=' + view2 + '&searchreq=' + document.getElementById("searchbox").value;
    window.location.href=s;
}

//Search Enter Key
if(document.getElementById("searchbox"))
{
    document.getElementById("searchbox").onkeypress = function(e) {
        var key = e.charCode || e.keyCode || 0;     
        if (key == 13) {
            if(document.getElementById("searchbox").name == "searchreq"){searchReqs();} else {searchs();}
            e.preventDefault();
        }
    }
}

//Profile Edit
function edit() {
    for(let i=0; i<=6 ; i++) {
        document.getElementsByClassName("editf")[i].removeAttribute("disabled");
        if(i == 4) {
            document.getElementsByClassName("editf")[i].setAttribute("placeholder", "Enter your password to update")
        }
    }
    document.getElementById("resetb").classList.remove("disabled3");
    document.getElementById("submitb").classList.remove("disabled2");
}