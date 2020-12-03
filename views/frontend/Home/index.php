	<!-- banner -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item item1 active">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Consigue un
								<span>10%</span> de Cashback</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Gran
								<span>Venta</span>
								Navideña
							</h3>
							<a class="button2" href="product.html">Aprovecha Ya </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item2">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Headsets
								<span>Inalambricos</span> Gamer</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Lo mejor de
								<span>Razer</span>
							</h3>
							<a class="button2" href="product.html">Aprovecha Ya </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item3">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Que esperas
								<span>Aprovecha</span> Las</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Ofertas de
								<span>Fin de Año</span>
							</h3>
							<a class="button2" href="product.html">Aprovecha Ya </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item4">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Consigue hasta un
								<span>40%</span> De descuento</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Ahora al
								<span>COmprar online</span>
							</h3>
							<a class="button2" href="product.html">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>N</span>uestros
				<span>N</span>uevos
				<span>P</span>roductos</h3>
				
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
                            <h3 class="heading-tittle text-center font-italic">Ultimos Productos</h3>                            
							<div class="row">  								
								<?php
                                    foreach($this->model->latestProducts() as $item){
                                ?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="assets/img/<?php echo $item->imagen; ?>" alt="" width="200px">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?view=Productos&action=Details&id=<?php echo $item->id_producto;?>" class="link-product-add-cart">Ver Detalle</a>
												</div>
											</div>
											<span class="product-new-top">New</span>

										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="?view=Productos&action=Details&id=<?php echo $item->id_producto;?>">
                                                    <?php echo $item->NombreProducto; ?>
												</a>
											</h4>
											<br>
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
                                <?php } ?>                                
							</div>
						</div>
						<!-- //first section -->
						<!-- second section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic">Últimas Marcas</h3>
							<div class="row">
								<?php
								foreach($this->model->latestProductsMarcas() as $item){									
								?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="assets/img/<?php echo $item->imagen; ?>" alt="" width="200px">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?view=Productos&action=Details&id=<?php echo $item->id_producto;?>" class="link-product-add-cart">Ver Detalle</a>
												</div>
											</div>
											<span class="product-new-top"><?php echo $item->nombre_marca; ?></span>

										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="?view=Productos&action=Details&id=<?php echo $item->id_producto;?>">
                                                    <?php echo $item->NombreProducto; ?>
												</a>
											</h4>
											<br>
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
								<?php } ?>
			
							</div>
						</div>
						<!-- //second section -->	
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
						<!-- price -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Precios</h3>
							<div class="w3l-range">
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
								<!-- <ul>
									<li>
										<a href="#">El</a>
									</li>
									<li class="my-1">
										<a href="#">$1,000 - $5,000</a>
									</li>
									<li>
										<a href="#">$5,000 - $10,000</a>
									</li>
									<li class="my-1">
										<a href="#">$10,000 - $20,000</a>
									</li>
									<li>
										<a href="#">$20,000 $30,000</a>
									</li>
									<li class="mt-1">
										<a href="#">Over $30,000</a>
									</li>
								</ul> -->
							</div>
						</div>
						<!-- //price -->
						<!-- Categorias -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Categorias</h3>
							<ul>
								<?php
								foreach ($this->modelCategorias->ListarCategorias() as $items) {
								?>
									<li>
										<a href="?view=Productos&action=Categoria&id=<?php echo $items->id_categoria; ?>"><?php echo $items->categoria; ?></a>
									</li>
								<?php
									}
								?>
				
							</ul>
						</div>
						<!-- //Categorias -->
						<!-- best seller -->
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
						<!-- //best seller -->
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