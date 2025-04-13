form = document.getElementsByTagName("form")[0];

form.addEventListener("submit", (e) => {
    e.preventDefault();

    Validation();
});


function Validation() {
    let firstname = document.getElementById("firstName").value;
    let lastname = document.getElementById("lastName").value;
    let password = document.getElementById("passWord").value;
    let Email = document.getElementById("email").value;
    let day = document.getElementById("dd").value;
    let year = document.getElementById("yyyy").value;
    let month = document.getElementById("mm").value;
    let Gender = document.getElementsByName("gender");
    let aboutYourselt = document.getElementById("about").value;

    if (firstname == "") {
        window.alert("please type your first name !!");
        return; 
    } 
    else if (firstname.length < 2) {
        window.alert("First name is at least 2 characters !!");
        return; 
    }
    else if (firstname.length > 30) {
        window.alert("First name's maximum characters is 30 !!");
        return; 
    }

    if (lastname == "") {
        window.alert("please type your last name !!");
        return; 
    }
    else if (lastname.length < 2) {
        window.alert("Last name is at least 2 characters !!");
        return; 
    }
    else if (lastname.length > 30) {
        window.alert("Last name's maximum characters is 30 !!");
        return; 
    }

    // email check
    if (Email.length == 0) {
        window.alert("please type your email address !!");
        return; 
    }
    else {
        var reg =
            /^[a-zA-Z0-9\.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*/;
        if (!Email.match(reg)) {
            return alert('Invalid email address!');
        }
    }

    //password check 
    if (password.length == 0) {
        window.alert("please type your password !!");
        return; 
    }
    else if (password.length < 2) {
        window.alert("password is at least 2 charactes !!");
        return; 
    }
    else if (password.length > 30) {
        window.alert("password's maximum characters is 30 !!");
        return; 
    }

    // birthday check 
    if (month == 2 && (day == 30 || day == 31)) {
        window.alert("Invalid Birthday !!"); 
        return; 
    }

    // year of decade but not nhuan
    if (month == 2 && day == 29 && (year % 100 == 0 && year % 400 != 0)) {
        window.alert("Invalid Birthday !!"); 
        return; 
    }

    // year not nhuan
    if (month == 2 && day == 29 && (year % 100 != 0 && year % 4 != 0)) {
        window.alert("Invalid Birthday !!");
        return; 
    }

    if ((month == 4 || month == 6 || month == 9 || month == 11) && day == 31) {
        window.alert("Invalid Birthday !!");
        return; 
    }

    // gender check 
    let choose = false; 
    for (let i = 0; i < Gender.length; i++){
        if (Gender[i].checked) {
            choose = true; 
            break; 
        }
    }
    if (!choose) {
        window.alert("please choose your gender !!");
        return; 
    }

    // text area check 
    if (aboutYourselt.length == 0) {
        window.alert("Please tell somthing about yourself !!");
        return; 
    }
    else if (aboutYourselt.length > 10000) {
        window.alert("The About description is too long, please shorten it !!");
        return; 
    }
    window.alert("Complete!");
}