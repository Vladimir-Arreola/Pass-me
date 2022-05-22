function validarMunicipio(){
    let id = document.getElementById('id_municipio').value;
    let nombre = document.getElementById('nombre').value;

    if (id == null || id.length == 0 || id == "" || !/^([0-9])*$/.test(id)) {
        alert("El id es necesario y va con solo números enteros");
        document.getElementById('id_municipio').focus();
        return false;
    }else if(nombre == null || nombre.length == 0 || nombre == ""){
        alert("El nombre es necesario");
        document.getElementById('nombre').focus();
        return false;
    }
    return true;
}