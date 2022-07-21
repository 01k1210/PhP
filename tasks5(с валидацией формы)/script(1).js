document.forms.index.elements.login.addEventListener("input",inputLogin);
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

document.forms.index.elements.password.addEventListener("input",inputPassword);
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

document.forms.index.addEventListener("submit", function(event){
    event.preventDefault();
    const formData = new FormData();
    formData.append('login' ,this.elements.login.value);
    formData.append('password' ,this.elements.password.value);
    fetch("signin.php",{
        method: 'post',
        body: formData,
    })
    .then(response => response.text())
    .then(data =>{
        let infoP = document.createElement('p');
        infoP.innerText = data;
        this.before(infoP);

        if(data === "Вы успешно авторизированы!"){
            function open() {
                window.location.replace('profile.php');
              }
              setTimeout(open, 2000);
        }
    })
})