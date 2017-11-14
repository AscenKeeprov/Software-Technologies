'use strict';

function printLines(input) {
    for (let i = 0; i < input.length; i++) {
        if (input[i] != "Stop")
            console.log(input[i]);
        else break;
    }
}