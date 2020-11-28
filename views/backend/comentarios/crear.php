  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Crear nuevo comentario</h1>
      
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Nuevo comentario</h6>
                </div>
                <div class="card-body">
                    <form action="?view=Comentarios&action=CrearComentarios" method="post" class="user">
                    <div class="form-group row">
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <input type="number" name="producto_id" id="" min="0"  class="form-control form-control-user" placeholder="Producto_id">
                        </div>
                    <div class="col-sm-4">
                    <input type="text" name="rating" id="" class="form-control form-control-user" required placeholder="Clasificacion">
                        </div>
                        <div class="col-sm-4">
                            <textarea name="comentario" id="" cols="10" rows="5" class="form-control " required placeholder="Comentario"></textarea>
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
