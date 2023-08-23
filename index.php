<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prueba Climaflex</title>
        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="16x16 32x32" href="img/logo-33.png">
        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Libreria CSS para alertas SweetAlert-->
        <link rel="stylesheet" type="text/css" href="vendor/sweetalert2/sweetalert2.min.css"> 
        <!-- Libreria CSS para alertas toast -->
        <link rel="stylesheet" type="text/css" href="vendor/toastr/toastr.css" /> 
        <!-- Datatables -->
        <link rel="stylesheet" type="text/css" href="vendor/DataTables-1.10.20/css/dataTables.bootstrap4.min.css">

        <style>
            .fondo {
                width: 500px;
                height: 340px;
            }
            .div_logo {
                background-color: #005ec3;
            }
        </style>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
            <div id="div_consulta">
                <div class="card card0 border-0">
                    <div class="row d-flex">
                        <!-- IMAGEN -->
                        <div class="col-lg-4 div_logo">
                            <div class="card1">
                                <div class="row px-3 justify-content-center mt-2 mb-2">
                                    <img src="img/logo-33.png" class="fondo">
                                </div>
                            </div>
                        </div>
                        <!-- CONTENIDO -->
                        <div class="col-lg-8">
                            <div class="card2 card border-0 px-4 py-5">
                                <!-- TEXTO -->
                                <div class="row px-3 mb-3">
                                    <label class="mb-1">
                                        <h3 class="mb-0">Consultar los principales movimientos mayores a $250.00 MXN</h3>
                                    </label>
                                </div>
                                <!-- BOTON -->
                                <div class="row px-3 mb-3">
                                    <button id="btn_consulta" type="button" class="btn btn-primary text-center" >Consultar</button>
                                </div>
                                <!-- TABLA -->
                                <div class="table-responsive" id="div_tabla">
                                    <!-- Contenido Tabla Tarimas -->
                                    <table class="table table-hover table-striped table-bordered dt-responsive nowrap" id="tabla" style="width:100%">
                                        <thead style="color: #FFF; background-color: #005ec3; text-align: center;">
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Descripción</th>
                                                <th>Precio</th>
                                                <th>Movimiento</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!<!-- MODAL CARGANDO -->
        <div id="modal_cargando" class="modal fade" tabindex="-5" style="opacity: 0.4; background-color: black;" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" style="margin-top: 25%;">
                <div style="display: flex; justify-content: center; align-items: center;">
                    <center>
                        <span class="spinner-border text-white"></span>
                        <strong>
                            <div style='#FFFFFF'>Cargando...</div>
                        </strong>
                    </center>
                </div>
            </div>
        </div>
        
        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Datatables -->
        <script type="text/javascript" src="vendor/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="vendor/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
        
        <script> 
            var tabla_principal = "";
            // CLICK EN CONSULTAR
            $("#btn_consulta").click(function(){
                
                abrir_modal("modal_cargando");
                
                tabla_principal = $('#tabla').DataTable({
                    "iDisplayStart": 0,
                    "iDisplayLength": 10,
                    "bPaginate": true,
                    "bSort": true,
                    "scrollX": true,
                    "language": {
                        "emptyTable": "No hay datos disponibles en la tabla",
                        "lengthMenu": "Mostrar _MENU_ entradas",
                        "search": "Buscar:",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        "infoEmpty": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                        "zeroRecords": "No se encontraron registros coincidentes",
                        "paginate": {
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    "preDrawCallback": function (settings) {
                        contador = 1;
                    },
                    "rowCallback": function (row, data) {
                        $(row).find('td:eq(0), td:eq(1), td:eq(2), td:eq(3), td:eq(4), td:eq(5), td:eq(6)').addClass('text-center');
                    },
                    ajax: {
                        url: "controlador/control.php",
                        method: "POST",
                        error: function (d) {
                            //efecto_error("No fue posible cargar la tabla, por favor, intente de nuevo.");
                            console.log("error");
                            cerrar_modal("modal_cargando");
                        }
                    },
                    columns: [
                        {
                            "defaultContent": "",
                            "render": function (data, type, row) {
                                return contador++;
                            }, visible: true
                        },
                        {"data": "nombre"},
                        {"data": "apellido"},
                        {"data": "descripcion"},
                        {"data": "precio"},
                        {"data": "tipo_de_movimiento"},
                        {"data": "fecha_de_movimiento"}
                    ],
                    "destroy": true
                }).on("draw", function () {
                    cerrar_modal("modal_cargando");
                });
                
//                $.ajax({
//                    url: "controlador/control.php",
//                    type: "POST",
//                    cache: false,
//                    contentType: false,
//                    processData: false
//                }).done(function(res) {
//                    cerrar_modal("modal_cargando");
//                    console.log(res);
//                });
                
            });
            
            
            
         </script>
         
         <!-- MODAL -->
        <script>
            function abrir_modal(div) {
                $('#' + div).css("display", "block");
            }

            function cerrar_modal(div) {
                $('#' + div).css("display", "none");
            }
        </script>
        
    </body>
</html>
