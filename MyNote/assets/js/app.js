let spinner = document.createElement('span')
spinner.classList.add('spinner-border', 'spinner-border-sm')
spinner.setAttribute('role', 'status')
spinner.setAttribute('aria-hidden', 'true')

let btnLogin = document.getElementById('btnLogin')

btnLogin.addEventListener('click',function(){
    btnLogin.innerHTML = ' '
    btnLogin.appendChild(spinner)
    Login()
})

let username = document.getElementById('exampleInputEmail1')
let password = document.getElementById('exampleInputPassword1')

function checkUserName (input) {
    const regex = /[a-zA-Z0-9]{7,25}/
    return regex.test(input)
}
  
function checkPassword (input){
    const regex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{7,25}$/
    return regex.test(input)
}

function Login(){
    if(!checkUserName(username.value) || !checkPassword(password.value)){
        alert("Thong tin dang nhap khong hop le")
        btnLogin.removeChild(spinner)
        btnLogin.innerHTML = 'Login'
    }
       
    else
        btnLogin.href = './home.html'
}

