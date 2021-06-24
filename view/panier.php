<?php
include_once("top.php");
include_once("template.php");
?>
<div class="card">
	<article class="card-body">
		<header class="mb-4">
			<h4 class="card-title">Review cart</h4>
		</header>
			<div class="row">
				<div class="col-md-6">
					<figure class="itemside  mb-3">
						<div class="aside"><img src="../image/1.jpg" class="border img-xs"></div>
						<figcaption class="info">
							<p>Name of the product goes here or title </p>
							<span>2x $290 = Total: $430 </span>
						</figcaption>
					</figure>
				</div> <!-- col.// -->
				<div class="col-md-6">
					<figure class="itemside  mb-3">
						<div class="aside"><img src="../image/1.jpg" class="border img-xs"></div>
						<figcaption class="info">
							<p>Name of the product goes here or title </p>
							<span>2x $290 = Total: $430 </span>
						</figcaption>
					</figure>
				</div> <!-- col.// -->
				<div class="col-md-6">
					<figure class="itemside mb-3">
						<div class="aside"><img src="../image/1.jpg" class="border img-xs"></div>
						<figcaption class="info">
							<p>Name of the product goes here or title </p>
							<span>1x $290 = Total: $290 </span>
						</figcaption>
					</figure>
				</div> <!-- col.// -->
				<div class="col-md-6">
					<figure class="itemside  mb-3">
						<div class="aside"><img src="../image/1.jpg" class="border img-xs"></div>
						<figcaption class="info">
							<p>Name of the product goes here or title </p>
							<span>4x $290 = Total: $430 </span>
						</figcaption>
					</figure>
				</div> <!-- col.// -->
			</div> <!-- row.// -->
	</article> <!-- card-body.// -->
	<article class="card-body border-top">

		<dl class="row">
		  <dt class="col-sm-10">Subtotal: <span class="float-right text-muted">2 items</span></dt>
		  <dd class="col-sm-2 text-right"><strong>$1,568</strong></dd>

		  <dt class="col-sm-10">Discount: <span class="float-right text-muted">10% offer</span></dt>
		  <dd class="col-sm-2 text-danger text-right"><strong>$29</strong></dd>

		  <dt class="col-sm-10">Delivery charge: <span class="float-right text-muted">Express delivery</span></dt>
		  <dd class="col-sm-2 text-right"><strong>$120</strong></dd>

		  <dt class="col-sm-10">Tax: <span class="float-right text-muted">5%</span></dt>
		  <dd class="col-sm-2 text-right text-success"><strong>$7</strong></dd>

		  <dt class="col-sm-10">Total:</dt>
		  <dd class="col-sm-2 text-right"><strong class="h5 text-dark">$1,650</strong></dd>
		</dl>

	</article> <!-- card-body.// -->
</div>
<?php
include_once("bottom.php");
?>