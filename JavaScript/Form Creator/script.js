class Form {

    method = 'GET';

    constructor(container, method, action) {
        this.container = document.querySelector(container);
        this.method = method;
        this.action = action;
    }
}


class Input {

    _type = 'text';
    required = false;

    constructor(name, label) {
    this.name = name;
    this.label = label;
    }

    get type() {
        return this._type;
    }

    set type(t) {
        if (['text', 'password', 'email', 'submit'].includes(t)) {
            this._type = t;
        } else {
            throw new Error(`Input "${t}" doesn't exists`);
        }
    }
}

class Button extends Input {
    constructor(label) {
        super('', label);
        this.type = 'submit';
    }
}

// Implementação


// Form
let form = new Form('.formArea','POST', 'teste.com');





// Email
let email = new Input('Email', 'Type your email');
email.type = 'email';
email.required = true;

// Password
let password = new Input('Password', 'Your password');
password.type = 'password';

// Botão
let button = new Button('Enviar');