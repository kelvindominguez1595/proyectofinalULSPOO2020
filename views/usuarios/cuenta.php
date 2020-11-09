
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Perfil</h1>
      <?php if(isset($_SESSION['texto'])){?>
            <div class="alert alert-<?php if($_SESSION['tipo'] == "success"){ echo "success";}else{echo "danger"; }?> alert-dismissible fade show" role="alert">
                <strong>
                    <?php 
                    if($_SESSION['tipo'] == "success"){ 
                        echo "Excelente!!!";
                        }else{
                            echo "Ooops!"; 
                        }?> 
            </strong> <?php echo $_SESSION['texto'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <?php unset($_SESSION["texto"]); unset($_SESSION["tipo"]); ?>
                </button>
            </div>
      <?php } ?>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Imagen de Perfil
                    </h6>
                </div>
                <div class="card-body text-center">
                    <img class="img img-account-profile rounded-circle mb-2" src="assets/img/Image_Perfil/<?php echo $data->imagen; ?>" alt="">
                    <div class="small font-italic text-muted mb-4">
                        JPG ó PNG No mayor a 5MB
                    </div>
                    <form action="?view=Usuarios&action=ChangeImagen" method="POST" enctype="multipart/form-data">
                         <div class="custom-file mb-4">
                             <label for="file" class="btn btn-primary" id="label_span">
                                 <i class="fa fa-upload"></i>
                                  Seleccionar imagen
                             </label>
                             <input type="file" name="imagen" id="file" class="file-input">
                         </div>
                        <input type="submit" value="Cambiar" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Detalle de la Cuenta
                    </h6>
                </div>
                <div class="card-body">
                    <form action="?view=Usuarios&action=ActualizarPerfil" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="nombre">Nombres</label>
                                <input type="text" name="nombres" class="form-control form-control-user" required id="exampleFirstName" placeholder="Nombres" value="<?php echo $data->nombres; ?>">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="apellidos">apellidos</label>
                                <input type="text" name="apellidos" class="form-control form-control-user" required id="exampleFirstName" placeholder="Apellidos" value="<?php echo $data->apellidos; ?>"> 
                            </div>
                            
                        </div>
                        <div class="form-group row">     
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion"  class="form-control form-control-user"  required placeholder="Dirección" value="<?php echo $data->direccion; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="" value="<?php echo $data->email; ?>">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label>Teléfono</label>
                                <input type="number" name="telefono" id=""  required class="form-control form-control-user" placeholder="00000000" value="<?php echo $data->telefono; ?>">                             
                            </div>        
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-sm-6">
                                <input type="submit" value="Actualizar perfil" class="btn btn-primary btn-user btn-block">
                            </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row  d-flex justify-content-end">
        <div class="col-md-8 mt-3">
        <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Cambiar Contraseña
                    </h6>
                </div>
                <div class="card-body text-center">
                <form action="?view=Usuarios&action=ActualizarPass" method="post" enctype="multipart/form-data">
                    <div class="form-group row d-flex justify-content-center">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="nombre">Nueva contraseña</label>
                            <input type="password" name="password" class="form-control form-control-user" required id="exampleFirstName" placeholder="*******">
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <div class="col-sm-6">
                            <input type="submit" value="Cambiar contraseña" class="btn btn-primary btn-user btn-block">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- /.container-fluid -->
