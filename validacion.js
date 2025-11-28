
// COMPROBAR QUE FUNCIONA Y LUEGO ACTUALIZAR A BARRA DE PROGRESO

document.getElementById('form1').addEventListener("submit", function (event) {

    event.preventDefault();

    let agentId = document.getElementById('agentId').value;
    let psswd = document.getElementById('psswd').value;
    let msj = '';

    let correcto = true;

    let validId = /^[a-zA-Z]{2}-[a-z][0-9]{2}$/;
    let chars = /[a-zA-Z]+/;
    let num = /[0-9]{2,}/;
    let special_chars = /[\W]+/;

    if (agentId.trim() == '' || !agentId.match(validId)) {
        marcarError(agentId);
        correcto = false;
    }

    // error por cada requisito de contraseña no cumplida
    // tamaño de contraseña
    if (psswd.length < 16) {
        msj = '';
        marcarError('tamanio');
        correcto = false;
    }

    // caracteres
    if (!psswd.match(chars)) {
        marcarError('caracteres');
        correcto = false;
    }



})

document.getElementById(agentId).addEventListener("change", limpiarError(agentId));
document.getElementById(psswd).addEventListener("change", limpiarError(psswd));

function marcarError(id, msj) {

    let help = document.createElement('div');
    help.id = id + 'Help';
    help.className = 'text-input text-danger';
    help.innerHTML = msj;

    document.getElementById(id).style.borderColor = red;
    document.getElementById(id).append(help);

}

let limpiarError = function (id) {

    let removeHelp = document.getElementById(id + 'Help');
    removeHelp.remove();
    document.getElementById(id).style.borderColor = '';

}