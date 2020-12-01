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
                    <li><?php echo $buscar; ?></li>                   

				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">

			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            Resultado de la Busqueda: <?php echo $buscar; ?>
            </h3> 
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
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">

                        <!-- first section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">

                            <?php
                                if(empty($resultBusqueda)){
                            ?>
                            <div class="d-flex justify-content-center">
                                <div class="col-sm-12">
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>  Ooops! 😱 </strong> 
                                    No se ha encontrado ningún resultado de su busqueda 😟
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                </div>
                            </div>
                          <?php  
                          }else{                 
                            foreach ($resultBusqueda as $item) {
                            ?>
								<div class="col-md-4 product-men">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="assets/img/<?php echo $item->imagen; ?>" alt="" width="200px">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?view=Productos&action=Details&id=<?php echo $item->id_producto;?>" class="link-product-add-cart">Ver Detalle</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="?view=Productos&action=Details&id=<?php echo $item->id_producto;?>"><?php echo $item->NombreProducto; ?></a>
                                            </h4>
                                  
												<?php
													if($item->cantidad <= 5){												
														echo '<span class="font-italic font-weight-light">Existencia: '.$item->cantidad.'</span>';
													}
												?>
											<div class="info-product-price my-2">
												<span class="item_price">$<?php echo number_format($item->precioVenta, 2)?></span>
												<del>$<?php echo number_format($item->precioCompra, 2)?></del>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            <form action="?view=Venta&action=shopping_cart" method="post">
													<fieldset>
														<input type="hidden" name="vista" value="Home&action=Home" />
                                                        <input type="hidden" name="btnAction" value="Add" />                                                        
														<input type="hidden" name="stock" value="<?php echo $item->cantidad; ?>" />
														<input type="hidden" name="producto_id" value="<?php echo $item->id_producto; ?>" />
														<input type="hidden" name="img_product" value="<?php echo $item->imagen; ?>" />
														<input type="hidden" name="cantidad" value="1" />
														<input type="hidden" name="item_name" value="<?php echo $item->NombreProducto; ?>" />
														<input type="hidden" name="amount" value="<?php echo number_format($item->precioVenta, 2)?>" />
														<!-- <input type="hidden" name="discount_amount" value="1.00" /> -->
														<input type="hidden" name="currency_code" value="USD" />
														<!-- <input type="hidden" name="return" value=" " />
														<input type="hidden" name="cancel_return" value=" " /> -->
												    	<input type="submit" name="submit" value="Add to cart" class="button btn" />
													</fieldset>
												</form>
											</div>

										</div>
									</div>
								</div>
                                <?php  } 
                            }?>
							</div>
						</div>
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->
				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
						<h3 class="agileits-sear-head mb-3">Buscar..</h3>
							<form action="?view=Productos&action=Busqueda" method="post">
								<input type="search" placeholder="Product name..." name="buscar" required="">
								<input type="submit" value=" ">
							</form>
						</div>
						<!-- ram -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Precios</h3>
							<form action="?view=Productos&action=Precio" method="post">
									<div id="ionrange_1"></div>
									<input type="hidden" name="inicio" id="inicio">
									<input type="hidden" name="fin" id="fin">
									<div class="form-group row">
										<div class="col-sm-12 text-center">
											<button class="btn btn-primary" type="submit">Aplicar</button>
										</div>
									</div>
								</form>
						</div>
						<!-- //ram -->

						<div class="f-grid py-2">
							<h3 class="agileits-sear-head mb-3">Lo + Vendido</h3>
							<div class="box-scroll">
								<div class="scroll">
									<?php
										foreach($this->modelVentas->MasVendidos() as $item ){
									?>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img src="images/k1.jpg" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
											<a href="?view=Productos&action=Details&id=<?php echo $item->id_producto;?>"><?php echo $item->NombreProducto; ?></a>
											<a href="?view=Productos&action=Details&id=<?php echo $item->id_producto;?>" class="price-mar mt-2"><?php echo number_format($item->precioVenta,2); ?></a>
										</div>
									</div>
									<?php
										}
									?>
								</div>
							</div>
						</div>
					</div>
					<!-- //product right -->
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->

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