'use strict';

function productOf3Numbers(input) {
    let result = "Positive";
    let negativeCount = 0;
    let containsZero = false;
    for (let i = 0; i < input.length; i++) {
        if (Number(input[i]) == 0) {
            containsZero = true;
            break;
        }
        else if (input[i].startsWith("-")) negativeCount++;
    }
    if (negativeCount % 2 != 0 && containsZero == false)
        result = "Negative";
    return result;
}