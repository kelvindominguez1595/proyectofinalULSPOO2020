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
					<li>Pagar</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- payment page-->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>P</span>agar venta</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<!--Horizontal Tab-->
				<div class="jumbotron text-center">
				<h1 class="display-4">¡Paso Final !</h1>
				<hr class="my-4">
				<p class="lead">Esta a punto de pagar con paypal la cantidad de: <h4>$<?php echo $totalVenta; ?></h4> </p>
				<p class="lead">
					<div id="paypal-button"></div>
				</p>
				</div>
				<!--Plug-in Initialisation-->
			</div>
		</div>
	</div>
	<!-- //payment page -->

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

	

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AfCWJAwzF_iLlf4nebbVhZAZIT4LFSIfA5oi9DdkK-cqi8SacPp71ZOGPFnWOXbKF4KysZpqobLA0U1F',
      production: 'AeuCPo427BUAfKK2ep8FkFtwuyp2K3-1IyLi0moHDhlmq5LLMpKOgZjzePyCfhWWNO5ByCsAtASQH24M'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'responsive',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '<?php echo $totalVenta; ?>',
            currency: 'USD'
          },
		  description: 'Productos Tienda Jerusalen: $<?php echo $totalVenta; ?>',
		  custom: '<?php echo $ventas; ?>'
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
       // window.alert('Thank you for your purchase!');
		console.log(data);
		window.location = "?view=Productos&action=ValidarPago&id_venta=<?php echo $ventas; ?>&orderID="+data.orderID+"&payerID="+data.payerID+"&paymentID="+data.paymentID+"&paymentToken="+data.paymentToken;
      });
    }
  }, '#paypal-button');

</script>