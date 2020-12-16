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
    <img src="https://<?php echo $_SERVER['HTTP_HOST'];?>/assets/img/logo.jpg" width="90px">
    <div class="titulo">
        <h1>Reporte de Ventas</h1>
    </div>
    <!-- HTML Code: Place this code in the document's body (between the <body> tags) where the table should appear -->
<table class="customTable">
  <thead>
    <tr>
      <th>Transacción</th>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>SubTotal</th>
    </tr>
  </thead>
  <tbody>
  <?php  
  $total = 0;
  foreach($this->model->reportedeVenta() as $item){ ?>
    <tr>
      <td>Transacción #<?php echo  $item->idventa;?></td>
      <td><?php echo  $item->NombreProducto;?></td>
      <td><?php echo  $item->cantiVenta;?></td>
      <td>$<?php echo  number_format(($item->cantiVenta * $item->precioVenta), 2) ;?></td>
    </tr>
    <?php 
     $total = $total + ($item->cantiVenta * $item->precioVenta);
    } ?>
  </tbody>
  <tbody>
      <tr>
          <td colspan="3">TOTAL</td>
          <td> <b>$ <?php echo number_format($total, 2); ?></b> </td>
      </tr>
  </tbody>
</table>
<!-- Generated at CSSPortal.com -->
</body>
</html>