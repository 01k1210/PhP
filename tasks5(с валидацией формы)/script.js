//Валидация инпутов

document.forms.registr.elements.login.addEventListener("input",inputLogin);
function inputLogin(){
    if(this.value.length == 0){
        this.nextElementSibling.innerText = "Необходимо ввести логин!";
    }
    if(this.validity.tooShort){
        this.nextElementSibling.innerText = `Значение должно быть в диапозоне от ${this.minLength} до ${this.maxLength}!`
    }
    if(this.value.length > 3){
        this.nextElementSibling.innerText = " ";
    }
};

document.forms.registr.elements.password.addEventListener("input",inputPassword);
function inputPassword(){
    if(this.value.length == 0){
        this.nextElementSibling.innerText = "Необходимо ввести Пароль!";
    }
    if(this.validity.tooShort){
        this.nextElementSibling.innerText = `Значение должно быть в диапозоне от ${this.minLength} до ${this.maxLength}!`
    }
    if(this.value.length > 6){
        this.nextElementSibling.innerText = " ";
    }
};


document.forms.registr.elements.password_check.addEventListener("input",inputPassword_check);
function inputPassword_check(){
    if(this.value.length == 0){
        this.nextElementSibling.innerText = "Необходимо ввести Пароль!";
    }
    if(this.value.length > 6){
        this.nextElementSibling.innerText = " ";
    }
};

document.forms.registr.elements.email.addEventListener("input",email);
function email(){
    if(this.value.length == 0){
        this.nextElementSibling.innerText = "Необходимо ввести email!";
    }
    if(this.value.length > 0){
        this.nextElementSibling.innerText = " ";
    }
};

// валидация изображения и отправка формы check_log
document.forms.registr.addEventListener("submit", function(event){
    event.preventDefault();

    if(this.elements.password.value === this.elements.login.value){
        document.querySelector(".check_log").innerText = "Логин и пароль совпадают";
        return;
    }

    if(this.elements.password.value === this.elements.password_check.value){
    const formData = new FormData();

    formData.append('login' ,this.elements.login.value);
    formData.append('password' ,this.elements.password.value);
    formData.append('telephone' ,this.elements.telephone.value);
    formData.append('email' ,this.elements.email.value);

    const files = this.elements.photo.files;
    for(let file of files){
        const size = file.size;
        const type = file.type;
        const name = file.name;
        if(size <= 200000 && (type === 'image/png' || type === 'image/jpeg')){
            formData.append('picture' ,file);
        }
        else if(size > 200000){
           document.querySelector(".out").innerText = `Файл ${name} превышет допустимый размер`;
        }
        else{
            document.querySelector(".out").innerText = `Недопустимый тип файла ${name}`;
        }
    }
    if(formData.has('login') && formData.has('password')){
        fetch("signup.php",{
            method: 'post',
            body: formData,
        })
        .then(response => response.text()) 
        .then(data =>{
            let infoP = document.createElement('p');
            infoP.innerText = data;
            this.before(infoP);
            
            function open() {
                window.location.replace('index.php');
              }
              setTimeout(open, 2000);
        });
    }

    }
    else{
         document.querySelector(".check_out").innerText = "Введённые пароли не совпадают";
    }

})
