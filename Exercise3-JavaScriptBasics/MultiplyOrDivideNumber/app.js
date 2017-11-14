'use strict';

function multiplyOrDivideNumber(input) {
    let number = Number(input[0]);
    let parameter = Number(input[1]);
    if (parameter >= number) {
        return number * parameter;
    }
    else return number / parameter;
}