  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Confirmar si desea borrar el registro.</h1>
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Borrar</h6>
                </div>
                <div class="card-body">
                    <form action="?view=Usuarios&action=BorrarUse" method="post" class="user">
                    <div class="form-group row">
                    <h1 class="display-4">¿Esta seguro de borrar el registro?</h1>
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    </div>    
                    <div class="form-group row d-flex justify-content-center">
                        <div class="col-sm-6">
                            <a class="btn btn-warning btn-user btn-block" href="?view=Productos">Cancelar</a>
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" value="Si, Borrar" class="btn btn-danger btn-user btn-block">
                        </div>
                    </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
        <!-- /.container-fluid -->