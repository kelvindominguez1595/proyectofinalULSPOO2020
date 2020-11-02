
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Agregar Usuario</h1>
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Nuevo usuario</h6>
                </div>
                <div class="card-body">
                    <form onsubmit="return validarrPass();" action="?view=Usuarios&action=CrearUsuario" method="post" submit class="user" enctype="multipart/form-data">
                    <div class="form-group row">
                    <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="nombre">Nombres</label>
                            <input type="text" name="nombres" class="form-control form-control-user" required id="exampleFirstName" placeholder="Nombres"  value="<?php echo $data->nombres; ?>">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="apellidos">apellidos</label>
                            <input type="text" name="apellidos" class="form-control form-control-user" required id="exampleFirstName" placeholder="Apellidos"  value="<?php echo $data->apellidos; ?>">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion"   value="<?php echo $data->direccion; ?>" class="form-control form-control-user"  required placeholder="Dirección">
                        </div>
  
                    </div>
                    <div class="form-group row">     
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="direccion">Email</label>
                            <input type="text" name="email" required  class="form-control form-control-user" placeholder="example@example"  value="<?php echo $data->email; ?>">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="direccion">Contraseña</label>
                            <input type="password" name="pass" id="pass" required class="form-control form-control-user" placeholder="******"  value="<?php echo $data->pass; ?>">
                        </div>
 
                        <div class="col-sm-4 mb-3 mb-sm-0">
                                <label>Nivel de usuario</label>
                                    <select name="roles_id" id="" class="form-control">
                                        <option value="0" >Seleccione nivel</option>
                                        <?php
                                        foreach($this->modelRoles->ListarRoles() as $item){
                                            if($item->id == $data->roles_id){
                                        ?>
                                         <option value="<?php echo $item->id; ?>" selected><?php echo $item->nombre; ?></option>
    
                                        <?php                                   
                                            }
                                        ?>
                                        <option value="<?php echo $item->id; ?>"><?php echo $item->nombre; ?></option>
    
                                        <?php
                                            }
                                        ?>
                                    </select>                               
                                 
                            </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                            <label>Teléfono</label>
                            <input type="number" name="telefono" id=""  required class="form-control form-control-user" placeholder="00000000" value="<?php echo $data->telefono; ?>">                             
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label>Subir imagen</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang" name="imagen"  lang="es">
                                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                            </div>
                        </div>         
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <div class="col-sm-6">
                            <input type="submit" value="Guardar" class="btn btn-primary btn-user btn-block">
                        </div>
                    </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
        <!-- /.container-fluid -->
