'use strict';

function setValuesToIndexesInArray(input) {
    let n = Number(input[0]);
    let array = new Array(n);
    for (let i = 1; i < input.length; i++) {
        let index = input[i].split(" - ").map(Number)[0];
        let value = input[i].split(" - ").map(Number)[1]
        array[index] = value;
    }
    for (let i = 0; i < array.length; i++) {
        if (array[i] === undefined) console.log(0);
        else console.log(array[i]);
    }
}