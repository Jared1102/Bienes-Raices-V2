<div class="contenedor-chat">
    <h4>Chat-bot</h4>
    <div id="chat">

    </div>
    <form method="POST" id="form-chat">
        @csrf
        <input type="text" name="mensaje" id="mensaje">
        <input type="button" value="Enviar" onclick="enviarMensaje()">
    </form>
    @auth
        @if (auth()->user()->rol=="Administrador")
        <a href="" id="agregar-preguntas">Agregar preguntas y respuestas</a>
        @endif
    @endauth
    
</div>

<script>
    hora=new Date().getHours();
    let mensajes=[];
    let usuario = @json(auth()->user() ? auth()->user()->username : 'Usuario');

    if(hora<12){
        mensajes.push('Buenos dias');
    }else if(hora>12 && hora<19){
        mensajes.push('Buenas tardes');
    }else if(hora>19){
        mensajes.push('Buenas noches');
    }
    
    mensajes.forEach((element,index) => {

        if(2%(index+1)==0){
            mostrarMensajes(`HomeChat: ${element}`);
        }
        
    });

function enviarMensaje(){
    /*let mensaje=document.getElementById('mensaje');
    mensajes.push(mensaje.value)
    mostrarMensajes(`${usuario}: ${mensaje.value}`);*/
    let mensaje = document.getElementById('mensaje').value;
    let txtMensaje=document.getElementById('mensaje');
        mostrarMensajes(`${usuario}: ${mensaje}`);
        // Hacer una solicitud al servidor para obtener la respuesta
        fetch(`{{ route('chatBot', ['pregunta' => ':mensaje']) }}`.replace(':mensaje', mensaje))
            .then(response => response.json())
            .then(data => {
                if (data.respuesta) {
                    // Si se encuentra una respuesta, mostrarla en el chat
                    
                    mostrarMensajes(`HomeChat: ${data.respuesta}`);
                } else {
                    // Si no se encuentra una respuesta, simplemente mostrar el mensaje del usuario
                    mostrarMensajes(`HomeChat: ${data}`);
                }
            })
            .catch(error => console.error('Error al obtener respuesta:', error));
    txtMensaje.value='';
}
function mostrarMensajes(mensaje){
    chat=document.getElementById('chat');
    let parrafo = document.createElement('p');
    parrafo.textContent=mensaje
    chat.appendChild(parrafo);
    chat.scrollTop=chat.scrollHeight;
}
</script>