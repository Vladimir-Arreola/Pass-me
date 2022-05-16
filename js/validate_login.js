function validar(){
    var usuario = document.getElementById("usuario").value;
    var pass = document.getElementById("pass").value;

    if(usuario == null || usuario.length==0 || usuario==""){
        alert("El nombre de usuario es obligatorio");
        document.getElementById("usuario").style.backgroundColor = "#f5d3d4";
        return false;
    }else if(pass == null || pass.length == 0 || pass == ""){
        alert("La contraseña es obligatoria");
        document.getElementById("pass").style.backgroundColor = "#f5d3d4";
        return false;
    }
}