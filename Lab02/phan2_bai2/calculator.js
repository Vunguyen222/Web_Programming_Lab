var opAdd = document.getElementById("add"); 
var opSub = document.getElementById("sub"); 
var opMul = document.getElementById("multiple");
var opDiv = document.getElementById("division"); 
var opExp = document.getElementById("exponent");

function Valid(number) {
    if (number == "") {
        window.alert("Please fill value to caculate !!")
        return false;
    }
    return true; 
}

function Add() {
    let firstNum = opAdd.getElementsByTagName("input")[0].value; 
    let secondNum = opAdd.getElementsByTagName("input")[1].value;
    if (Valid(firstNum) && Valid(secondNum)) {
        opAdd.getElementsByClassName("result")[0].innerHTML = parseFloat(firstNum) + parseFloat(secondNum);
    }
}

function Sub() {
    let firstNum = opSub.getElementsByTagName("input")[0].value;
    let secondNum = opSub.getElementsByTagName("input")[1].value;
    if (Valid(firstNum) && Valid(secondNum)) {
        opSub.getElementsByClassName("result")[0].innerHTML = parseFloat(firstNum) - parseFloat(secondNum);
    }
}

function Multi() {
    let firstNum = opMul.getElementsByTagName("input")[0].value;
    let secondNum = opMul.getElementsByTagName("input")[1].value;
    if (Valid(firstNum) && Valid(secondNum)) {
        opMul.getElementsByClassName("result")[0].innerHTML = parseFloat(firstNum) * parseFloat(secondNum);
    }
}

function Division() {
    let firstNum = opDiv.getElementsByTagName("input")[0].value;
    let secondNum = opDiv.getElementsByTagName("input")[1].value;
    if (Valid(firstNum) && Valid(secondNum)) {
        if (parseFloat(secondNum) == 0) {
            window.alert("division by zero !!!");
            return;
        }
        opDiv.getElementsByClassName("result")[0].innerHTML = parseFloat(firstNum) / parseFloat(secondNum);
    }
}

function Exp() {
    let firstNum = opExp.getElementsByTagName("input")[0].value;
    let secondNum = opExp.getElementsByTagName("input")[1].value;
    if (Valid(firstNum) && Valid(secondNum)) {
        opExp.getElementsByClassName("result")[0].innerHTML = Math.pow(parseFloat(firstNum), parseFloat(secondNum));
    }
}