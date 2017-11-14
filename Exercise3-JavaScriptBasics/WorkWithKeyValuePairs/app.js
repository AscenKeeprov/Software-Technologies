'use strict';

function workWithKeyValuePairs(input) {
    let dictionary = {};
    for (let i = 0; i < input.length - 1; i++) {
        let key = input[i].split(" ")[0];
        let value = input[i].split(" ")[1];
        dictionary[key] = value;
    }
    let findKey = input[input.length - 1];
    if (dictionary[findKey] === undefined)
        console.log("None");
    else console.log(dictionary[findKey]);
}