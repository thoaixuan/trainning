
result = document.getElementById('result')

function display(value){
    var display = result.value
    var last = display[display.length - 1]
    if(isNaN(value))
        if(last == '+' || last == '-' || last == '*' || last == '/')
            return

    if(value == '')
    result.value = value
    else
    result.value += value
}

function caculate(){
    result.value = eval(result.value)
}


