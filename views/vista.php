<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>take away</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="../scripts/fancyTable.js"></script>
    <script src="../scripts/peliculas.js"></script>

</head>

<body>
    <div class="container" id="vista">
        <header class="text-center" id="headerLista">
            <h1>Bares y restaurantes</h1>
<!--            <button class="btn btn-success" name="añadir" id="masPeli">Añadir Establecimiento</button>-->
<!--            Día : --><?php //echo date("d-m-Y"); ?>
        </header>
        <div class="ext-center">
            <hr>
            <table id="taulaNegocios" class="table table-responsive table-bordered table-striped">
                <thead>
<!--                    <th><strong>Bar/Restaurante</strong></th>-->
<!--                    <th><strong>dirección</strong></th>-->
<!--                    <th><strong>Municipio</strong></th>-->
<!--                    <th><strong>Teléfono</strong></th>-->
<!--                    <th><strong>Entrega de pedido</strong></th>-->
<!--                    <th><strong>Imagen</strong></th>-->
                </thead>
                <tbody >
                    <?php
                    for ($i = 0; $i < count($datos); $i++) {
                        ?>
                    <tr id="<?php echo $datos[$i]['id'];?>" onclick="capturaValor(<?php echo $datos[$i]['id'];?>)">
                        <td style="width:20%"><a href="https://es.wikipedia.org/wiki/<?php echo $datos[$i]["nombreNegocio"]; ?>"><?php echo $datos[$i]["nombreNegocio"]; ?></a>
                            <hr>
                            <form method="post" action="../">
                                <input value="<?php echo $datos[$i]["id"]; ?>" type="hidden" name="id" />
                                <input value="<?php echo $datos[$i]["nombreNegocio"]; ?>" type="hidden" name="nomNegocio" />
                                <input value="<?php echo $datos[$i]["direccionNegocio"]; ?>" type="hidden" name="direccionNegocio" />
                                <input value="<?php echo $datos[$i]["municipioNegocio"]; ?>" type="hidden" name="municipioNegocio" />
                                <input value="<?php echo $datos[$i]["takeAway"]; ?>" type="hidden" name="takeAway" />
                                <input value="<?php echo $datos[$i]["imagenNegocio"]; ?>" type="hidden" name="imagenNegocio" />
<!--                                <button class="btn btn-danger btn-xs" name="eliminar" type="submit">Eliminar</button>-->
<!--                                <button class="btn btn-warning btn-xs" name="editar" type="submit">Editar</button>-->
                            </form>
                        </td>
                        <td><?php echo $datos[$i]["direccionNegocio"]; ?> </td>
                        <td><?php echo $datos[$i]["municipioNegocio"]; ?> </td>
                        <td><small><?php echo $datos[$i]["tlfNegocio"]; ?></small> </td>
                        <td><small><?php echo $datos[$i]["takeAway"]; ?></small> </td>
                        <td align="center" style="width:20%;"><img src="<?php echo $datos[$i]["imagenNegocio"]; ?>" alt="<?php echo $datos[$i]["nombreNegocio"]; ?>" title="<?php echo $datos[$i]["nomPeli"]; ?>" style="width: 50%; "> </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <a href="../index.php" style="color:black"> <i class="fa fa-arrow-circle-left"></i> Volver a la página principal</a>
            <hr />
        </div>

    </div>
    <footer class="col-lg-12 text-center">

    </footer>
</body>

</html>