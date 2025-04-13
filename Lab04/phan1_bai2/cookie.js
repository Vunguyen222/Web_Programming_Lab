var Name = document.getElementById("name");
var Val = document.getElementById("value"); 
var time = document.getElementById("expire");
var tablebody = document.getElementsByTagName("tbody")[0];
var but = document.getElementsByTagName("button")[0];

var curRow = 0; 
var curCol = 4; 
// 2d array 
const data = []; 

function Add() {
    if (but.classList.contains("edit")) {
        if (data[0] != Name.value) {
            // xoa cookie cu
            delCookie(data[0], data[1]);
        }
        // ghi de thuoc tinh cua cookie cu hoac them cookie moi trong truong hop xoa cookie cu
        addCookie(Name.value, Val.value, time.value);
        // cap nhat lai bang
        tablebody.querySelectorAll('tr').forEach(function (row) {
            if (row.firstChild.textContent == data[0]) {
                row.firstChild.innerHTML = Name.value;
                row.childNodes[1].innerHTML = Val.value;
                row.childNodes[2].innerHTML = time.value;
                let deleteButton = row.querySelectorAll("button")[0];
                let editButton = row.querySelectorAll("button")[1];
                deleteButton.classList.remove("disabled");
                editButton.classList.remove("disabled");
            }
        });
        but.innerHTML = "Add New Cookie";
        but.classList.remove("edit");
    }
    else {
        // data[0] = Name.value;
        // data[1] = Val.value;
        // data[2] = time.value;
        data[0] = Name.value;
        data[1] = Val.value;
        data[2] = time.value;

        addCookie(Name.value, Val.value, time.value);
        addNewRow();
    }

}

function addCookie(tname, tvalue, tday) {
    let expTime = new Date(tday).toUTCString();
    let setCookies = tname + "=" + tvalue + "; expires=" + expTime;
    document.cookie = setCookies;
}


function addNewRow() {
    let row = tablebody.insertRow(curRow);
    for (let i = 0; i < curCol; i++){
        let cell = row.insertCell(i);
        if (i != curCol - 1) {
            cell.innerHTML = data[i];
        }
        else {
            var deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.classList.add('btn', 'btn-danger', 'w-25', 'mx-2');
            deleteButton.addEventListener('click', function () {
                // row.cells[0] -> attribute name(key), row.cells[1] -> value
                Delete(row.cells[0].innerHTML, row.cells[1].innerHTML);
                tablebody.removeChild(row);
            });    

            cell.appendChild(deleteButton);

            var editButton = document.createElement('button');
            editButton.textContent = 'Edit';
            editButton.classList.add('btn', 'btn-info', 'w-25');
            editButton.addEventListener('click', function () {
                // row.cells[0] -> attribute name(key), row.cells[1] -> value
                data[0] = Name.value = row.cells[0].textContent;
                data[1] = Val.value = row.cells[1].textContent;
                data[2] = time.value = row.cells[2].textContent;
                but.innerHTML = "Edit Cookie";
                but.classList.add("edit");
                deleteButton.classList.add("disabled");
                editButton.classList.add("disabled");
            });

            cell.appendChild(editButton);
            cell.classList.add("text-center");
        }
    }
    curRow++;
}

function delCookie(tname, tday) {
    // delet cookie
    document.cookie = tname + "=" + tday + "; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    curRow--;   
}

window.addEventListener("beforeunload", function (e) {
    // delete all cookie if closing tab 
    let arr = this.document.cookie.split(";");
    for (let i = 0; i < arr.length; i++){
        let c = arr[i]; 
        while (c[0] == " ") {
            c = c.substring(1);
        }
        this.alert(c);
        this.document.cookie = c.split("=")[0] + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    }

});




