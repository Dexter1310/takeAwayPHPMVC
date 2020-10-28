$(document).ready(function () {
    // $('#addNegocio').css('display','none');
    // $('#idLista').attr('class','col-lg-12 text-center')
    //
    $('#btnTakeAway').click(function() {
        location.reload();
        // $('#addNegocio').css('display','block');
        // $('#idLista').attr('class','col-lg-6 text-center')
    })
    $('#btnAsociados').click(function() {
        $('#addNegocio').css('display','block');
        $('#addNegocio').load('views/vista2.php');
        $('#idLista').attr('class','col-lg-6 text-center')
    })
    $("#taulaNegocios").fancyTable({
        sortColumn: 0,
        pagination: true,
        perPage: 3,
        globalSearch: true,
        inputStyle: "",
        inputPlaceholder: "Busqueda de restaurante o Bar..."
    });

    $('#masPeli').click(function () {
        location.href = '../';
    })
})
$('#rcontra').css('display','none');
$('#cont').keyup(function(){
    var caracteres=$("#cont").val().length;
    if(caracteres == 9 || caracteres>9){ // sea mayor o igual a 8 caracteres de contraseña alfanuméricos
        $('#rcontra').css('display','block');

        $('#cont').css('border-color','#68f03d');
    }else{
        $('#rcontra').css('display','none');
    }
});
$('#repContra').keyup(function(){
    if($('#repContra').val()==$('#cont').val()&& $('#cont').val().length>1 && $('#repContra').val().length>1){
        $('#repContra').css('border-color','#68f03d');
    }else{
        $('#repContra').css('border-color','#f03d53');
    }
});
function capturaValor(e){
    $('#vista').load('../views/vista3.php?id='+e);
}

function capturaListados(id,tipo,nom) {
    $('#'+tipo).load('vista5.php?id='+id+'&tipo='+tipo+'&nom='+nom+ ' #'+tipo);
}
function volverCapturaListados(id,tipo,nom) {
     $('#'+tipo).load('vista4.php?id='+id+'&tipo='+tipo+'&nom='+nom+ ' #'+tipo);
}
function agregarProducto(id,tipo,nom) {
    $('#'+tipo).load(agregar(tipo));
}

function agregar(tipo){
var descripcion=null;
var imagen=null;
var nombre=null;
var form=
    "    <form name=\"form\" action=\"\" method=\"get\">" +
    "        <div class=\"form-group\"><label>Nombre de "+tipo+"</label>" +
    "        <input type=\"text\" name=\"producto\" class=\"form-control\" placeholder= \"Nombre del producto\"></div>" +
    "        <label>Imagen de "+tipo+"</label>" +
    "        <input type=\"text\" name=\"imagen\" placeholder='imagen link eje.. face o instagram'>" +
    "        <label>Precio "+tipo+"</label>" +
    "        <input type=\"number\" name=\"precio\" placeholder=''> €<br><br>" +
    "        <label>Descripcion de "+tipo+"</label>" +
    "        <textarea  name=\"descripcion\" placeholder= \"Descripción del producto\"></textarea>"  +
    "    </form>" +
    "    <button onclick=\"sub()\">Agregar</button>"

   document.getElementById(tipo).innerHTML="Añadir "+tipo+"\n "+form;
}
function sub(){
    product = document.getElementsByName("producto")[0].value;
    descripcion = document.getElementsByName("descripcion")[0].value;
    alert(product+" "+descripcion);
};