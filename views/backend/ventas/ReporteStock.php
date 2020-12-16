<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de venta</title>
    <!-- CSS Code: Place this code in the document's head (between the <head> -- </head> tags) -->
<style>
table.customTable {
  width: 100%;
  background-color: #FFFFFF;
  border-collapse: collapse;
  border-width: 2px;
  border-color: #7ea8f8;
  border-style: solid;
  color: #000000;
}

table.customTable td, table.customTable th {
  border-width: 2px;
  border-color: #7ea8f8;
  border-style: solid;
  padding: 5px;
}

table.customTable thead {
  background-color: #7ea8f8;
}
.titulo{
    position: absolute;
    top: 1%;
    left: 25%;
}
</style>
</head>
<body>
    <img src="http://localhost/proyectofinalULSPOO2020//assets/img/logo.jpg" width="90px">
    <div class="titulo">
        <h1>Reporte de Productos</h1>
    </div>
    <!-- HTML Code: Place this code in the document's body (between the <body> tags) where the table should appear -->
<table class="customTable">
  <thead>
    <tr>
        <th>Productos</th>
        <th>Cantidad</th>
        <th>P. Compra</th>
        <th>P. Venta</th>
        <th>Categoria</th>
        <th>Marca</th>
        <th>Imagen</th>
        <th>Fecha Compra</th>
    </tr>
  </thead>
  <tbody>
  <?php  
  $total = 0;
  foreach($this->modelPro->ListarProductos() as $item){ ?>
    <tr>
        <td><?php echo $item->NombreProducto; ?></td>
        <td><?php echo $item->cantidad; ?></td>
        <td>$ <?php echo number_format($item->precioVenta, 2); ?></td>
        <td>$ <?php echo number_format($item->precioCompra, 2); ?></td>
        <td><?php echo $item->categoria; ?></td>
        <td><?php echo $item->nombre_marca; ?></td>
        <td>
        <img src="http://localhost/proyectofinalULSPOO2020/assets/img/<?php echo $item->imagen; ?>" width="70px" class="img-fluid" alt="">
        </td>
        <td><?php echo date('d-m-Y', strtotime($item->fechaCompra)); ?></td>
    </tr>
    <?php 

    } ?>
  </tbody>

</table>
<!-- Generated at CSSPortal.com -->
</body>
</html>