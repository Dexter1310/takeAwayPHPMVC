<!DOCTYPE html>
<?php
//Todo: añadir ,eliminar y editar la película

if (isset($_POST['envio'])) {
    include "models/modelo.php";$nuevo = new Service();
$asd = $nuevo->setServicio($_POST['nomNegocio'],$_POST['direccionNegocio'],$_POST['municipioNegocio'],$_POST['correoNegocio'],$_POST['tlfNegocio'],$_POST['contr'],$_POST['imagenNegocio'],$_POST['descripcionNegocio'],$_POST['recojidaPedidos']);
} 
if(!empty($_GET['mensaje'])){$mensaje=$_GET['mensaje'];}else{$mensaje="";}
if(isset($_POST['eliminar'])){
    include "models/modelo.php"; $nuev = new Service();
$asd = $nuev->eliminar($_POST['id'],$_POST['pelidel']); }
if(isset($_POST['editar'])){
 $id=$_POST['id'];$p=$_POST['pelidel'];$d=$_POST['director'];$a=$_POST['ano'];$po=$_POST['poster'];$de=$_POST['descripcion'];$btn="Editar";$sub="editarOk";$h3="Editar película <scan style='color:blue;'>".$p."</scan>";
 }else{
 $p="";$d="";$a="";$mu="";$po="";$de="";$im="";$con="";$btn="Añadir";$sub="envio";$h3="Nuevo establecimiento";
}
if(isset($_POST['editarOk'])){
    include "models/modelo.php"; $nuev = new Service();
    $asd = $nuev->editar($_POST['id'],$_POST['nom'],$_POST['ano'],$_POST['director'],$_POST['imagen'],$_POST['descripcion']);
}
if(isset($_POST['entraLoginNegocio'])){
    include "models/modelo.php";
    $usuario=$_POST['usuNegocio'];
    $pass=$_POST['contrNegocio'];
    $asd=$login = new Service();
    $login->login($usuario,$pass);
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Take Away</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="scripts/fancyTable.js"></script>

</head>
<body>
    <div class="container">
        <header class="text-center">
            <h1>Take Away</h1>
            <h> <scan style="color: green">Soporte frente COVID-19 para bares y restaurantes</scan> </h>
            <hr />
<!--            Día : --><?php //echo date("d-m-Y"); ?>
        </header>
        <div class="row">
            <div class="col-lg-6" id="addNegocio">
                <b><?php echo $mensaje; ?></b>
                <form action="#" method="post" class="col-sm-10" id="formularioAddNegocio">
                    <h3><?php echo $h3;?></h3>
                    <input type="hidden" name="id" class="form-control" value="<? echo $id;?>" required />
                    <div>Nombre de establecimiento o negocio<input type="text" name="nomNegocio" id="nomb" class="form-control" placeholder="Nombre" value="<? echo $p;?>" required /></div>
                    <div>Dirección: <input type="text" name="direccionNegocio" class="form-control" placeholder="dirección " value="<? echo $d;?>" required /></div>
                    <div>Municipio: <input type="text" name="municipioNegocio" class="form-control" placeholder="municipio " value="<? echo $mu;?>" required /></div>
                    <div>Correo:<input type="email" name="correoNegocio" class="form-control" placeholder="mail@.." value="<? echo $a;?>" required /></div>
                    <div>Teléfono: <input type="number" name="tlfNegocio" class="form-control" placeholder="teléfono de contacto" value="<? echo $im;?>" required /></div>
                    <div>imagen:<small>(Opcional)</small> <input type="text" name="imagenNegocio" class="form-control" placeholder="imagen url" value="<? echo $po;?>" /></div>
                    <div>Descripción :<small>(Opcional)</small><textarea class="form-control" placeholder="Descripción de su negocio" name="descripcionNegocio" required><? echo $de;?></textarea></div>
                    <div>Seleccione forma de entrega de pedidos:
                        <select class="form-control" name="recojidaPedidos">
                            <option value="Entrega al domicilio del cliente">Entrega al domicilio del cliente.</option>
                            <option value="Recojida en el establecimiento">Recojida en el establecimiento.</option>
                            <option value="Recojida y/o entrega">Recojida y/o entrega.</option>
                        </select>
                    </div>
                    <div>Nueva Contraseña: <input id="cont" type="password" name="contr" class="form-control" placeholder="contraseña debe tener mínimo 8 carcateres alfa numéricos" value="<? echo $con;?>" required /></div>
                    <div id="rcontra">Repita Contraseña: <input id="repContra" type="password" name="contr" class="form-control" placeholder="contraseña debe tener mínimo 8 carcateres alfa numéricos" value="<? echo $con;?>" required /></div>
                    <br />
                    <input type="submit" value="<?php echo $btn;?>" name="<?php echo $sub;?>" class="btn btn-success" />
                </form>
            </div>
            <div class="col-lg-6 text-center" id="idLista">
                <h3>Listado de Establecimientos</h3>
                <div><button class="btn btn-default" id="btnTakeAway">Crear take Away para tu negocio</button>
                <button class="btn btn-default" id="btnAsociados">Asociados a take away</button>
                <button class="btn btn-default" onclick="window.location.href='controllers/controlador.php'">
<!--                <i class="fa fa-align-justify"></i>-->
                    Restaurantes y Bares</button>
                    <br>
                </div>
                <hr />
                <?php include "models/modelo.php";$nuevo = new Service();
                    $asd = $nuevo->slider();
                    ?>
            </div>
        </div>
        <hr>
        <footer class="col-lg-12 ">
            <small><scan style="color:grey"></scan><i>Javier Orti</i></small>
        </footer>
    </div>
</body>

</html>
<script src="scripts/peliculas.js"></script>