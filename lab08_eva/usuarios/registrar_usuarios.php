<?php 

if(isset($_POST["nombre"]) && isset($_POST["apellido_Paterno"]) && isset($_POST["apellido_Materno"])  && isset($_POST["direccion"])  && isset($_POST["email"])&& isset($_POST["telefono"]) && isset($_POST["password"])) {
    function conectar(){
        $xc = mysqli_connect('localhost',"root","","eval02");
        return $xc;
    }

    function desconectar($xc){
        mysqli_close($xc);
    }

    $xc = conectar();

    $nombre = $_POST["nombre"];
    $apellido_Paterno = $_POST["apellido_Paterno"];
    $apellido_Materno = $_POST["apellido_Materno"];
    $direccion = $_POST["direccion"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $password = $_POST["password"];

    $sql ="INSERT INTO usuarios (nombre, apellido_Paterno, apellido_Materno,direccion,email,telefono,password_) VALUES ('$nombre','$apellido_Paterno','$apellido_Materno','$direccion','$email','$telefono','$password')";
    $res = mysqli_query($xc,$sql);

    if ($res) {
        header("Location: ../Login_in.html");
        exit(); 

      } else {
        echo "Ha ocurrido un error al intentar insertar el usuario intente de nuevo.";
      }

      
    desconectar($xc);
}


?>