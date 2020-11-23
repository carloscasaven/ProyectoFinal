<?php
$idProducto=$_POST['id'];
$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$cantidad=$_POST['cantidad'];
$domicilio=$_POST['domicilio'];
session_start();
$idUsuario=$_SESSION['idUsuario'];
$fecha=date("Y-m-d H:i:s");
if(empty($nombre)) 
{
   header("Location: catalogo.php");
   exit(); 
}
include_once '../conexion.php';
$mysqlConexion=new mysqli($servidorBD,$usuarioBD,$claveBD,$nombreBD);
$sqlConsulta="SELECT * FROM Productos WHERE Id='".$idProducto."'";
$resultado=$mysqlConexion->query($sqlConsulta);
    if($row = $resultado->fetch_array(MYSQLI_ASSOC))
    {   
        $existencia =$row['Existencia'];
        $inventario=$existencia-$cantidad; 
        if($inventario>=0)
        {
            $sqlModifica = "UPDATE Productos SET Existencia='$inventario' WHERE Id='".$idProducto."'"; 
            if($modifica=$mysqlConexion->query($sqlModifica))
            {
                $importe=$cantidad*$precio;
                $sqlConsulta="INSERT INTO Ventas(IdUsuario,IdProducto,Fecha,Cantidad,Precio,Importe,DomicilioEntrega)
                VALUES ('$idUsuario','$idProducto','$fecha','$cantidad','$precio','$importe','$domicilio')";
                if($resultado=$mysqlConexion->query($sqlConsulta))
                {
                    header("Location: catalogo.php");
                }
                else{
                    Header("Location: detalle.php?id=".$idProducto);
                }
            }
            else
            {
                Header("Location: detalle.php?id=".$idProducto); 
            }
        }
        else
            {
                header("Location: detalle.php?id=".$idProducto); 
            }
    }         
?>