  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Agregar nuevo producto</h1>

    </div>
    <div clas="row">
    <?php if(isset($_SESSION['texto'])){?>
            <div class="alert alert-<?php if($_SESSION['tipo'] == "success"){ echo "success";}else{echo "danger"; }?> alert-dismissible fade show" role="alert">
                <strong>Ooops! Ah Ocurrido un error :C </strong> <?php echo $_SESSION['texto'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <?php unset($_SESSION["texto"]); unset($_SESSION["tipo"]); ?>
                </button>
            </div>
      <?php } ?>
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Nuevo producto</h6>
                </div>
                <div class="card-body">
                    <form action="?view=Productos&action=CrearProducto" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <h5 class="card-header">Detalles del producto</h5>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <label for="cantidad">Nombre del producto</label>
                                            <input type="text" name="NombreProducto" class="form-control" required id="exampleFirstName" placeholder="Nombre del Producto">
                                        </div>

                                    </div>
                                    <!-- Cantidad, precio Compra, precio Venta -->
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="number" name="cantidad" id="" min="0"  class="form-control" placeholder="Cantidad">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="pcompra">P. Compra</label>
                                            <input type="number" step="any" min="0" name="precioCompra" class="form-control" required id="exampleFirstName" placeholder="$ Compra">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="precioVenta">P. Venta</label>
                                            <input type="number" step="any" min="0"  name="precioVenta" class="form-control" required id="exampleFirstName" placeholder="$ Venta">
                                        </div>
                                    </div>
                                    <!-- Categoria del producto y marca del producto -->
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="categoria">Categoria</label>
                                            <select name="id_categoria" id="" class="form-control" required>
                                                <option value="0">Seleccione categoria</option>
                                                <?php
                                                foreach($this->modelCategorias->ListarCategorias() as $item){
                                                ?>
                                                <option value="<?php echo $item->id_categoria; ?>"><?php echo $item->categoria; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="categoria">Marca</label>
                                            <select name="id_marca_producto" id="" class="form-control" required>
                                                <option value="0">Seleccione marca</option>
                                                <?php
                                                foreach($this->modelMarcas->ListarMarcas() as $item){
                                                ?>
                                                <option value="<?php echo $item->id?>"><?php echo $item->nombre_marca?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Detalle del producto -->
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="detalles">Descripción</label>
                                            <textarea name="detalles" id="summernote" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="card">
                                <h5 class="card-header">Imagenes del Producto</h5>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="imagen">Portada del producto</label>
                                            <div class="custom-file">
                                            <input type="file" class="custom-file-input" multiple name="imagen[]" id="imagen" lang="es"  accept="image/x-png,image/gif,image/jpeg" >
                                                <label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
                                            </div>
                                            <small id="fileHelp" class="form-text text-muted">Puede subir varias imagenes del producto</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row d-flex justify-content-center mt-4">
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
