<?php
session_start();
require'conexion.php';


if (!isset($_SESSION['usuario'])){

    header("location: index.html");
        

}
else
{

    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
            <!-- Responsive navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="#!">El Gringo - Ganaderia</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="intranet.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page">Ingreso de animales</a></li>
                            <li class="nav-item"><a class="nav-link" href="transporte.html">Transporte</a></li>
                            <li class="nav-item"><a class="nav-link" href="produccion.html">Acopio</a></li>
                            <li class="nav-item"><a class="nav-link" href="contacto.html">servicios</a></li>
                            <?php
                            print "<li class='nav-item'><a class='nav-link' href='#'>$_SESSION[usuario]</a></li>"
                            ?>
                            <li class="nav-item"><a class="nav-link" href="cerrar_s.php">Cerrar sesion</a></li>"

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">
       
                <div class="row bg-dark mt-3 mb-3 fs-3">
                    <div class="col-9 text-white"> Consulta de Animales</div>
                </div>
        
                <div class="row">
                    <div class="col-6">
                        <div class="form">
                            <input type="text" id="idanimal" class="form-control" placeholder="....."
                                aria-describedby="TextHelpBlock" >
                            <div id="TextHelpBlock" class="form-text mb-3" >
                                Ingrese caravana
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                                        <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" id="agregar_animal">
                                        Agregar animal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <table class="table table-sm table-dark table-striped table-hover table-bordered table-striped m-2">
                            <thead>
                                <td>Id animal</td>
                                <td>caravana</td>
                                <td>sexo</td>
                                <td>raza</td>
                                <td>fecha ingreso</td>
                                <td>peso compra</td>
                                <td>precio compra</td>
                                <td>campo</td>
                                <td>corral</td>
                                <td>id lote compra</td>
                                <td>id vendedor</td>
                                
                                <td></td>
                            </thead>
                            <tbody id="idTB1">
        
                            </tbody>
        
        
        
                    </div>
                </div>
            </div>



                    <script>
                        //jquery envio de datos del formulario a php(con metodo $.ajax)
                        $(document).ready(function () {
                            console.log("Pagina lista...");
                            //cada vez que se presiona una tecla envio consulta por ajax
                            $('#idanimal').keyup(function () {
                               $("#idTB1").empty()
                                var p = $('#idanimal').val();
                                if (p != "") {
                                    $.ajax({
                                        url: "consulta.php", //action
                                        type: "POST", //method
                                        data: { "animales": p},
                                        dataType: "json",
                                        success: function (respuesta) {
                                            $.each(respuesta, function (key, value) {
                                                $("#idTB1").append("<tr>" +
                                                    "<td>" + value.id_animal + "</td>" +
                                                    "<td>" + value.n_caravana + "</td>" +
                                                    "<td>" + value.sexo + "</td>" +
                                                    "<td>" + value.id_raza + "</td>" +
                                                    "<td>" + value.fecha_i + "</td>" +
                                                    "<td>" + value.peso_compra + "</td>" +
                                                    "<td>" + value.precio_compra + "</td>" +
                                                    "<td>" + value.id_campo + "</td>" +
                                                    "<td>" + value.id_corral + "</td>" +
                                                    "<td>" + value.id_lote_compra + "</td>" +
                                                    "<td>" + value.id_vendedor + "</td>" +
                                                    "<td class='centrartexto'><a id='idbtm' href='javascript:datas(" + value.id_animal + ")'> <img src='img/data.png'  style='height: 30px; width: 35px;'' class='iconos'></></a>" +
                                                     "</td>" +

                                    "</tr>")
                
                                            })
                                        }
                                    })
                
                                }
                              
                                })
                        });
                
                    </script>
            </div>
        </div>
    </div>


            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Animal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                        <!--Formulario-->

        <div class="container">
            <div class="row">

        <form class="row g-3" method="POST" action="validacionPOST.php" id="formulario_modal">
            <div class="col-6 position-relative">
                <label for="validationTooltip01" class="form-label">Id animal</label>
                <input disabled type="text" class="form-control" value="" id="id_animal">
              </div>
            <div class="col-6 position-relative">
              <label for="validationTooltip01" class="form-label">Caravana</label>
              <input type="text" class="form-control" value="" id="n_caravana">
            </div>
            <div class="col-6 position-relative">
                <label for="validationTooltip04" class="form-label">Raza</label>
                <select class="form-select" id="id_raza" required>
                  <option selected disabled value="">Seleccionar</option>
                  <option value="Angus">Angus</option>
                  <option value="Hereford">Hereford</option>
                  <option value="Brahman">Brahman</option>
                  <option value="Limousin">Limousin</option>
                  <option value="Holstein ">Holstein </option>
                </select>
              </div>
            <div class="col-6 position-relative">
                <label for="validationTooltip04" class="form-label">Sexo</label>
                <select class="form-select" id="sexo" required>
                  <option selected disabled value="">Seleccionar</option>
                  <option value="m">Macho</option>
                  <option value="h">Hembra</option>
                </select>
              </div>
            <div class="col-6 position-relative">
              <label for="validationTooltip01" class="form-label">Peso compra</label>
              <input type="number" class="form-control" value="" id="peso_compra">
            </div>
            <div class="col-6 position-relative">
              <label for="validationTooltip01" class="form-label">Fecha ingreso</label>
              <input type="date" class="form-control" value="" id="fecha_i">
            </div>
            <div class="col-6 position-relative">
                <label for="validationTooltip04" class="form-label">Id campo</label>
                <select class="form-select" id="id_campo" required>
                  <option selected disabled value="">Seleccionar</option>
                  <option value="1">Pergamino</option>
                  <option value="2">Rojas</option>
                  <option value="3">Colon</option>
                  <option value="4">Junin</option>
                  <option value="5">A. Roca</option>
                </select>
              </div>
            <div class="col-6 position-relative">
              <label for="validationTooltip04" class="form-label">id corral</label>
              <select class="form-select" id="id_corral">
                <option selected disabled>Seleccionar</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            <div class="col-6 position-relative">
                <label for="validationTooltip05" class="form-label">Id lote de compra</label>
                <input type="number" class="form-control" id="id_lote_compra">
              </div>
            <div class="col-md-6 position-relative">
              <label for="validationTooltip05" class="form-label">Id vendedor</label>
              <input type="number" class="form-control" id="id_vendedor">
            </div>
              <div class="col-6 position-relative">
                <label for="validationTooltip01" class="form-label">Precio compra</label>
                <input type="number" class="form-control" id="precio_compra" value="">
              </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" id="cancelar_form" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="enviar_form" data-bs-dismiss="modal" class="btn btn-dark">Enviar</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="boton_borrar" class="btn btn-danger" data-bs-dismiss="modal"><a href="javascript:borrar()"><img src="img/tacho.png" style="height: 45px; width: 45px"></a></button>
                        <button type="button" id="boton_editar" data-bs-dismiss="modal" class="btn btn-info"><a href="javascript:editar()"><img src="img/editar.png" style="height: 45px; width: 40px"></a></button>
                        </div>



                    </div>
                </div>
                    


                </div>
                </div>
            </div>


            <script>

                


        

        //jquery envio de datos del formulario a php(con metodo $.ajax)
        $(document).ready(function () {
            
            //cada vez que se presiona una tecla envio consulta por ajax
            $('#enviar_form').click(function(){
            
                
               ///valores del formulario
                var n_caravana = $('#n_caravana').val();
                var id_raza = $('#id_raza').val();
                var sexo = $('#sexo').val();
                var peso_compra = $('#peso_compra').val();
                var fecha_i = $('#fecha_i').val();
                var id_campo = $('#id_campo').val();
                var id_corral = $('#id_corral').val();
                var id_lote_compra = $('#id_lote_compra').val();
                var id_vendedor = $('#id_vendedor').val();
                var precio_compra = $('#precio_compra').val();
                        
                
                //agregar animales

                $.ajax({
                        url: "agregar.php", //action
                        type: "POST", //method
                        data: {"n_caravana": n_caravana, "id_raza":id_raza, "sexo":sexo, "peso_compra":peso_compra, "fecha_i":fecha_i, "id_campo":id_campo, "id_corral":id_corral, "id_lote_compra":id_lote_compra, "id_vendedor":id_vendedor, "precio_compra":precio_compra},
                        dataType: "json"
                        })
            })
        })

                //abrir modal

                function datas(id){

                    llenarformulario(id)
                    $('#exampleModal').modal('show');
                    $("#boton_borrar").show();
                    $("#boton_editar").show();
                    $("#enviar_form").hide();
                    $("#cancelar_form").hide();

                }

                //llenar formulario

                function llenarformulario(id)
                {
                    $.ajax({
                                        url: "llenarformulario.php", //action
                                        type: "POST", //method
                                        data: { "id_animal": id},
                                        dataType: "json",
                                        success: function (respuesta) {
                                            $.each(respuesta, function (key, value) {
                                                $('#id_animal').val(value.id_animal)
                                                $('#n_caravana').val(value.n_caravana)
                                                $('#id_raza').val(value.id_raza)
                                                $('#sexo').val(value.sexo)
                                                $('#peso_compra').val(value.peso_compra)
                                                $('#fecha_i').val(value.fecha_i)
                                                $('#id_campo').val(value.id_campo)
                                                $('#id_corral').val(value.id_corral)
                                                $('#id_lote_compra').val(value.id_lote_compra)
                                                $('#id_vendedor').val(value.id_vendedor)
                                                $('#precio_compra').val(value.precio_compra)







                
                                            })
                                        }
                    })}

                    //confirmar borrar

                   
                                                            






                    function borrar(){
                        var opcion = confirm("Desea borrar el animal seleccionado? ");
                        if (opcion == true) {
                                var id_animal=$('#id_animal').val()

                                $.ajax({

                                    url: "borrar.php", //action
                                                type: "POST", //method
                                                data: { "id_animal": id_animal},
                                                dataType: "json",
                                })
                                $('#exampleModal').modal('hide')
                            }
                            
                    }

                    //editar 
                    function editar(){
                        var id_animal = $('#id_animal').val();
                        var n_caravana = $('#n_caravana').val();
                        var id_raza = $('#id_raza').val();
                        var sexo = $('#sexo').val();
                        var peso_compra = $('#peso_compra').val();
                        var fecha_i = $('#fecha_i').val();
                        var id_campo = $('#id_campo').val();
                        var id_corral = $('#id_corral').val();
                        var id_lote_compra = $('#id_lote_compra').val();
                        var id_vendedor = $('#id_vendedor').val();
                        var precio_compra = $('#precio_compra').val();


                        var opcion = confirm("Confirma editar los datos? ");
                        if (opcion == true) {
                                var caravanamodal=$('#n_caravana').val();

                                $.ajax({

                                    url: "editar.php", //action
                                                type: "POST", //method
                                                data: { "id_animal":id_animal, "n_caravana": n_caravana, "id_raza":id_raza, "sexo":sexo, "peso_compra":peso_compra, "fecha_i":fecha_i, "id_campo":id_campo, "id_corral":id_corral, "id_lote_compra":id_lote_compra, "id_vendedor":id_vendedor, "precio_compra":precio_compra},
                                                dataType: "json",
                                })
                                $('#exampleModal').modal('hide')
                            }
                            
                    }







                    //funciones ocultar y mostrar (segun boton)




                    //agregar animal

                    $('#agregar_animal').click(function(){
                        
                        $("#boton_borrar").hide();
                        $("#boton_editar").hide();
                        $("#enviar_form").show();
                        $("#cancelar_form").show();
                        document.getElementById("formulario_modal").reset();

                    })






                    
            </script>

</body>
</html>