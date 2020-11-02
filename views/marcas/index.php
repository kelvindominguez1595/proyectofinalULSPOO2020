  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Marcas</h1>
      <?php if(isset($_SESSION['texto'])){?>
            <div class="alert alert-<?php if($_SESSION['tipo'] == "success"){ echo "success";}else{echo "danger"; }?> alert-dismissible fade show" role="alert">
                <strong>Excelente! =D</strong> <?php echo $_SESSION['texto'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <?php unset($_SESSION["texto"]); unset($_SESSION["tipo"]); ?>
                </button>
            </div>
      <?php } ?>
      <a href="?view=Marcas&action=NuevoMarca" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-box fa-sm "></i> Agregar marca</a>
    </div>

    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista de Marcas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>                       
                      <th>#</th>
                      <th>Nombre de Marca</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Nombre de Marca</th>
                      <th>Opciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php  
                  $i = 1;
                  foreach($this->model->ListarMarcas() as $item){  ?>                
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $item->nombre_marca; ?></td>

                      <td>
                        <a href="?view=Marcas&action=EditarMarca&id=<?php echo $item->nombre_marca;?>" class="btn btn-primary btn-circle"> <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="left" title="Editar Registro"></i></a>
                        <a href="?view=Marcas&action=BorrarMarca&id=<?php echo $item->nombre_marca;?>" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="right" title="Borrar Registro"> <i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                <?php 
                $i++;} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

  </div>
        <!-- /.container-fluid -->