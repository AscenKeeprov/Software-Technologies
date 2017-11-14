'use strict';

function storingObjects(input) {
    let students = [];
    for (let i = 0; i < input.length; i++) {
        let student = {
            Name: input[i].split(" -> ")[0],
            Age: Number(input[i].split(" -> ")[1]),
            Grade: Number(input[i].split(" -> ")[2])
        };
        students.push(student);
    }
    for (let student of students) {
        console.log(`Name: ${student.Name}`);
        console.log(`Age: ${student.Age}`);
        console.log(`Grade: ${student.Grade.toFixed(2)}`);
    }
}