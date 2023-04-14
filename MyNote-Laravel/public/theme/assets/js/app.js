let spinner = document.createElement('span')
spinner.classList.add('spinner-border', 'spinner-border-sm')
spinner.setAttribute('role', 'status')
spinner.setAttribute('aria-hidden', 'true')

let btnLogin = document.getElementById('btnLogin')

btnLogin.addEventListener('click',function(){
    btnLogin.innerHTML = ' '
    btnLogin.appendChild(spinner)
})



