'use strict';

function addOrRemoveElements(input) {
    let array = [];
    for (let i = 0; i < input.length; i++) {
        let command = input[i].split(" ")[0];
        let parameter = input[i].split(" ").map(Number)[1];
        if (command === "add") array.push(parameter);
        else if (command === "remove") array.splice(parameter, 1);
    }
    array.forEach(i => console.log(i));
}