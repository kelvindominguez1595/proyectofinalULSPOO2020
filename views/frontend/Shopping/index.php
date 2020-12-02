	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="./">Home</a>
						<i>|</i>
					</li>
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
    <!-- //page -->
    	<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>heckout
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">

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
				<h4 class="mb-sm-4 mb-3">Su carrito de compras contiene:
                    <span><?php 
                    if(isset($_SESSION['carrito'])){
                        echo count($_SESSION['carrito']);
                    }
                    ?> Productos</span>
                </h4>
				<form action="?view=Productos&action=Pagar" method="POST">
				<div class="table-responsive">
					<?php  if(!empty($_SESSION['carrito'])) { ?>
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>#</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Nombre Producto</th>
								<th>Precio</th>
								<th>Quitar</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                                $i = 1;
                                $total = 0;
                                $subtotal = 0;
                            foreach($_SESSION['carrito'] as $item){               
                            ?>
							<tr class="rem1">
								<td class="invert"><?php echo $i; ?></td>
								<td class="invert-image">
									<a href="?view=Productos&action=Details&id=<?php echo $item['ID'];?>">
										<img src="assets/img/<?php echo $item["img_product"]; ?>" alt=" " width="50px" class="img img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">								
											<a href="?view=Venta&action=shopping_cart&producto_id=<?php echo $item["ID"]; ?>&btnAction=Restar" class="entry value-minus active">&nbsp;</a>	
											<div class="entry value">
												<span><?php echo $item["cantidad"];?></span>
												<input type="hidden" name="cantidad[]" value="<?php echo $item["cantidad"];?>">
												<input type="hidden" name="producto_id[]" value="<?php echo $item["ID"];?>">
											</div>			
											<a href="?view=Venta&action=shopping_cart&producto_id=<?php echo $item["ID"]; ?>&btnAction=plus" class="entry value-plus active">&nbsp;</a>								
								
										</div>
									</div>
								</td>
								<td class="invert"><?php echo $item["producto"]; ?></td>
                                <td class="invert">$ 
                                    <?php
                                    $subtotal = ($item['precio'] * $item['cantidad']);
                                    echo number_format($subtotal, 2);
                                     ?>
                                </td>
								<td class="invert">
									<div class="rem">
                                        <form action="?view=Venta&action=shopping_cart" method="post">
                                            <input type="hidden" name="producto_id" id="producto_id" value="<?php echo $item["ID"]; ?>">
                                            <input type="hidden" name="vista" value="Home&action=Shopping" />
                                            <input type="hidden" name="btnAction" value="Remove" />
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> </button>
                                        </form>
										<!-- <div class="close1"> </div> -->
									</div>
								</td>
                            </tr>
                            <?php
                                $i++;
                                # Para saber el total final de la compra     
                                $total = $total + $subtotal;
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right"><h3>Total</h3></td>
                                <td>
                                    $ <?php echo number_format($total, 2); ?>
									<input type="hidden" name="totalVenta" value="<?php echo number_format($total, 2); ?>">
                                </td>
                            </tr>
                        </tfoot>
				</table>
					<?php
							if(isset($_SESSION['state'])){
						?>
					<div class="checkout-right-basket">
						<button class="btn btn-primary" type="submit">
							Realizar pago <span class="far fa-hand-point-right"></span>
						</button>
					</div>
					</form>
					<?php }else{ ?>
						<div class="checkout-right-basket">
							<h5>Debe iniciar sesión para realizar el pago</h5>
								<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white"><i class="fas fa-sign-in-alt mr-2"></i> Iniciar Sesión </a>
								<a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white"><i class="fas fa-sign-out-alt mr-2"></i>Register </a>
					</div>
					<?php } ?>
		
                    <?php }else{ ?>
                        <div class="alert alert-success" role="alert">
                                No hay Productos! 😳
                        </div>
                    <?php } ?>
				</div>
			</div>
			<!-- <div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Add a new Details</h4>
					<form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="name" placeholder="Full Name" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Mobile Number" name="number" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Landmark" name="landmark" required="">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Town/City" name="city" required="">
									</div>
									<div class="controls form-group">
										<select class="option-w3ls">
											<option>Select Address type</option>
											<option>Office</option>
											<option>Home</option>
											<option>Commercial</option>

										</select>
									</div>
								</div>
								<button class="submit check_out btn">Delivery to this Address</button>
							</div>
						</div>
					</form>

				</div>
			</div> -->
		</div>
	</div>
	<!-- //checkout page -->

	<!-- middle section -->
	<div class="join-w3l1 py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-6">
					<div class="join-agile text-left p-4">
						<div class="row">
							<div class="col-sm-7 offer-name">
								<h6>Smooth, Rich & Loud Audio</h6>
								<h4 class="mt-2 mb-3">Branded Headphones</h4>
								<p>Sale up to 25% off all in store</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/off1.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<div class="join-agile text-left p-4">
						<div class="row ">
							<div class="col-sm-7 offer-name">
								<h6>A Bigger Phone</h6>
								<h4 class="mt-2 mb-3">Smart Phones 5</h4>
								<p>Free shipping order over $100</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/off2.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- middle section -->