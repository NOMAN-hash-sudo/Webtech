function add(value) {
    let display = document.getElementById('display');
    display.value = display.value + value;
}

function clearDisplay() {
    let display = document.getElementById('display');
    display.value = '';
}

function calculate() {
    let display = document.getElementById('display');
    let text = display.value;
    let result;

    if (text.includes('+')) {
        let numbers = text.split('+');
        result = Number(numbers[0]) + Number(numbers[1]);
    } 
    else if (text.includes('-')) {
        let numbers = text.split('-');
        result = Number(numbers[0]) - Number(numbers[1]);
    } 
    else if (text.includes('*')) {
        let numbers = text.split('*');
        result = Number(numbers[0]) * Number(numbers[1]);
    } 
    else if (text.includes('/')) {
        let numbers = text.split('/');
        if (Number(numbers[1]) === 0) {
            alert('Oops! Cannot divide by zero.');
            clearDisplay();
            return;
        }
        result = Number(numbers[0]) / Number(numbers[1]);
    } 
    else {
        alert('Please enter a valid calculation.');
        return;
    }

    display.value = result;
}