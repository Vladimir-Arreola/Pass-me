function validarPeli(){
    let id = document.getElementById('id_pelicula').value;
    let cine = document.getElementById('cine').selectedIndex;
    let nombre = document.getElementById('nombre').value;
    let clasificacion = document.getElementById('clasificacion').value;
    let director = document.getElementById('director').value;
    let genero = document.getElementById('genero').value;
    let duracion = document.getElementById('duracion').value;
    let idioma = document.getElementById('idioma').value;
    let horario = document.getElementById('horario').value;
    let poster = document.getElementById('poster').value;

    if (id == "" || id.length == 0 || !/^([0-9])*$/.test(id)) {
        alert("El id es necesario y va con solo números enteros");
        document.getElementById('id_pelicula').focus();
        return false;
    }else if(cine == null || cine.length == 0 || cine == "" || cine == 0){
        alert("El cine es necesario");
        document.getElementById('cine').focus();
        return false;
    }else if(nombre == "" || nombre.length == 0 || nombre == null){
        alert("El nombre de la película es necesario");
        document.getElementById('nombre').focus();
        return false;
    }else if(clasificacion == "" || clasificacion.length == 0 || clasificacion == null){
        alert("La clasificacion de la película es necesaria");
        document.getElementById('clasificacion').focus();
        return false;
    }else if(director == "" || director.length == 0 || director == null){
        alert("El director de la película es necesario");
        document.getElementById('director').focus();
        return false;
    }else if(genero == "" || genero.length == 0 || genero == null){
        alert("El genero de la película es necesario");
        document.getElementById('genero').focus();
        return false;
    }else if(duracion == "" || duracion.length == 0 || duracion == null || !/^([0-9])*$/.test(id)){
        alert("La duracion de la película es necesaria y lleva solo números");
        document.getElementById('duracion').focus();
        return false;
    }else if(idioma == "" || idioma.length == 0 || idioma == null){
        alert("El idioma de la película es necesario");
        document.getElementById('idioma').focus();
        return false;
    }else if(horario == "" || horario.length == 0 || horario == null){
        alert("El horario de la película es necesario");
        document.getElementById('horario').focus();
        return false;
    }else if(poster == "" || poster.length == 0 || poster == null){
        alert("El poster de la película es necesario");
        document.getElementById('poster').focus();
        return false;
    }
}