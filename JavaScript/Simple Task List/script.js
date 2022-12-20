// Elements
const ul = document.querySelector('ul');
const input = document.querySelector('input');

// Functions
function add(e) {
    
    

    
    if(e.code === 'Enter') {

    if(input.value != ''){
    
    let  newLi = document.createElement('li')

    newLi.innerText = input.value;
    ul.append(newLi);
    input.value = '';
    } else {
        alert('You need to type something');
    }
}
}

// Event
document.addEventListener('keyup', add);