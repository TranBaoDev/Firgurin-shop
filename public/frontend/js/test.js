const test = document.querySelector('.test');

let text = test.textContent;
const arr = text.split("
");

test.textContent = arr;