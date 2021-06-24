<?php
include_once("top.php");
include_once("template.php");
?>
<div class="container">
  <div class="card">
<div class="card-header">
Invoice
<strong>01/01/2018</strong> 
  <span class="float-right"> <strong>Status:</strong> Finalisée</span>

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-6">
<h6 class="mb-3">From:</h6>
<div>
<strong>FaireRepack</strong>
</div>
<div>Adresse 1</div>
<div>Adresse 2</div>
<div>Email: contact@fairerepack.com</div>
<div>Phone: +48 444 666 3333</div>
</div>

<div class="col-sm-6">
<h6 class="mb-3">To:</h6>
<div>
<strong>User name</strong>
</div>
<div>Adresse 1</div>
<div>Adresse 2</div>
<div>Email: user@user.com</div>
<div>Pays</div>
</div>



</div>

<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Article</th>
<th>Description</th>

<th class="right">Unit Cost</th>
  <th class="center">Qty</th>
<th class="right">Total</th>
</tr>
</thead>
<tbody>
<tr>
<td class="center">1</td>
<td class="left strong">iphone 5</td>
<td class="left">Extended License</td>

<td class="right">$999,00</td>
  <td class="center">1</td>
<td class="right">$999,00</td>
</tr>
<tr>
<td class="center">2</td>
<td class="left">iphone 6</td>
<td class="left">Instalation and Customization (cost per hour)</td>

<td class="right">$150,00</td>
  <td class="center">20</td>
<td class="right">$3.000,00</td>
</tr>
<tr>
<td class="center">3</td>
<td class="left">iphone 7</td>
<td class="left">1 year subcription</td>

<td class="right">$499,00</td>
  <td class="center">1</td>
<td class="right">$499,00</td>
</tr>
<tr>
<td class="center">4</td>
<td class="left">iphone 8</td>
<td class="left">1 year subcription 24/7</td>

<td class="right">$3.999,00</td>
  <td class="center">1</td>
<td class="right">$3.999,00</td>
</tr>
</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>
<tr>
<td class="left">
<strong>Subtotal</strong>
</td>
<td class="right">$8.497,00</td>
</tr>
<tr>
<td class="left">
<strong>Discount (20%)</strong>
</td>
<td class="right">$1,699,40</td>
</tr>
<tr>
<td class="left">
 <strong>VAT (10%)</strong>
</td>
<td class="right">$679,76</td>
</tr>
<tr>
<td class="left">
<strong>Total</strong>
</td>
<td class="right">
<strong>$7.477,36</strong>
</td>
</tr>
</tbody>
</table>

</div>

</div>

</div>
</div>
</div>
<?php
include_once("bottom.php");
?>