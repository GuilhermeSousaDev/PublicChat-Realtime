function insertMessage() {
    const inp = document.querySelector('#msg') 
    const user = document.querySelector('.user')
    const xhr = new XMLHttpRequest()
    xhr.open("POST","App/privatemessage.php")
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(`mensagem=${inp.value}&received=${user.value}`)
    inp.value = ''
}

function getMessages() {
    const xhr = new XMLHttpRequest()
    const msg = document.querySelector('.mensagens')
    const user = document.querySelector('.user').value
    xhr.onload = () => {
        msg.innerHTML = xhr.responseText
    }
    xhr.open("POST","App/getPrivatemessage.php")
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send("user=" + user)
}

setInterval(getMessages, 500)