const modal = document.getElementById('modal');

const botaoOk = document.getElementById('ok');

const botaoResgate = document.getElementById('resgate');

const botaoResgateDesc = document.getElementById('resgateDesc');

botaoResgate?.addEventListener('click', ()=>{
    modal.classList.remove('hidden');
})

botaoOk.addEventListener('click', ()=>{
    modal.classList.add('hidden');
})

botaoResgateDesc?.addEventListener('click', ()=>{
    modal.classList.remove('hidden');
})

