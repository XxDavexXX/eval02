<?php 

if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["stock"])  && isset($_POST["precio_venta"])  ) {
    function conectar(){
        $xc = mysqli_connect('localhost',"root","","eval02");
        return $xc;
    }

    function desconectar($xc){
        mysqli_close($xc);
    }

    $xc = conectar();

    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $stock = $_POST["stock"];
    $precio_venta = $_POST["precio_venta"];

    $sql ="INSERT INTO producto (nombre, descripcion, stock,precio_venta) VALUES ('$nombre','$descripcion','$stock','$precio_venta')";
    $res = mysqli_query($xc,$sql);

    if ($res) {
        echo '<script>window.close();</script>';
        exit();

      } else {
        echo "Ha ocurrido un error al intentar insertar el producto intente de nuevo.";
      }

      
    desconectar($xc);
}


?>