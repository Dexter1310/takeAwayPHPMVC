<?php
$id= $_GET['id'];
require_once("../models/modelo.php");
$services = new Service();
$datos = $services->mostrarNegocio($id);
$tapa = new Service();
$Tapas = $tapa->listaProducto($id,'Tapas');
$menu = new Service();
$Menus = $menu->listaProducto($id,'Menus');
$bocata = new Service();
$Bocadillos = $bocata->listaProducto($id,'Bocadillos');
$bebida = new Service();
$Bebida = $bebida->listaProducto($id,'Bebida');
$plato = new Service();
$Platos = $plato->listaProducto($id,'Platos');

?>
<br>
<div class="container">
<table id="negocioEncontrado" class="table table-responsive table-bordered table-striped">
    <thead>
    <th colspan="4">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $datos['imagenNegocio']?>" alt="<?php echo $datos['nombreNegocio']?>" title="<?php echo $datos['nombreNegocio']?>" style="width:40%; "/>
            </div>
            <div class="col-sm-5 pull-center">
                <h1 href="#"><?php echo $datos['nombreNegocio'];?></h1>
                <small style="color: blueviolet"><?php echo $datos['takeAway'];?></small>
            </div>
            <div class="col-sm-2 pull-right">
                <button class="btn btn-default" onclick="window.location.href='../index.php'">Inicio</button>
                <button class="btn btn-default" onclick="window.location.href='../controllers/controlador.php'">Listado</button>

            </div>

            </div>
        </div>
    </th>

    </thead>
    <tbody>
    <td>
        <table class="table table-responsive table-bordered table-striped">
            <thead><th colspan="4"> Tapas</th></thead>
       <tbody>
        <?php
        for ($i = 0; $i < count($Tapas); $i++) {
            print "<td>".$Tapas[$i]['descripProducto']."  </td>
                <td><scan style='float: right'>".$Tapas[$i]['precioProducto']." €.  </scan></</td>
                <td><img  src='".$Tapas[$i]['fotoProducto']."' title='".$Tapas[$i]['fotoProducto']."'/>  </img></</td>
                <td style='text-align: right'><button class='btn btn-success'>Añadir</button></td><tr></tr>";
        }
        ?>
       </tbody>
        </table>

    </td>
    <tr></tr>
    <td>
        <table class="table table-responsive table-bordered table-striped">
            <thead><th colspan="4">Menus</th></thead>
            <tbody>
            <?php
            for ($i = 0; $i < count($Menus); $i++) {
                print "<td>".$Menus[$i]['descripProducto']."  </td>
                <td><scan style='float: right'>".$Menus[$i]['precioProducto']." €.  </scan></</td>
                <td><img  src='".$Menus[$i]['fotoProducto']."' title='".$Menus[$i]['fotoProducto']."'/>  </img></</td>
                <td style='text-align: right'><button class='btn btn-success'>Añadir</button></td><tr></tr>";
            }
            ?>
            </tbody>
        </table>

    </td>
    <tr></tr>
    <td>
        <table class="table table-responsive table-bordered table-striped">
            <thead><th colspan="4">Bocadillos</th></thead>
            <tbody>
            <?php
            for ($i = 0; $i < count($Bocadillos); $i++) {
                print "<td>".$Bocadillos[$i]['descripProducto']."  </td>
                <td><scan style='float: right'>".$Bocadillos[$i]['precioProducto']." €.  </scan></</td>
                <td><img  src='".$Bocadillos[$i]['fotoProducto']."' title='".$Bocadillos[$i]['fotoProducto']."'/>  </img></</td>
                <td style='text-align: right'><button class='btn btn-success'>Añadir</button></td><tr></tr>";
            }
            ?>
            </tbody>
        </table>

    </td>
    <tr></tr>
    <td>
        <table class="table table-responsive table-bordered table-striped">
            <thead><th colspan="4">Bebida</th></thead>
            <tbody>
            <?php
            for ($i = 0; $i < count($Bebida); $i++) {
                print "<td>".$Bebida[$i]['descripProducto']."  </td>
                <td><scan style='float: right'>".$Bebida[$i]['precioProducto']." €.  </scan></</td>
                <td><img  src='".$Bebida[$i]['fotoProducto']."' title='".$Bebida[$i]['fotoProducto']."'/>  </img></</td>
                <td style='text-align: right'><button class='btn btn-success'>Añadir</button></td><tr></tr>";
            }
            ?>
            </tbody>
        </table>
    </td>
    <tr></tr>
    <td>
        <table class="table table-responsive table-bordered table-striped">
            <thead><th colspan="4">Platos</th></thead>
            <tbody>
            <?php
            for ($i = 0; $i < count($Platos); $i++) {
                print "<td>".$Platos[$i]['descripProducto']."  </td>
                <td><scan style='float: right'>".$Platos[$i]['precioProducto']." €.  </scan></</td>
                <td><img  src='".$Platos[$i]['fotoProducto']."' title='".$Platos[$i]['fotoProducto']."'/>  </img></</td>
                <td style='text-align: right'><button class='btn btn-success'>Añadir</button></td><tr></tr>";
            }
            ?>
            </tbody>
        </table>
    </td>


    </tbody>

</table>
</div>
