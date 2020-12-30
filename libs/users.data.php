<?php


function validar($post, $elem)
{
  
    switch ($elem) {

        case 'nombre':
            if(isset($post[$elem])){
                
            $dat_nombre = trim(filter_var($post[$elem], FILTER_SANITIZE_STRING));
            
            $validNombre = filter_var($dat_nombre, FILTER_SANITIZE_SPECIAL_CHARS);
            
            if (!isset($validNombre) || $validNombre == "") {
                
                    return aviso_error($elem);

                } elseif (strlen($validNombre) < 2 || strlen($validNombre) > 30) {

                    return aviso_error($elem);
                }

                    return $validNombre;
                }
            
            break;
        

        case 'apellidos':
            if(isset($post[$elem])){

                $dat_apellidos = trim(filter_var($post[$elem], FILTER_SANITIZE_STRING));
            
                $validApellidos = filter_var($dat_apellidos, FILTER_SANITIZE_SPECIAL_CHARS);
                
                if (!isset($validApellidos) || $validApellidos == "") {
                    
                        return aviso_error($elem);
    
                    } elseif (strlen($validApellidos) < 2 || strlen($validApellidos) > 50) {
    
                        return aviso_error($elem);
                    }
    
                        return $validApellidos;
                    }
            break;
        
        case 'email':
            if(isset($post[$elem])){
                
                $validEmail = trim(filter_var($post[$elem], FILTER_SANITIZE_EMAIL));               
                
                if (!isset($validEmail) || strlen($validEmail) > 50) {
    
                        return aviso_error($elem);
                    }
    
                        return strtolower($validEmail);
                    }
            break;
    
        case 'dni':
            if(isset($post[$elem])){

                $dat_dni = trim(filter_var($post[$elem], FILTER_SANITIZE_STRING));
            
                $validDNI = filter_var($dat_dni, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(\d{8}[a-zA-Z]{1}|[XxYyZz]{1}\d{7}[a-zA-Z]{1})$/")));
                
                if (!isset($validDNI) || $validDNI == "") {
                    
                        return aviso_error($elem);
    
                    }else{
    
                        return strtolower($validDNI);
                    }
                }
            break;
        

        case 'contrasenya':
            if(isset($post[$elem])){

            $dat_contrasenya = $post[$elem];

            if (strlen($dat_contrasenya) < 8){

                return aviso_error($elem);

            }else {

                return $dat_contrasenya;
            }
            }
            break;
        

        case 'validacion':
            if(isset($post[$elem])){

                $dat_validacion= $post[$elem];

                if($_POST['contrasenya'] !== $dat_validacion){

                    return aviso_error($elem);

                }else {

                    return $dat_validacion;
                }
            
            break;
        }
    }
}

function aviso_error($errVar)
{
$errors = "";
    switch ($errVar) {
        
        case 'nombre':
            $errorStr = "El nombre introducido no es válido.";
            $errors .= $errorStr;
            break;
        case 'apellidos':
            $errorStr = "Los apellidos introducidos no son válidos.";
            $errors .= $errorStr;
            break;
        case 'email':
            $errorStr = "El email no es válido.";
            $errors .= $errorStr;
            break;
        case 'dni':
            $errorStr = "El DNI/NIE no es válido.";
            $errors .= $errorStr;
            break;
        case 'contrasenya':
            $errorStr = "El password introducido no es válido (tiene que tener una longitud mínima de 8).";
            $errors .= $errorStr;
            break;
        case 'validacion':
            $errorStr = "La repetición del password no coincide.";
            $errors .= $errorStr;
            break;
    }
    return $errors;
}

