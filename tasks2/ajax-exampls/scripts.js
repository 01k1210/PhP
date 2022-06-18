let wrapIns =  document.getElementById('modal');
const btns = document.querySelectorAll("button");
const wrap = document.querySelector('.modal-wrap');
document.addEventListener('click', function(event){
    if(event.target.classList.contains('open')){
        let instId = event.target.dataset.id;
        fetch("instrument.php?id=" + instId).then(response => response.json()).then(instInfo =>{
            wrap.innerHTML=`
            <h3>${instInfo.title}</h3>
            <p>${instInfo.description}</p>
            <p>Цена: ${instInfo.price}Rub.</p>
            <p>Количество: ${instInfo.count}шт.</p>
            <a class="close" href="#">X</a>`
        });
        wrapIns.setAttribute("style", "display:flex;");
    };
    if(event.target.classList.contains('close')){
        wrapIns.removeAttribute("style", "display:flex;");
    }
});

// Форма поиска
const inp = document.querySelector('[name="name"]');
const btn = document.querySelector('.btn');
btn.addEventListener('click', function(){
    fetch("search.php?name=" + inp.value).then(response => response.json()).then(Info =>{
        
    });
})