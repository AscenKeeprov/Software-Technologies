'use strict';

function turnObjectIntoJSON(input) {
    let object = {};
    for (let i = 0; i < input.length; i++) {
        let key = input[i].split(" -> ")[0];
        let value = input[i].split(" -> ")[1];
        if (isNaN(value)) object[key] = value;
        else object[key] = Number(value);
    }
    console.log(JSON.stringify(object));
}