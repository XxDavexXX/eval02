<?php 
    if(isset($_POST["idProducto"]) && isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["stock"])  && isset($_POST["precio_venta"])  ) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","eval02");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $id = $_POST["idProducto"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];
        $precio_venta = $_POST["precio_venta"];

        $sql ="UPDATE producto SET nombre='$nombre',descripcion='$descripcion',stock='$stock',precio_venta='$precio_venta' WHERE idProducto='$id'";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo '<script>window.close();</script>';
            // echo 'Se logro';
            exit();
          } else {
            echo "Ha ocurrido un error al intentar editado el producto.";
          }

          
        desconectar($xc);
    }
?>