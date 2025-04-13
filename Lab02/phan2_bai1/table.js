
// table property
var curRow = 0; 
var curCol = 0; 
var cellValue = 0; 

// alternative variable
var createTable = document.getElementById("CreateTable");
var addRowButton = document.getElementById("AddTableRow");
var addColButton = document.getElementById("AddTableCol");
var delRowButton = document.getElementById("DeleteRow");
var delColButton = document.getElementById("DeleteCol");
var delTable = document.getElementById("DeleteTable");
var holder = document.getElementsByClassName("holder")[0];

// disabled and enabled button
function CreateEnabled() {
    // enable create button
    createTable.classList.remove("disabled");

    // disabled other buttons
    addRowButton.classList.add("disabled");
    addColButton.classList.add("disabled");
    delRowButton.classList.add("disabled");
    delColButton.classList.add("disabled");
    delTable.classList.add("disabled");
}

function CreateDisabled() {
    // remove disabled attributes from other buttons
    addRowButton.classList.remove("disabled");
    addColButton.classList.remove("disabled");
    delRowButton.classList.remove("disabled");
    delColButton.classList.remove("disabled");
    delTable.classList.remove("disabled");

    // add disable to create button
    createTable.classList.add("disabled");
}


// create action
function Create() {
    let newTable = document.createElement("table");
    
    newTable.classList.add("text-center");
    newTable.classList.add("table");
    curCol = 2; 
    let replaceEle = document.getElementById("replace");
    holder.replaceChild(newTable, replaceEle);

    CreateDisabled();
    // 2 x 2 table
    AddRow(2);
    AddRow(2);
}

function AddRow(col) {
    let table = document.getElementsByTagName("table")[0];
    let row = table.insertRow(curRow);
    for (let i = 0; i < col; i++){
        let cell = row.insertCell(i);
        cell.innerHTML = cellValue;
        cellValue++;
    }
    curRow++;
}

function AddCol(row) {
    let table = document.getElementsByTagName("table")[0];
    let Row = table.rows;
    for (let i = 0; i < row; i++){
        let cell = Row[i].insertCell(); 
        cell.innerHTML = cellValue;
        cellValue++;
    }
    curCol++;
}


// delete actions
function Delete() {
    let table = document.getElementsByTagName("table")[0];
    let newEle = document.createElement("span");
    newEle.id = "replace"; 
    holder.replaceChild(newEle, table); 
    curCol = curRow = cellValue = 0; 
    CreateEnabled(); 
}

function deleteRow() {
    let value = document.getElementById("inputRow").value;
    if (value == "") window.alert("Vui lòng nhập số thứ tự hàng muốn xóa !!");
    else if (value < 0 | value >= curRow) window.alert("Giá trị không hợp lệ !!");
    else {
        let table = document.getElementsByTagName("table")[0]; 
        table.deleteRow(value);

        curRow--; 
        if (curRow == 0) {
            Delete(); 
        }
    }
}

function deleteCol() {
    let value = document.getElementById("inputCol").value; 
    if (value == "") window.alert("Vui lòng nhập số thứ tự cột muốn xóa !!");
    else if (value < 0 | value >= curCol) window.alert("Giá trị không hợp lệ !!");
    else {
        let table = document.getElementsByTagName("table")[0];
        for (let i = 0; i < curRow; i++){
            table.rows[i].deleteCell(value); 
        }

        curCol--;
        if (curCol == 0) {
            Delete();
        }
    }
}
