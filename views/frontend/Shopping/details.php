	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="./">Home</a>
						<i>|</i>
					</li>
					<li>Detalle de producto</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>D</span>etalle del
				<span>P</span>roducto</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
                                <?php
                                    foreach ($imagesproductData as $value) {
                                ?>
								<li data-thumb="assets/img/<?php echo $value->imagen; ?>">
									<div class="thumb-image">
										<img src="assets/img/<?php echo $value->imagen; ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
                                </li>
                                <?php
                                    }
                                ?>
						
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $producData->NombreProducto; ?></h3>
					<p class="mb-3">
						<span class="item_price">$<?php echo number_format($producData->precioVenta,2); ?></span>
						<del class="mx-2 font-weight-light">$<?php echo number_format($producData->precioCompra,2); ?></del>
						<label>Free delivery</label>
					</p>
					<!-- <div class="single-infoagile">
						<ul>
							<li class="mb-3">
								Cash on Delivery Eligible.
							</li>
							<li class="mb-3">
								Shipping Speed to Delivery.
							</li>
							<li class="mb-3">
								EMIs from $655/month.
							</li>
							<li class="mb-3">
								Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&C
							</li>
						</ul>
					</div> -->
					<div class="product-single-w3l">
						<p class="my-3">
							<i class="far fa-hand-point-right mr-2"></i>
                            <label>1 año</label> de garantía del fabricante</p>
                            <?php echo $producData->detalles; ?>
						<!-- <ul>
							<li class="mb-1">
								3 GB RAM | 16 GB ROM | Expandable Upto 256 GB
							</li>
							<li class="mb-1">
								5.5 inch Full HD Display
							</li>
							<li class="mb-1">
								13MP Rear Camera | 8MP Front Camera
							</li>
							<li class="mb-1">
								3300 mAh Battery
							</li>
							<li class="mb-1">
								Exynos 7870 Octa Core 1.6GHz Processor
							</li>
						</ul> -->
						<p class="my-sm-4 my-3">
							<i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
						</p>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        <form action="?view=Venta&action=shopping_cart" method="post">
													<fieldset>
														<input type="hidden" name="vista" value="Home&action=Home" />
                                                        <input type="hidden" name="btnAction" value="Add" />                                                        
														<input type="hidden" name="stock" value="<?php echo $producData->cantidad; ?>" />
														<input type="hidden" name="producto_id" value="<?php echo $producData->id_producto; ?>" />
														<input type="hidden" name="img_product" value="<?php echo $producData->imagen; ?>" />
														<input type="hidden" name="cantidad" value="1" />
														<input type="hidden" name="item_name" value="<?php echo $producData->NombreProducto; ?>" />
														<input type="hidden" name="amount" value="<?php echo number_format($producData->precioVenta, 2)?>" />
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
		</div>
	</div>
	<!-- //Single Page -->

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