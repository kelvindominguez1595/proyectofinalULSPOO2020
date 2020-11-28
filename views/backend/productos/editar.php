  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar producto</h1>
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Editar producto</h6>
                </div>
                <div class="card-body">
                    <form action="?view=Productos&action=ActualizarPro" method="post" class="user" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="hidden" name="id_producto" value="<?php echo $data->id_producto; ?>">
                            <input type="text" name="NombreProducto" value="<?php echo $data->NombreProducto; ?>" class="form-control form-control-user" required id="exampleFirstName" placeholder="Nombre del Producto">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" name="cantidad" id="" min="0"  class="form-control form-control-user" placeholder="Cantidad" value="<?php echo $data->cantidad; ?>" >
                        </div>
                        <div class="col-sm-2">
                            <input type="number" step="any" min="0" name="precioCompra" class="form-control form-control-user" required id="exampleFirstName" placeholder="$ Compra" value="<?php echo $data->precioCompra; ?>" >
                        </div>
                        <div class="col-sm-2">
                            <input type="number" step="any" min="0"  name="precioVenta" class="form-control form-control-user" required id="exampleFirstName" placeholder="$ Venta" value="<?php echo $data->precioVenta; ?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-4">
                            <label for="categoria">Categoria</label>
                            <select name="id_categoria" id="" class="form-control" required>
                                    <option value="0">Seleccione categoria</option>
                                    <?php
                                        foreach($this->modelCategorias->ListarCategorias() as $item){
                                            if($item->id_categoria == $data->id_categoria){
                                           
                                    ?>
                                        <option selected value="<?php echo $item->id_categoria; ?>"><?php echo $item->categoria; ?></option>
                                    <?php  }?>
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
                                        if($item->id == $data->id_marca_producto){
                                           
                                            ?>
                                                <option selected value="<?php echo $item->id; ?>"><?php echo $item->nombre_marca; ?></option>
                                            <?php  }?>
                                    <option value="<?php echo $item->id?>"><?php echo $item->nombre_marca?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Subir imagen</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang" name="imagen"  lang="es">
                                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                            </div>
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
