  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar marca</h1>
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Editar marca</h6>
                </div>
                <div class="card-body">
                    <form action="?view=Marcas&action=ActualizarMarc" method="post" class="user">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                            <input type="text" name="nombre_marca" value="<?php echo $data->nombre_marca; ?>" class="form-control form-control-user" required id="exampleFirstName" placeholder="Nombre de la Marca">
                        </div>
                        </div>
                        <div class="col-sm-4">
                            <select name="nombre_marca" id="" class="form-control" required>
                                <option value="0">Seleccione nombre de marca</option>
                                <option value="1">HP</option>
                                <option value="2">Leonovo</option>
                                <option value="3">Dell</option>
                                <option value="4">Acer</option>
                                <option value="5">Toshiba</option>
                                <option value="6">Asus</option>
                                <option value="7">Alienware</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <div class="col-sm-6">
                            <input type="submit" value="Actualizar" class="btn btn-primary btn-user btn-block">
                        </div>
                    </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
        <!-- /.container-fluid -->
