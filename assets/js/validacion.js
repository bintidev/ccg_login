
// COMPROBAR QUE FUNCIONA Y LUEGO ACTUALIZAR A BARRA DE PROGRESO

document.getElementById('accessForm').addEventListener("submit", function validateCredentials(event) {

    event.preventDefault();

    let agentId = document.getElementById('agentId').value;
    let psswd = document.getElementById('psswd').value;
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

    // error por cada requisito de contraseña no cumplida
    // campo rellenado
    if (psswd.trim() == '') {
        msj = 'Contraseña requerida';
        marcarError_Psswd('requerida', msj);
        correcto = false;
    }

    // caracteres
    if (!psswd.match(mayus)) {
        msj = 'Mínimo una letra mayúscula';
        marcarError_Psswd('caracteres', msj);
        correcto = false;
    }

    // numerico
    if (!psswd.match(num)) {
        msj = 'Debe contener al menos 2 dígitos';
        marcarError_Psswd('caracteres', msj);
        correcto = false;
    }

    // caracteres especiales
    /*if (!psswd.match(special_chars)) {
        msj = 'Debe contener al menos 2 caracteres especiales';
        marcarError('especiales', msj);
        correcto = false;
    }

    // largo de contraseña
    if (psswd.length < 16) {
        msj = 'Tamaño mín. 16 caracteres';
        marcarError('tamanio', msj);
        correcto = false;
    }*/

    if (correcto) { document.getElementById("accessForm").submit() };

})

document.getElementById('agentIdHelp').addEventListener("change", function () { limpiarError('agentId') });
document.getElementById('requerida').addEventListener("change", function () { limpiarError('requerida') });
document.getElementById('caracteres').addEventListener("change", function () { limpiarError('caracteres') });

function marcarError(id, msj) {

    document.getElementById(id + 'Help').innerHTML = msj;
    document.getElementById(id + 'Help').style.visibility = 'visible'

}

function marcarError_Psswd(id, msj) {

    //document.getElementById(id).remove();
    let specific = document.createElement('li');
    specific.id = id;
    specific.innerHTML = msj;

    document.getElementById('psswdHelp').appendChild(specific);

}

function limpiarError(id) {

    document.getElementById(id).style.visibility = 'hidden';

}