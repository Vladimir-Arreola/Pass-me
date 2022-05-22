function validarUsuarios(){
    let login = document.getElementById('login').value;
    let nip = document.getElementById('nip').value;
    let tipo = document.getElementById('tipo').value;
    let nombre = document.getElementById('nombre').value;

    if (login == null || login.length == 0 || login == "" || !/^([0-9])*$/.test(login)) {
        alert("El login es necesario y va con solo números enteros");
        document.getElementById('login').focus();
        return false;
    }else if(nip == null || nip.length == 0 || nip == ""){
        alert("El nip es necesario");
        document.getElementById('nip').focus();
        return false;
    }else if(tipo == null || tipo.length == 0 || tipo == ""){
        alert("El tipo de usuario es necesario");
        document.getElementById("tipo").focus();
        return false;
    }else if(nombre == null || nombre.length == 0 || nombre == ""){
        alert("El nombre del usuario es necesario");
        document.getElementById("nombre").focus();
        return false;
    }
    return true;
}