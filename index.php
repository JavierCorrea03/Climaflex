<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prueba Climaflex</title>

        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Libreria CSS para alertas SweetAlert-->
        <link rel="stylesheet" type="text/css" href="vendor/sweetalert2/sweetalert2.min.css"> 
        <!-- Libreria CSS para alertas toast -->
        <link rel="stylesheet" type="text/css" href="vendor/toastr/toastr.css" /> 

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
                                        <h3 class="mb-0">Consultar principales movimientos</h3>
                                    </label>
                                </div>
                                <!-- BOTON -->
                                <div class="row px-3 mb-3" align="right">
                                    <button type="submit" class="btn btn-primary text-center" >Consultar</button>
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
        
        
        
    </body>
</html>
