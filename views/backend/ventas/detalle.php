  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Ventas</h1>
      <?php if(isset($_SESSION['texto'])){?>
            <div class="alert alert-<?php if($_SESSION['tipo'] == "success"){ echo "success";}else{echo "danger"; }?> alert-dismissible fade show" role="alert">
            <strong>                   
                    <?php if($_SESSION['tipo'] == "success"){ echo "Exitos!!! 😊";}else{echo "Ooops! Ah Ocurrido un error 😱"; }?>
                 </strong> 
                <?php echo $_SESSION['texto'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <?php unset($_SESSION["texto"]); unset($_SESSION["tipo"]); ?>
                </button>
            </div>
      <?php } ?>
      <a href="?view=Usuarios&action=NuevoUsuario" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm "></i> Agregar usuario</a>
    </div>

    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detalle de venta</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>                       
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>SubTotal</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php  
                  $i = 1;
                  $subtotal = 0;
                  foreach($data as $item){ ?>   
                  <tr>
                      <td>
                          <?php echo $item->NombreProducto; ?> 
                      </td>
                      <td>
                          <?php echo $item->cantiVenta; ?> 
                      </td>
                      <td>
                        $<?php echo $item->cantiVenta * $item->precioVenta;
                        $subtotal = $subtotal + ($item->cantiVenta * $item->precioVenta);
                        ?> 
                      </td>
                  </tr>             
                <?php $i++;} ?>
                  </tbody>
                  <tfoot>
                    <tr>
                        <th colspan="2">TOTAL</th>
                        <th>$<?php echo $subtotal;?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

  </div>
        <!-- /.container-fluid -->