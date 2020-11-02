  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Productos</h1>
      <?php if(isset($_SESSION['texto'])){?>
            <div class="alert alert-<?php if($_SESSION['tipo'] == "success"){ echo "success";}else{echo "danger"; }?> alert-dismissible fade show" role="alert">
                <strong>Excelente! =D</strong> <?php echo $_SESSION['texto'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <?php unset($_SESSION["texto"]); unset($_SESSION["tipo"]); ?>
                </button>
            </div>
      <?php } ?>
      <a href="?view=Productos&action=NuevoProducto" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-box fa-sm "></i> Agregar producto</a>
    </div>

    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listar productos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>                       
                      <th>#</th>
                      <th>Productos</th>
                      <th>Categoria</th>
                      <th>Cantidad</th>
                      <th>P. Compra</th>
                      <th>P. Venta</th>
                      <th>Marca</th>
                      <th>Imagen</th>
                      <th>Fecha Compra</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Productos</th>
                      <th>Cantidad</th>
                      <th>P. Compra</th>
                      <th>P. Venta</th>
                      <th>Categoria</th>
                      <th>Marca</th>
                      <th>Imagen</th>
                      <th>Fecha Compra</th>
                      <th>Opciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php  
                  $i = 1;
                  foreach($this->model->ListarProductos() as $item){  ?>                
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $item->NombreProducto; ?></td>
                      <td><?php echo $item->cantidad; ?></td>
                      <td>$ <?php echo number_format($item->precioVenta, 2); ?></td>
                      <td>$ <?php echo number_format($item->precioCompra, 2); ?></td>
                      <td><?php echo $item->categoria; ?></td>
                      <td><?php echo $item->nombre_marca; ?></td>
                      <td>
                        <img src="assets/img/<?php echo $item->imagen; ?>" width="70px" class="img-fluid" alt="">
                      </td>
                      <td><?php echo date('d-m-Y h:m:s', strtotime($item->fechaCompra)); ?></td>
                      <td>
                          
                        <a href="?view=Productos&action=EditarProduct&id=<?php echo $item->id_producto;?>" class="btn btn-primary btn-circle"> <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="left" title="Editar Registro"></i></a>
                        <a href="?view=Productos&action=BorrarProduct&id=<?php echo $item->id_producto;?>" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="right" title="Borrar Registro"> <i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                <?php $i++;} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

  </div>
        <!-- /.container-fluid -->