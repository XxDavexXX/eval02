<?php 
    if(isset($_POST["id"])) {
        function conectar(){
            $xc = mysqli_connect('localhost',"root","","eval02");
            return $xc;
        }
    
        function desconectar($xc){
            mysqli_close($xc);
        }
    
        $xc = conectar();
        $id = $_POST["id"];
        $sql ="UPDATE producto SET estado=0 WHERE idProducto='$id'";
        $res = mysqli_query($xc,$sql);
        if ($res) {
            echo "El Producto ha sido eliminado correctamente.";
          } else {
            echo "Ha ocurrido un error al intentar eliminar el Producto.";
          }

          
        desconectar($xc);
    }
?>