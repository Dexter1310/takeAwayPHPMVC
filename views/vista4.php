<?php

$id=$_GET['id'];
$nom=$_GET['nom'];
require_once("../models/modelo.php");
$services = new Service();
$datos = $services->mostrarNegocio($id);


?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!--<script src="scripts/fancyTable.js"></script>-->
<script src="../scripts/peliculas.js"></script>
<br>
<div class="container">
    <table  class="table table-responsive table-bordered table-striped">
        <thead>
        <th>
            <div class="container">

                    <img src="<?php echo $datos['imagenNegocio']?>" alt="<?php echo $nom?>" title="<?php echo $datos['nombreNegocio']?>" style="width:20%; "/>

                <div style="float: right">
                    <h1 href="#"><?php echo $datos['nombreNegocio'];?></h1>
                    <button class="btn btn-default" onclick="window.location.href='../index.php'">Inicio</button>
                    <button class="btn btn-default" onclick="window.location.href='../index.php'">Pedidos</button>
<!--                    <button class="btn btn-default" onclick="window.location.href='../controllers/controlador.php'"></button>-->
                </div>
            </div>
            </div>
</div>
</th>
</thead>
<tbody>
<td>
    <div class="container" id="Tapas" >
    <scan onclick="capturaListados(<?php echo $id;?>,'Tapas','<?php echo $nom;?>')">Tapas </scan>
    </div>
    <button class="btn btn-default"  style="float: right" onclick="capturaListados(<?php echo $id;?>,'Tapas','<?php echo $nom;?>')">ver</button>
    <button class="btn btn-default"  style="float: right" onclick="agregarProducto(<?php echo $id;?>,'Tapas','<?php echo $nom?>')">Añadir</button>
</td>
<tr></tr>
<td>
    <div class="container" id="Menus">
    <scan  onclick="capturaListados(<?php echo $id;?>,'Menus','<?php echo $nom;?>')">Menus</scan>
    </div>
    <button class="btn btn-default"  style="float: right" onclick="capturaListados(<?php echo $id;?>,'Menus','<?php echo $nom;?>')">ver</button>
    <button class="btn btn-default"  style="float: right" onclick="agregarProducto(<?php echo $id;?>,'Menus','<?php echo $nom?>')">Añadir</button>
</td>
<tr></tr>
<td>
    <div class="container" id="Bocadillos" >
    <scan onclick="capturaListados(<?php echo $id;?>,'Bocadillos','<?php echo $nom;?>')">bocadillos</scan>
    </div>
    <button class="btn btn-default"  style="float: right" onclick="capturaListados(<?php echo $id;?>,'Bocadillos','<?php echo $nom;?>')">ver</button>
    <button class="btn btn-default"  style="float: right" onclick="agregarProducto(<?php echo $id;?>,'Bocadillos','<?php echo $nom?>')">Añadir</button>
</td>
<tr></tr>
<td>
    <div class="container" id="Bebida" >
    <scan onclick="capturaListados(<?php echo $id;?>,'Bebida','<?php echo $nom;?>')">Bebida</scan>
    </div>
    <button class="btn btn-default"  style="float: right" onclick="capturaListados(<?php echo $id;?>,'Bebida','<?php echo $nom;?>')">ver</button>
    <button class="btn btn-default"  style="float: right" onclick="agregarProducto(<?php echo $id;?>,'Bebida','<?php echo $nom?>')">Añadir</button>
</td>
<tr></tr>
<td>
    <div class="container" id="Platos" >
    <scan onclick="capturaListados(<?php echo $id;?>,'Platos','<?php echo $nom;?>')">Platos</scan>
    </div>
    <button class="btn btn-default"  style="float: right" onclick="capturaListados(<?php echo $id;?>,'Platos','<?php echo $nom;?>')">ver</button>
    <button class="btn btn-default"  style="float: right" onclick="agregarProducto(<?php echo $id;?>,'Platos','<?php echo $nom?>')">Añadir</button>
</td>
</tbody>
</table>
</div>
