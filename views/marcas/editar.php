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
                        </div>
                        <div class="col-sm-4">
                            <select name="nombre_marca" id="" class="form-control" required>
                                <option value="0">Seleccione nombre de marca</option>
                                <option value="HP">HP</option>
                                <option value="Leonovo">Leonovo</option>
                                <option value="Dell">Dell</option>
                                <option value="Acer">Acer</option>
                                <option value="Toshiba">Toshiba</option>
                                <option value="Asus">Asus</option>
                                <option value="Alienware">Alienware</option>
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
