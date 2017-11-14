'use strict';

function printNumbersInReverse(input) {
    input.reverse();
    for (let i = 0; i < input.length; i++)
        console.log(input[i]);
}