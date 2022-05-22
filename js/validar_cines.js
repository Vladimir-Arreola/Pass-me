function validarCine(){
    let id = document.getElementById('id_cine').value;
    let nombre = document.getElementById('nombre').value;
    let municipio = document.getElementById('municipio').selectedIndex;
    let salas = document.getElementById('salas').value;
    let telefono = document.getElementById('telefono').value;
    let domicilio = document.getElementById('domicilio').value;
    let correo = document.getElementById('correo').value;

    if (id == null || id.length == 0 || id == "" || !/^([0-9])*$/.test(id)) {
        alert("El id es necesario y va con solo números enteros");
        document.getElementById('id_cine').focus();
        return false;
    }else if(nombre == null || nombre.length == 0 || nombre == ""){
        alert("El nombre es necesario");
        document.getElementById('nombre').focus();
        return false;
    }else if(municipio == null || municipio.length == 0 || municipio == "" || municipio == 0){
        alert("El municipio es necesario");
        document.getElementById('municipio').focus();
        return false;
    }else if(salas == null || salas.length == 0 || salas == "" || !/^([0-9])*$/.test(salas)) {
        alert("El numero de salas es necesario y va con solo números enteros");
        document.getElementById('salas').focus();
        return false;
    }else if(telefono == null || telefono.length == 0 || telefono == "" || !/^([0-9])*$/.test(telefono)) {
        alert("El telefono es necesario y va con solo números enteros");
        document.getElementById('telefono').focus();
        return false;
    }else if(domicilio == null || domicilio.length == 0 || domicilio == ""){
        alert("El domicilio es necesario");
        document.getElementById('domicilio').focus();
        return false;
    }else if(correo == null || correo.length == 0 || correo == ""){
        alert("El correo es necesario");
        document.getElementById('correo').focus();
        return false;
    }
    return true;
}