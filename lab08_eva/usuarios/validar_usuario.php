<?php 

if(isset($_POST["email"]) && isset($_POST["password"])) {
    function conectar(){
        $xc = mysqli_connect('localhost',"root","","eval02");
        return $xc;
    }

    function desconectar($xc){
        mysqli_close($xc);
    }

    $xc = conectar();

    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql ="SELECT * FROM  usuarios WHERE email='$email' AND password_='$password'";
    $res = mysqli_query($xc,$sql);
    // echo $res;

    if ($res && mysqli_num_rows($res) > 0) {
        header("Location: ../inicio.php");
        exit(); 
      } else {
        echo "Ha ocurrido un error al intentar insertar el usuario intente de nuevo.";
      }

      
    desconectar($xc);
}


?>