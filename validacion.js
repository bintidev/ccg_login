
// COMPROBAR QUE FUNCIONA Y LUEGO ACTUALIZAR A BARRA DE PROGRESO

document.getElementById('accessForm').addEventListener("submit", function (event) {

    event.preventDefault();

    let agentId = document.getElementById('agentId').value;
    let psswd = document.getElementById('psswd').value;
    let msj = '';

    let correcto = true;

    // patron a cumplir para usuario valido
    let validId = /^[a-zA-Z]{2}-[a-z][0-9]{2}$/;

    // patrones a cumplir para contraseña valida
    let mayus = /[A-Z]+/;
    let num = /[0-9]{2,}/;
    let special_chars = /[\W]+/;

    // comprobacion de id de agente
    if (agentId.trim() == '' || !agentId.match(validId)) {
        msj = 'Identificación de agente incorrecto';
        marcarError(agentId);
        correcto = false;
    }

    // error por cada requisito de contraseña no cumplida
    // campo rellenado
    if (psswd.trim() == '') {
        msj = 'Contraseña requerida';
        marcarError('requerida', msj);
        correcto = false;
    }

    // caracteres
    if (!psswd.match(mayus)) {
        msj = 'Mínimo una letra mayúscula';
        marcarError('caracteres', msj);
        correcto = false;
    }

    // numerico
    if (!psswd.match(num)) {
        msj = 'Debe contener al menos 2 dígitos';
        marcarError('caracteres', msj);
        correcto = false;
    }

    // caracteres especiales
    if (!psswd.match(special_chars)) {
        msj = 'Debe contener al menos 2 caracteres especiales';
        marcarError('especiales', msj);
        correcto = false;
    }

    // largo de contraseña
    if (psswd.length < 16) {
        msj = 'Tamaño mín. 16 caracteres';
        marcarError('tamanio', msj);
        correcto = false;
    }

    if (correcto) { document.getElementById("accessForm").submit() };

})

document.getElementById(agentId).addEventListener("input", limpiarError(agentId));
document.getElementById(psswd).addEventListener("input", limpiarError(psswd));

function marcarError(id, msj) {

    let help = document.createElement('div');
    help.id = id + 'Help';
    help.className = 'text-input text-danger';
    help.innerHTML = msj;

    document.getElementById(id).style.borderColor = red;
    document.getElementById(id).append(help);

}

let limpiarError = function (id) {

    let help = document.getElementById(id + 'Help');
    help.remove();
    document.getElementById(id).style.borderColor = '';

}