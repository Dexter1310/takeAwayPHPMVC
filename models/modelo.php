<?php

class Service {
    
    private $servicio;
    private $db;
    private $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,];

    public function __construct() {
        $this->servicio = array();
        $this->db = new PDO('mysql:host=127.0.0.1;dbname=teakaway','root','',$this->options);
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function getServicios() {

        self::setNames();
        $sql = "SELECT * FROM negocio";
        foreach ($this->db->query($sql) as $res) {
            $this->servicio[] = $res;
        }
        return $this->servicio;
        $this->db = null;
    }

    public function setServicio($nom,$direccion,$municipio,$correo,$tlf,$contrase,$imagen,$descripcion,$recojida) {
        $contrasena=md5($contrase);
        self::setNames();
        $stmt= $this->db->prepare("INSERT INTO  negocio (nombreNegocio, direccionNegocio,municipioNegocio,correoNegocio, tlfNegocio, contraNegocio,imagenNegocio,descripNegocio,takeAway) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$nom,$direccion,$municipio,$correo,$tlf,$contrasena,$imagen,$descripcion,$recojida]);
        if ($stmt) {
            echo "<script>location.href='index.php?mensaje=Establecimiento registrado.'</script>";
            return true;
        } else {
            echo "<script>location.href='index.php?mensaje=Establecimiento no registrado.'</script>";
            return false;
        }
    }
    public function mostrarNegocio($id) {
        self::setNames();
        $sql= $this->db->prepare("SELECT * FROM negocio where id=?");
        $sql->execute([$id]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    
    public function eliminar($id,$pel){
         self::setNames();
        $stmt= $this->db->prepare("DELETE FROM `peliculas` WHERE id=?");
        $stmt->execute([$id]);
        if ($stmt) {
            echo "<script>location.href='index.php?mensaje=Película $pel eliminada correctamente.'</script>";
            return true;
        } else {
            echo "<script>location.href='index.php?mensaje=Pelicula $pel no ha sido eliminada.'</script>";
            return false;
        }
        
    }
       public function editar($id,$pel,$director,$ano,$poster,$descripcion){
         self::setNames();
        $an=(int)$ano;
        $stmt= $this->db->prepare("UPDATE peliculas SET nomPeli=?,director=?,ano=?,poster=?,descripcion=? WHERE id=?");
        $stmt->execute([$pel,$director,$an,$poster,$descripcion,$id]);
        if ($stmt) {
            echo "<script>location.href='index.php?mensaje=Película $pel actualizada correctamente.'</script>";
            return true;
        } else {
            echo "<script>location.href='index.php?mensaje=Pelicula $pel no ha sido actualizada.'</script>";
            return false;
        }
        
    }
    public function login($usuario,$pass) {
        self::setNames();
        $sql = $this->db->prepare("SELECT * FROM negocio where nombreNegocio=? or correoNegocio=? and contraNegocio=?");
        $sql->execute([$usuario,$usuario,md5($pass)]);
        $entra = $sql->fetch(PDO::FETCH_ASSOC);$id=$entra['id'];$nom=$entra['nombreNegocio'];
        $cuenta = $sql->rowCount();
        if($cuenta==1){
            echo "<script>location.href='views/vista4.php?id=$id&nom=$nom'</script>";
        }else{
            echo "<script>location.href='index.php?mensaje=Registro no encontrado un registro,compruebe su contraseña y usuario.'</script>";
        }
    }

    public function listaProducto($idNegocio, $tipo)
    {
        self::setNames();
        $sql = $this->db->prepare( "SELECT * FROM producto where tipoProducto=? and FKidNegocio=?");
        $sql->execute([$tipo, $idNegocio]);
        foreach ($sql as $res) {
            $this->servicio[] = $res;
        }
        return $this->servicio;
        $this->db = null;
    }



    public function slider(){
        self::setNames();
        $stmt=$this->db->prepare("SELECT * FROM negocio");
        ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style='width:30%;margin-left:35%;display:flex;'>

    <div class="carousel-inner" >
       <div class='item active' ><img src='https://img.microsiervos.com/Peliculas-Ready-Player-One.jpg' ></div>
      <?php
        $stmt->execute();
         while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='item' ><img src='". $row['imagenNegocio']."' alt='".$row['nombreNegocio']."'  title='".$row['nombreNegocio']."'></div>";

         }
         ?>   <!-- Left and right controls -->
           </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">siguient</span>
    </a></div><?php

    }
}
?>