<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inicio.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1 style="color:#fff;">Tabla - Productos</h1>
        <table>
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Precio Venta</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    function conectar(){
                        $xc = mysqli_connect('localhost',"root","","eval02");
                        return $xc;
                    }

                    function desconectar($xc){
                        mysqli_close($xc);
                    }


                    $xc = conectar();
                    $sql = "SELECT * FROM producto";
                    $res = mysqli_query($xc,$sql);
                    desconectar($xc);
                    $num = 1;

                    echo "<tbody>";
                    while($filas=mysqli_fetch_array($res))
                    {
                        $nombre = $filas['nombre'];
                        $descripcion = $filas['descripcion'];
                        $stock = $filas['stock'];
                        $precio_venta = $filas['precio_venta'];
                        $estado = $filas['estado'];
                        echo " <tr>";
                        echo "<td scope='row'>".$num."</td>";
                        echo "<td>".$nombre."</td>";
                        echo "<td>".$descripcion."</td>";
                        echo "<td>".$stock."</td>";
                        echo "<td>S/. ".$precio_venta."</td>";
                        if ($estado == 1) {
                            echo "<td style='color:green;'>Activo</td>";
                        }else{
                            echo "<td style='color:red;'>Inactivo</td>";
                        }
                        echo "<td><button id='doc".$num."' style='margin-right:10px;' class='btn btn-info' onclick='abrirFormulario_usuarios_edit(".$num.")'>Editar</button><button id='doc".$num."' style='margin-right:10px;' class='btn btn-danger' onclick ='eliminar_producto(".$num.")'>Eliminar</a></button>";
                        echo "</tr>";
                        $num++;
                    }
                ?>
                </tbody>
            </table>
        <div style='display:flex;'>
            <button style='margin-top:10px;' onclick='recargar_page()' type="button" class="btn btn-secondary">Recargar Tabla</button>
            <button style='margin-left:10px;margin-top:10px;' class='btn btn-dark' onclick='abrirFormulario_agregar_producto()'>+ Producto</button>
        </div>


        <h1 style="color:#fff;">Tabla - Usuarios</h1>
        <table>
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Dirección</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Password</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $xc = conectar();
                    $sql = "SELECT * FROM usuarios";
                    $res = mysqli_query($xc,$sql);
                    desconectar($xc);
                    $num = 1;

                    echo "<tbody>";
                    while($filas=mysqli_fetch_array($res))
                    {
                        $nombre = $filas['nombre'];
                        $apellido_Paterno = $filas['apellido_Paterno'];
                        $apellido_Materno = $filas['apellido_Materno'];
                        $direccion = $filas['direccion'];
                        $email = $filas['email'];
                        $telefono = $filas['telefono'];
                        $password_ = $filas['password_'];
                        $estado = $filas['estado'];
                        echo " <tr>";
                        echo "<td scope='row'>".$num."</td>";
                        echo "<td>".$nombre."</td>";
                        echo "<td>".$apellido_Paterno."</td>";
                        echo "<td>".$apellido_Materno."</td>";
                        echo "<td>".$direccion."</td>";
                        echo "<td>".$email."</td>";
                        echo "<td>".$telefono."</td>";
                        echo "<td>".$password_."</td>";
                        if ($estado == 1) {
                            echo "<td style='color:green;'>Activo</td>";
                        }else{
                            echo "<td style='color:red;'>Inactivo</td>";
                        }
                        echo "<td><button id='doc".$num."' style='margin-right:10px;' class='btn btn-info' onclick='abrirFormulario_usuarios_edit(".$num.")'>Editar</button><button id='doc".$num."' style='margin-right:10px; margin-top:10px;' class='btn btn-danger' onclick ='eliminar_usuario(".$num.")'>Eliminar</a></button>";
                        echo "</tr>";
                        $num++;
                    }
                ?>
                </tbody>
            </table>
        <div style='display:flex;'>
            <button style='margin-top:10px;' onclick='recargar_page()' type="button" class="btn btn-secondary">Recargar Tabla</button>
            <button style='margin-left:10px;margin-top:10px;' class='btn btn-dark' onclick='abrirFormulario_agregar_usuario()'>+ Usuario</button>
        </div>
    </div>
</body>
<script>
        function eliminar_producto(x){
        var id = x;
        let xhr = new XMLHttpRequest();
        console.log(id);
        xhr.open("POST", "productos/eliminar_producto.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        location.reload();
        }
        
        function abrirFormulario_productos_edit(x) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "usuarios/form_editar_usuarios.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + x);
        var ventana = window.open("usuarios/form_editar_usuarios.php?x=" + x, "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
        }

        function abrirFormulario_agregar_producto() {
        let xhr = new XMLHttpRequest();
        var ventana = window.open("productos/Registrar_producto.html", "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
        }
        
        function eliminar_usuario(x){
        var id = x;
        let xhr = new XMLHttpRequest();
        console.log(id);
        xhr.open("POST", "usuarios/eliminar_usuario.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
        location.reload();
        }

        function abrirFormulario_usuarios_edit(x) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "usuarios/form_editar_usuarios.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + x);
        var ventana = window.open("usuarios/form_editar_usuarios.php?x=" + x, "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
        }

        function abrirFormulario_agregar_usuario() {
        let xhr = new XMLHttpRequest();
        var ventana = window.open("usuarios/Registrarse.html", "_blank", "width=1000,height=700");
        ventana.moveTo((screen.width-ventana.outerWidth)/2, (screen.height-ventana.outerHeight)/2);
        }

        function recargar_page(){
        location.reload();
        }
    
</script>
</html>