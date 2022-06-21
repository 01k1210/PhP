document.forms['send-files'].addEventListener("submit", function(event){
    event.preventDefault();
    const files = this.elements['picture[]'].files;
    const formData = new FormData();
    for(let file of files){
        const size = file.size;
        const type = file.type;
        const name = file.name;
        if(size <= 200000 && (type === 'image/png' || type === 'image/jpeg')){
            formData.append('picture[]' ,file);
        }
        else if(size > 200000){
            console.log(`Файл ${name} превышет допустимый размер`);
        }
        else{
            console.log(`Недопустимый тип файла ${name}`);
        }
        console.log(formData.getAll('picture[]'));
    }
    if(formData.has('picture[]')){
        fetch("server.php",{
            method: 'post',
            body: formData,
        })
        .then(response => response.text()) 
        .then(data =>{
            let infoP = document.createElement('p');
            infoP.innerText = data;
            this.before(infoP);
        });
    }
})

