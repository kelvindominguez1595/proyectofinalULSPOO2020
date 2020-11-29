  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar imagenes de detalle del producto </h1>
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
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
            <div class="row">
        <?php
            foreach ($items as $value) {
        ?>
        <div class="col-md-4">
                    <div class="card">
                        <img src="assets/img/<?php if(empty($value->imagen)) { echo 'no-photo.png'; }else{ echo $value->imagen; } ?>" class="card-img-top border-bottom" alt="...">
                        <div class="card-body">
                            <label>Portada de producto</label>
                            <form  action="?view=Productos&action=editarGalImagen" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="imgdefault" value="<?php echo $value->imagen ?>">
                                <input type="hidden" name="id" value="<?php echo $value->id ?>">
                                <input type="hidden" name="producti" value="<?php echo $value->producto_id ?>">
                                <!-- <div class="custom-file"> -->
                                    <input type="file" class="form-control" id="" name="imagen"  lang="es" accept="image/x-png,image/gif,image/jpeg" >
                                   <!-- // <label class="custom-file-label" for="customFileLang">Subir...</label> -->
                                <!-- </div> -->
                                <div class="form-group row ">
                                    <div class="col-sm-12 mt-4  d-flex justify-content-center">
                                        <input type="submit" class="btn btn-primary" value="Cambiar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php    
                    }
                    ?>
            </div>
        </div>
    </div>
</div>
        <!-- /.container-fluid -->
