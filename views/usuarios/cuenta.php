
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Perfil</h1>
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
                    <img class="img img-fluid rounded-circle mb-2" src="assets/img/Image_Perfil/<?php echo $_SESSION['imagen']; ?>" alt="">
                    <div class="small font-italic text-muted mb-4">
                        JPG ó PNG No mayor a 5MB
                    </div>
                    <form action="?view=Usuarios&action=ChangeImagen" method="POST" enctype="multipart/form-data">
                        <div class="custom-file mb-4">
                            <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="imagen">
                            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
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
                                <input type="text" name="nombres" class="form-control form-control-user" required id="exampleFirstName" placeholder="Nombres">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="apellidos">apellidos</label>
                                <input type="text" name="apellidos" class="form-control form-control-user" required id="exampleFirstName" placeholder="Apellidos">
                            </div>
                            
                        </div>
                        <div class="form-group row">     
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion"  class="form-control form-control-user"  required placeholder="Dirección">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label>Teléfono</label>
                                <input type="number" name="telefono" id=""  required class="form-control form-control-user" placeholder="00000000">                             
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
