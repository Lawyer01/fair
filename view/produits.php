<?php
include_once("top.php");
include_once("template.php");
foreach($produits as $produit) {
    echo $produit['nom'].' '.$produit['description'].'<br/>';

}
?>

<div class="row">
  <div class="col-md-3 col-sm-6">
    <a href="#" class="card card-product-grid">
      <div class="img-wrap"> <img src="../image/1.jpg"> </div>
      <figcaption class="info-wrap">
        <p class="title text-truncate">Just another long text product name</p>
        <small class="text-muted">Sizes: S, M, XL</small>
        <div class="price mt-2">$179.00</div> <!-- price-wrap.// -->
      </figcaption>
    </a> <!-- card // -->
  </div> <!-- col.// -->
  <div class="col-md-3 col-sm-6">
    <figure class="card card-product-grid">
      <a href="#" class="img-wrap">
        <img src="../image/1.jpg">
      </a>
      <figcaption class="info-wrap">
        <a href="#" class="title">Fjällräven Kånken Backpack Blue Ridge</a>
        <div class="mt-2">
          <var class="price">$84.00</var> <!-- price-wrap.// -->
          <a href="#" class="btn btn-sm btn-outline-primary float-right">Add to cart <i class="fa fa-shopping-cart"></i></a>
        </div> <!-- action-wrap.end -->
      </figcaption>
    </figure> <!-- card // -->
  </div> <!-- col.// -->
  <div class="col-md-3 col-sm-6">
    <a href="#" class="card card-product-grid">
      <div class="img-wrap">
        <img src="../image/1.jpg">
      </div>
      <div class="info-wrap text-center ">
        <p class="title text-truncate">Bose Headphones 700 best for Gaming</p>
        <ul class="rating-stars">
          <li style="width:80%" class="stars-active">
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
          </li>
          <li>
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
          </li>
        </ul>
        <small class="text-muted">34</small>
        <div class="price-wrap mt-2 text-center">
          <span class="price">$399.95</span>
        </div> <!-- price-wrap.// -->
      </div>
    </a> <!-- card // -->
  </div> <!-- col.// -->
  <div class="col-md-3 col-sm-6">
    <figure class="card card-product-grid">
      <a href="#" class="img-wrap">
        <img src="../image/1.jpg">
      </a>
      <figcaption class="info-wrap">
        <a href="#" class="title">Apple Homkit - Ecobee3 Lite Smart Thermostat</a>
        <div class="mt-2">
          <var class="price">$169.95</var>
          <ul class="rating-stars float-right">
            <li style="width:80%" class="stars-active">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </li>
            <li>
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </li>
          </ul>
        </div>
      </figcaption>
    </figure> <!-- card // -->
  </div> <!-- col.// -->
</div> <!-- row.// -->
<?php
include_once("bottom.php");
?>