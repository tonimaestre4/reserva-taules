function validacionForm(){
    

    var dni=document.getElementById('dni').value
    var password=document.getElementById('psswd').value

    if (dni=='' && password=='') {

        //  Los campos DNI y Contraseña estan vacios
        document.getElementById('message').innerHTML='<p style="color:red">DNI y contraseña vacios</p>';
        document.getElementById("dni").style.border = "thick solid #FF0000";
        document.getElementById("psswd").style.border = "thick solid #FF0000";
        return false
    }else if (dni=='') {

        //  El campo DNI esta vacio
        document.getElementById('message').innerHTML='<p style="color:red">DNI vacio</p>';
        document.getElementById("dni").style.border = "thick solid #FF0000";
        document.getElementById("psswd").style.border = "thick solid #f2f2f2";
        
        return false
    }else if (password=='') {

        //  El campo contraseña esta vacio
        document.getElementById('message').innerHTML='<p style="color:red">Contraseña vacio</p>';
        document.getElementById("psswd").style.border = "thick solid #FF0000";
        document.getElementById("dni").style.border = "thick solid #f2f2f2";

        return false
    }else{
        return true
    }

}