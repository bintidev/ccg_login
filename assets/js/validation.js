
// COMPROBAR QUE FUNCIONA Y LUEGO ACTUALIZAR A BARRA DE PROGRESO

document.getElementById('accessForm').addEventListener("submit", function validateCredentials(event) {

    event.preventDefault();

    let agentId = document.getElementById('agentId').value;
    let passwd = document.getElementById('passwd').value;
    let msj = '';

    let correcto = true;

    // patron a cumplir para usuario valido
    let validId = /^[A-Z]{2}-[a-z][0-9]{2}$/;

    // patrones a cumplir para contraseña valida
    let mayus = /[A-Z]+/;
    let num = /[0-9]{2,}/;
    let special_chars = /[\W]+/;

    // comprobacion de id de agente
    if (agentId.trim() == '' || !agentId.match(validId)) {

        msj = 'Identificación de agente incorrecto';
        marcarError('agentId', msj);
        correcto = false;

    }

    // comprobacion de contraseña
    // campo rellenado
    if (passwd.trim() == '') {

        msj = 'Contraseña requerida';
        marcarError('passwd', msj);
        correcto = false;

    }

    // validez
    if (!passwd.match(mayus) || !passwd.match(num) ||
        !passwd.match(special_chars) || passwd.length < 16) {

        msj = 'Contraseña inválida';
        marcarError('passwd', msj);
        correcto = false;
        
    }

    if (correcto) { document.getElementById("accessForm").submit() };

})

document.getElementById('agentIdHelp').addEventListener("change", function () { limpiarError('agentId') });
document.getElementById('passwdHelp').addEventListener("change", function () { limpiarError('passwd') });

function marcarError(id, msj) {

    document.getElementById(id + 'Help').innerHTML = msj;
    document.getElementById(id + 'Help').style.visibility = 'visible'

}

function limpiarError(id) {

    document.getElementById(id + ' Help').style.visibility = 'hidden';

}