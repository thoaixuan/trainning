let spinner = document.createElement('span')
spinner.classList.add('spinner-border', 'spinner-border-sm')
spinner.setAttribute('role', 'status')
spinner.setAttribute('aria-hidden', 'true')

let btnLogin = document.getElementById('btnLogin')
let username = document.getElementById('email')
let password = document.getElementById('password')

btnLogin.addEventListener('click',function(){
    btnLogin.innerHTML = ' '
    btnLogin.appendChild(spinner)
})



