function insertMessage() {
    const inp = document.getElementById('msg')
    if(inp.value !== '') {
        const xhr = new XMLHttpRequest()
        xhr.open("POST","./App/insertmessage.php");
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send("mensagem=" + inp.value)
        inp.value = ''
    }
}
function getMessages() {
    const mensagens = document.querySelector('.mensagens')
    const xhr = new XMLHttpRequest()
    xhr.onload = () => {
        mensagens.innerHTML = xhr.responseText
    }
    xhr.open("POST","message.php")
    xhr.send()
}
setInterval( getMessages, 500 )

window.addEventListener('keydown', e => {
    if(e.key == 'Enter') {
        const inp = document.getElementById('msg')
        if(inp.value !== '') {
            const xhr = new XMLHttpRequest()
            xhr.open("POST","./App/insertmessage.php");
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send("mensagem=" + inp.value)
            inp.value = ''
        }
    }
})