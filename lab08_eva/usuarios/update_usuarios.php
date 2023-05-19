<?php 
    if(isset($_POST["idUsuario"]) && isset($_POST["nombre"]) && isset($_POST["apellido_Paterno"]) && isset($_POST["apellido_Materno"])  && isset($_POST["direccion"])  && isset($_POST["email"])&& isset($_POST["telefono"]) && isset($_POST["password"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","eval02");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $id = $_POST["idUsuario"];
        $nombre = $_POST["nombre"];
        $apellido_Paterno = $_POST["apellido_Paterno"];
        $apellido_Materno = $_POST["apellido_Materno"];
        $direccion = $_POST["direccion"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $password = $_POST["password"];

        $sql ="UPDATE usuarios SET nombre='$nombre',apellido_Paterno='$apellido_Paterno',apellido_Materno='$apellido_Materno',direccion='$direccion',email='$email',telefono='$telefono',password_='$password' WHERE idUsuario='$id'";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo '<script>window.close();</script>';
            exit();
          } else {
            echo "Ha ocurrido un error al intentar editado el usuario.";
          }

          
        desconectar($xc);
    }
?>