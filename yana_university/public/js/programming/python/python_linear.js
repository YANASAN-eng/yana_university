let row = document.getElementById('row').value;
let column = document.getElementById('column').value;
let matrix_input_form = document.getElementById('matrix_input_form');
let type = document.getElementById('type_of_matrix').style.display = "none";

let table = document.createElement('table');
let trs = [];
let tds = [];
let inputs = [];
let submit = document.createElement("button");
submit.type = "submit";
submit.innerText = "計算実行";

let count = 0;

for(let i = 0;i < row;i++){
    trs.push(document.createElement('tr'));
}
for(let i = 0;i < row;i++){
    for(let j = 0;j < column;j++){
        tds.push(document.createElement('td'));
        inputs.push(document.createElement('input'));
    }
}

for(let i = 0;i < row;i++){
    for(let j = 0;j < column;j++){
        inputs[count].style.backgroundColor = "rbga(255,0,0,0.3)";
        inputs[count].style.width = "80px";
        inputs[count].setAttribute('name','params[]');
        count++;
    }
}

count = 0;

for(let i = 0;i < row;i++){
    for(let j = 0;j < column;j++){
        tds[count].appendChild(inputs[count]);
        count++;
    }
}

count = 0;

for(let i = 0;i < row;i++){
    for(let j = 0;j < column;j++){
        trs[i].appendChild(tds[count]);
        count++;
    }
}

for(let i = 0;i < row;i++){
    table.appendChild(trs[i]);
}

matrix_input_form.appendChild(table);
matrix_input_form.appendChild(submit);

