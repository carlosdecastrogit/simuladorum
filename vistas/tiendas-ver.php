<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/tiendas-ver.php";
        include "modulos/encabezado.php";
        include "modulos/menu.php";
    
    ?>  

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">TIENDAS </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="tiendas.php">Tiendas</a></li>
                <li class="breadcrumb-item active">Tiendas</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Inicio del contenedor de datos -->
        <div class="container" style="padding: 0px 20px 50px 20px;">
            <div class="row justify-content-center">
                <!-- Verifica si se debe procesar -->
                <?php if ($procesar=="ok") {  ?>
                    <!-- Imprimer mensaje de alerta o error en procesar [calcular, guardar]  -->
                    <?php  if ($mensaje_usuario!=""){ ?>
                        <div class="col-12 ">
                            <?php if($error_accion==1){ ?>
                                <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                            <?php }else{ ?>
                                <h3 class="text-center text-danger"><?php echo "ERROR 4: ".$mensaje_usuario; ?></h3>
                            <?php } ?>    
                        </div>
                    <?php } ?>
                    <!-- /. Fin del mensaje -----------------------------------------------  -->
                    <!-- Íconos Generales -->
                    <div class="col-md-12" style="padding: 0px 10px 20px 10px;">
                        <?php if ($txtUsuarioTipo!="A") {?>
                            <a href="despacho-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                        <?php }?>
                            <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                        </div>
                    <!-- /. Fin íconos Generales -->

                    <!-- Inicio Div Empresa-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtEmpresa">Empresa</label>
                                <select class="form-control" name="txtEmpresa">
                                    <?php foreach ($listado_empresa as $empresa) { ?>
                                        <option value="<?php echo $empresa['nro']; ?>"> <?php echo $empresa['nombre']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <!-- /. Fin inicio Div Empresa-->

                    <!-- Div Vacío-->
                        <div class="col-md-8">

                        </div>
                    <!-- /. Fin Div vacío-->

                    <!-- Div Capacidad de almacén -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCant_cap_almacen">Capacidad de Almacén</label>
                                <input type="number" class="form-control" name="txtCant_cap_almacen" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_cap_almacen; ?>" readonly>
                            </div>
                        </div>
                    <!-- /. fin Div capacidad de almacén-->
                    <!-- Div Capacidad de almacén -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCant_existencia">Existencia</label>
                                <input type="number" class="form-control" name="txtCant_existencia" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_existencia; ?>" readonly>
                            </div>
                        </div>
                    <!-- /. fin Div capacidad de almacén-->
                    <!-- Div Capacidad de almacén -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCant_cap_disp">Capacidad Disponible</label>
                                <input type="number" class="form-control" name="txtCant_cap_disp" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_cap_disp; ?>" readonly>
                            </div>
                        </div>
                    <!-- /. fin Div capacidad de almacén-->
                    
                <!-- Movimientos de queso Duro ************************************************************ -->   
                    <?php if($Accion_dub=="SI") {?>
                        <!-- Separador -->
                        <div class="col-md-12">
                            <hr style="color: #0056b2;" />
                        </div>
                    <!-- /. Fin Separador -->
                    
                        <!-- Ficha movimientos de tienda-->
                            <div class="col-12">
                                <div class="card card-primary text-center">
                                <div class="card-header">
                                    <h3 class="card-title"><b> <?php echo $txtNombre_tienda; ?>: Queso Duro Blanco </b></h3>

                                    <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Transacción</th>
                                            <th>Entradas</th>
                                            <th>Venta</th>
                                            <th>PVP</th>
                                            <th>Ingreso</th>
                                            <th>Disponibilidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listado_tiendas_mov_dub as $tiendas_mov) { ?>
                                            <tr>
                                                <td><?php echo $tiendas_mov['fecha']; ?></td>
                                                <td><?php echo $tiendas_mov['tipo_operacion']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_entrada']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_venta']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_monto_pvp']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_ingreso']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_disponible']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        <!-- /. Fin ficha movimientos de tiendas-->
                    <?php }?>
                <!-- ******************************************************************************************* -->
                
                <!-- Movimientos de queso Mozarella ************************************************************ -->   
                    <?php if($Accion_moz=="SI") {?>
                        <!-- Separador -->
                        <div class="col-md-12">
                            <hr style="color: #0056b2;" />
                        </div>
                    <!-- /. Fin Separador -->
                    
                        <!-- Ficha movimientos de tienda-->
                            <div class="col-12">
                                <div class="card card-primary text-center">
                                <div class="card-header">
                                    <h3 class="card-title"><b> <?php echo $txtNombre_tienda; ?>: Queso Mozarella </b></h3>

                                    <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Transacción</th>
                                            <th>Entradas</th>
                                            <th>Venta</th>
                                            <th>PVP</th>
                                            <th>Ingreso</th>
                                            <th>Disponibilidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listado_tiendas_mov_moz as $tiendas_mov) { ?>
                                            <tr>
                                                <td><?php echo $tiendas_mov['fecha']; ?></td>
                                                <td><?php echo $tiendas_mov['tipo_operacion']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_entrada']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_venta']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_monto_pvp']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_ingreso']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_disponible']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        <!-- /. Fin ficha movimientos de tiendas-->
                    <?php }?>
                <!-- ******************************************************************************************* -->
                
                <!-- Movimientos de queso Gouda ************************************************************ -->   
                    <?php if($Accion_gou=="SI") {?>
                        <!-- Separador -->
                        <div class="col-md-12">
                            <hr style="color: #0056b2;" />
                        </div>
                    <!-- /. Fin Separador -->
                    
                        <!-- Ficha movimientos de tienda-->
                            <div class="col-12">
                                <div class="card card-primary text-center">
                                <div class="card-header">
                                    <h3 class="card-title"><b><?php echo $txtNombre_tienda; ?>: Queso Gouda</b></h3>

                                    <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Transacción</th>
                                            <th>Entradas</th>
                                            <th>Venta</th>
                                            <th>PVP</th>
                                            <th>Ingreso</th>
                                            <th>Disponibilidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listado_tiendas_mov_gou as $tiendas_mov) { ?>
                                            <tr>
                                                <td><?php echo $tiendas_mov['fecha']; ?></td>
                                                <td><?php echo $tiendas_mov['tipo_operacion']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_entrada']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_venta']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_monto_pvp']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_ingreso']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_disponible']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        <!-- /. Fin ficha movimientos de tiendas-->
                    <?php }?>
                <!-- ******************************************************************************************* -->
                
                <!-- Movimientos de queso dietético ************************************************************ -->   
                    <?php if($Accion_die=="SI") {?>
                        <!-- Separador -->
                        <div class="col-md-12">
                            <hr style="color: #0056b2;" />
                        </div>
                    <!-- /. Fin Separador -->

                        <!-- Ficha movimientos de tienda-->
                            <div class="col-12">
                                <div class="card card-primary text-center">
                                <div class="card-header">
                                    <h3 class="card-title"><b><?php echo $txtNombre_tienda; ?>: Queso Dietético </b></h3>

                                    <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Transacción</th>
                                            <th>Entradas</th>
                                            <th>Venta</th>
                                            <th>PVP</th>
                                            <th>Ingreso</th>
                                            <th>Disponibilidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listado_tiendas_mov_die as $tiendas_mov) { ?>
                                            <tr>
                                                <td><?php echo $tiendas_mov['fecha']; ?></td>
                                                <td><?php echo $tiendas_mov['tipo_operacion']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_entrada']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_venta']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_monto_pvp']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_ingreso']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_disponible']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        <!-- /. Fin ficha movimientos de tiendas-->

                    <?php }?>
                <!-- ******************************************************************************************* -->
                
                <!-- Movimientos de Armadillo ************************************************************ -->   
                    <?php if($Accion_arm=="SI") {?>
                        <!-- Separador -->
                        <div class="col-md-12">
                            <hr style="color: #0056b2;" />
                        </div>
                    <!-- /. Fin Separador -->
                    
                        <!-- Ficha movimientos de tienda-->
                            <div class="col-12">
                                <div class="card card-primary text-center">
                                <div class="card-header">
                                    <h3 class="card-title"><b> Armadillo : <?php echo $txtNombre_queso; ?> </b></h3>

                                    <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Transacción</th>
                                            <th>Entradas</th>
                                            <th>Venta</th>
                                            <th>PVP</th>
                                            <th>Ingreso</th>
                                            <th>Disponibilidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listado_tiendas_mov_arm as $tiendas_mov) { ?>
                                            <tr>
                                                <td><?php echo $tiendas_mov['fecha']; ?></td>
                                                <td><?php echo $tiendas_mov['tipo_operacion']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_entrada']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_venta']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_monto_pvp']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_ingreso']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_disponible']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        <!-- /. Fin ficha movimientos de tiendas-->
                    <?php }?>
                <!-- ******************************************************************************************* -->
                
                <!-- Movimientos de ciudadela ************************************************************ -->   
                    <?php if($Accion_ciu=="SI") {?>
                        <!-- Separador -->
                        <div class="col-md-12">
                            <hr style="color: #0056b2;" />
                        </div>
                    <!-- /. Fin Separador -->
                    
                        <!-- Ficha movimientos de tienda-->
                            <div class="col-12">
                                <div class="card card-primary text-center">
                                <div class="card-header">
                                    <h3 class="card-title"><b> Ciudadela: <?php echo $txtNombre_queso; ?> </b></h3>

                                    <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Transacción</th>
                                            <th>Entradas</th>
                                            <th>Venta</th>
                                            <th>PVP</th>
                                            <th>Ingreso</th>
                                            <th>Disponibilidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listado_tiendas_mov_ciu as $tiendas_mov) { ?>
                                            <tr>
                                                <td><?php echo $tiendas_mov['fecha']; ?></td>
                                                <td><?php echo $tiendas_mov['tipo_operacion']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_entrada']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_venta']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_monto_pvp']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_ingreso']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_disponible']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        <!-- /. Fin ficha movimientos de tiendas-->
                    <?php }?>
                <!-- ******************************************************************************************* -->
                
                <!-- Movimientos de San Fierro ************************************************************ -->   
                    <?php if($Accion_sfi=="SI") {?>
                        <!-- Separador -->
                        <div class="col-md-12">
                            <hr style="color: #0056b2;" />
                        </div>
                    <!-- /. Fin Separador -->
                    
                        <!-- Ficha movimientos de tienda-->
                            <div class="col-12">
                                <div class="card card-primary text-center">
                                <div class="card-header">
                                    <h3 class="card-title"><b>San Fierro:  <?php echo $txtNombre_queso; ?></b></h3>

                                    <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Transacción</th>
                                            <th>Entradas</th>
                                            <th>Venta</th>
                                            <th>PVP</th>
                                            <th>Ingreso</th>
                                            <th>Disponibilidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listado_tiendas_mov_sfi as $tiendas_mov) { ?>
                                            <tr>
                                                <td><?php echo $tiendas_mov['fecha']; ?></td>
                                                <td><?php echo $tiendas_mov['tipo_operacion']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_entrada']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_venta']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_monto_pvp']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_ingreso']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_disponible']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        <!-- /. Fin ficha movimientos de tiendas-->
                    <?php }?>
                <!-- ******************************************************************************************* -->
                
                <!-- Movimientos de Los Santos ************************************************************ -->   
                    <?php if($Accion_lsa=="SI") {?>
                        <!-- Separador -->
                        <div class="col-md-12">
                            <hr style="color: #0056b2;" />
                        </div>
                    <!-- /. Fin Separador -->

                        <!-- Ficha movimientos de tienda-->
                            <div class="col-12">
                                <div class="card card-primary text-center">
                                <div class="card-header">
                                    <h3 class="card-title"><b>Los Santos:  <?php echo $txtNombre_queso; ?>  </b></h3>

                                    <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Transacción</th>
                                            <th>Entradas</th>
                                            <th>Venta</th>
                                            <th>PVP</th>
                                            <th>Ingreso</th>
                                            <th>Disponibilidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listado_tiendas_mov_lsa as $tiendas_mov) { ?>
                                            <tr>
                                                <td><?php echo $tiendas_mov['fecha']; ?></td>
                                                <td><?php echo $tiendas_mov['tipo_operacion']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_entrada']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_venta']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_monto_pvp']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_ingreso']; ?></td>
                                                <td><?php echo $tiendas_mov['cant_disponible']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        <!-- /. Fin ficha movimientos de tiendas-->

                    <?php }?>
                <!-- ******************************************************************************************* -->



                <!-- Div CTA ver tienda-->
                    <div class="col-md-2" style="padding-top: 0px;">
                        <a href="tiendas.php"type="button" class="btn btn-primary btn-block"> Volver</a>
                    </div>
                <!-- /. Fin Div CTA ver tienda-->
                <!-- Div CTA ver tienda-->
                    <div class="col-md-10" style="padding-top: 32px;">

                </div>
                <!-- /. Fin Div CTA ver tienda-->

                <!-- /. Instrucciones si no se va a procesar -->

                <?php }else{ ?>

                        <!-- Imprimer mensaje de alerta o error al final de procesar o antes de procesar  -->
                        <?php  if ($mensaje_usuario!=""){ ?>
                            <div class="col-md-12 ">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <?php if($error_accion==1){ ?>
                                            <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                                        <?php }else{ ?>
                                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                                        <?php } ?>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form action="subasta-r.php" method="post">
                                            <div class="row justify-content-center">
                                                <div class="col-md-3">
                                                    <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- fin de imprimir mensaje ---------------------------------------------------  -->

                <?php } ?>
            </div>
            <!-- /. fin row del contenedor  -->

        </div>
    <!-- /. Fin de contenedor de datos -->

    </div>
    <!-- /.content-wrapper -->
    
    <?php
        include "modulos/footer.php";
    ?>    

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
