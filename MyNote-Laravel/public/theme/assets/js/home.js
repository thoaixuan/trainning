let day = document.querySelector('.day')
let night = document.querySelector('.night')
let sidebar = document.querySelector('.sidebar')
let dashboard = document.querySelector('.dashboard')
let test = document.querySelector('.test')
let theme = localStorage.getItem('theme')
let table = document.querySelector('.table')
let sbitem = document.querySelectorAll('.sidebar__item')
let modal = document.querySelector('.modal-content')

if(theme === 'light'){
  setLightTheme()
  day.classList.add('active')
  night.classList.remove('active')
}
  
if(theme === 'dark'){
  setDarkTheme()
  day.classList.remove('active')
  night.classList.add('active')
}
  


day.addEventListener('click', function(){
    setLightTheme()
    localStorage.setItem('theme','light')
})

night.addEventListener('click', function(){
    setDarkTheme()
    localStorage.setItem('theme','dark')

})

function setDarkTheme(){
    sidebar.classList.add('sidebar--night')
    dashboard.classList.add('dashboard--night')
    document.body.style.background = "url('/theme/assets/img/bgdark.jpg') center"
    test.classList.add('text-light')
    if(table != null){
      table.classList.add('text-light','border-light')
      table.classList.remove('border-secondary')
    }
   
    sbitem.forEach(element => {
      element.classList.add('text_light')
    });
    if(modal == null)
      return
    modal.classList.add("dashboard--night")
    modal.classList.add("text-light") 
}

function setLightTheme(){
    sidebar.classList.remove('sidebar--night')
    dashboard.classList.remove('dashboard--night')
    document.body.style.background = "url('/theme/assets/img/bg-login.png') center"
    test.classList.remove('text-light')
    if(table != null){
      table.classList.remove('text-light','border-light')
      table.classList.add('border-secondary')
    }
    sbitem.forEach(element => {
      element.classList.remove('text_light')
    });
    if(modal == null)
      return
    modal.classList.remove("dashboard--night")
    modal.classList.remove("text-light")  
}


let startY;
let endY; 

window.addEventListener("touchstart", event => {
  startY = event.touches[0].clientY;
});


window.addEventListener("touchmove",function(event) {
    
  endY = event.touches[0].clientY;
  
  if (endY > startY  && endY <=300) {
   
     sidebar.classList.add('show')
     event.preventDefault()
  }

  if (endY < startY && endY <= 300) {
   
    sidebar.classList.remove('show')
    event.preventDefault()
  }
  
},{ passive: false });


window.addEventListener("touchend", () => {
  startY = null;
  endY = null;
});

let url = window.location.href
       
if(url.indexOf("home") !== -1)
    sbitem[0].classList.add('btn-primary')
if(url.indexOf("notes") !== -1)
    sbitem[1].classList.add('btn-primary')
if(url.indexOf("users") !== -1)
    sbitem[2].classList.add('btn-primary')
if(url.indexOf("contact") !== -1)
    sbitem[3].classList.add('btn-primary')