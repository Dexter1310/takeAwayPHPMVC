<?php
$tipo=$_GET['tipo'];
$idNegocio=$_GET['id'];
require_once("../models/modelo.php");
$services = new Service();
$regis=$services->listaProducto($idNegocio,$tipo);




?>
<div class="container" id="<?php echo $tipo;?>"
     onclick="volverCapturaListados(<?php echo $idNegocio;?>,'<?php echo $tipo;?>')"
     xmlns="http://www.w3.org/1999/html">

    <?php
    $tipo=$_GET['tipo'];
    $idNegocio=$_GET['id'];

    ?><table class="table table-responsive table-bordered table-striped">
        <thead>
        <th colspan="4"><?php print $tipo;?></th>
        </thead>
        <tbody>

        <?php
    for ($i = 0; $i < count($regis); $i++) {
        print "<td>".$regis[$i]['descripProducto']."  </td>
                <td><scan style='float: right'>".$regis[$i]['precioProducto']." €.  </scan></</td>
                <td><img  src='".$regis[$i]['fotoProducto']."' title='".$regis[$i]['fotoProducto']."'/>  </img></</td>
                <td style='text-align: right'><button class='btn btn-danger'>Eliminar</button>
                <button class='btn btn-warning'>Editar</button></td><tr></tr>";

    }

    ?>
        </tbody>
</table>

</div>
<script src="../scripts/peliculas.js"></script>