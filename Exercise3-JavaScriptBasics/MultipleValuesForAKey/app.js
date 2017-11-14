'use strict';

function multipleValuesForAKey(input) {
    let dictionary = {};
    for (let i = 0; i < input.length - 1; i++) {
        let key = input[i].split(" ")[0];
        let value = input[i].split(" ")[1];
        if (!(key in dictionary)) {
            dictionary[key] = [];
            dictionary[key].push(value);
        }
        else dictionary[key].push(value);
    }
    let findKey = input[input.length - 1];
    if (findKey in dictionary)
        dictionary[findKey].forEach(v => console.log(v));
    else console.log("None"); 
}