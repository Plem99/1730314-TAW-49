<?php
	/* Se verifica que existe una sesion, en caso de que no sea así, se muestra el login */
	if (!isset($_SESSION['validar'])) {
		header("location:index.php?action=ingresar");
		exit();
	}
	$purchases = new MvcController;
	$datos = $purchases->vistaPurchases();
?>
<div class="container-fluid">
	<section class="content">
		<div class="row">
			<!--BOTONES AGREGAR-->
			<div class="col-lg-7 col-xs-12">
				<div class="card ">
					<div class="card-header"></div>
					<div class="card-body">
						<div class="card-header with-border" id="cart-header">
							<form action="#" method="post">
								<div class="input-group" ng-controller="cartToolBox">
									<span class="input-group-btn"></span>
									<select data-live-search="true" name="customer_id" title="Please choose a customer" class="form-control customers-list dropdown-bootstrap">
										
									</select>
									<span class="input-group-btn">
											
										<button type="button" class="btn btn-default" ng-click="openAddQuickItem()" title="Item">
											<i class="fa fa-plus"></i>
											<span class="hidden-sm hidden-xs">Producto</span>
										</button>
									</span>
								</div>
							</form>
						</div>
						<!--TICKET-->
							<table class="table" id="cart-item-table-header">
								<thead>
									<tr class="active">
										<td width="200" class="text-left">Productos</td>
										<td width="120" class="text-center hidden-xs">Precio Unitario</td>
										<td width="100" class="text-center">Cantidad</td>
										<td width="100" class="text-right">Precio Total</td>
									</tr>
								</thead>
							</table>
							<div class="direct-chat-messages" id="cart-table-body" style="padding:0px;">
								<table class="table" style="margin-bottom:0;">
								<tbody>
									<tr id="cart-table-notice" style="display: none;">
										<td colspan="4">Porfavor, agrega un producto</td>
									</tr>
									<tr cart-item-id="0" cart-item="" data-line-weight="0" data-item-barcode="18720048">
										<td width="200" class="text-left" style="line-height:30px;">
										<p style="width:45px;margin:0px;float:left">
											<a class="btn btn-sm btn-default quick_edit_item" href="javascript:void(0)" style="float:left;vertical-align:inherit;margin-right:10px;">
												<i class="fa fa-edit"></i>
											</a>
										</p>
										<p style="text-transform: uppercase;float:left;width:76%;margin-bottom:0px;" class="item-name">11111111111112</p>
										</td>
										<td width="70" class="text-center item-unit-price hidden-xs" style="line-height:30px;">$ 0,0 </td>
										<td width="100" class="text-center item-control-btns">
											<div class="input-group input-group-sm">
												<span class="input-group-btn item-control-btns-wrapper">
													<button class="btn btn-default item-reduce">-</button>
													<button name="shop_item_quantity" value="1" class="btn btn-default" style="width:50px;">1</button>
													<button class="btn btn-default item-add">+</button>
												</span>
											</div>
										</td>
										<td width="70" class="text-right item-total-price" style="line-height:30px;">$ 0,0</td>
									</tr>
									<tr id="cart-table-notice" style="display: none;">
										<td colspan="4">Porfavor, agrega un producto</td>
									</tr>
									<tr cart-item-id="0" cart-item="" data-line-weight="0" data-item-barcode="18720048">
										<td width="200" class="text-left" style="line-height:30px;">
										<p style="width:45px;margin:0px;float:left">
											<a class="btn btn-sm btn-default quick_edit_item" href="javascript:void(0)" style="float:left;vertical-align:inherit;margin-right:10px;">
												<i class="fa fa-edit"></i>
											</a>
										</p>
										<p style="text-transform: uppercase;float:left;width:76%;margin-bottom:0px;" class="item-name">11111111111111</p>
										</td>
										<td width="70" class="text-center item-unit-price hidden-xs" style="line-height:30px;">$ 0,0 </td>
										<td width="100" class="text-center item-control-btns">
											<div class="input-group input-group-sm">
												<span class="input-group-btn item-control-btns-wrapper">
													<button class="btn btn-default item-reduce">-</button>
													<button name="shop_item_quantity" value="1" class="btn btn-default" style="width:50px;">1</button>
													<button class="btn btn-default item-add">+</button>
												</span>
											</div>
										</td>
										<td width="70" class="text-right item-total-price" style="line-height:30px;">$ 0,0</td>
									</tr>
								</tbody>
								</table>
							</div>
							<table id="cart-details" class="table">
								<tfoot class="hidden-xs hidden-sm hidden-md">
									<tr class="active">
										<td width="200" class="text-left">Número de Productos ( <span class="items-number">1</span> )</td>
										<td width="150" class="text-right hidden-xs"></td>
										<td width="150" class="text-right">Precio sin IVA</td>
										<td width="90" class="text-right">
											<span class="cart-value">$ 0,0</span>
										</td>
									</tr>
									<tr class="active">
										<td></td>
										<td></td>
										<td class="text-right cart-discount-notice-area">Descuento</td>
										<td class="text-right cart-discount-remove-wrapper">
											<span class="cart-discount pull-right">$ 0,0</span>
										</td>
									</tr>
									<tr class="success taxes_large">
										<td>
											<div>
												<button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>IVA Total
												<span class="cart-item-vat pull-right">$ 0,0</span>
											</div>
										</td>
										<td></td>
										<td class="text-right"><strong>Monto a Pagar</strong></td>
										<td class="text-right"><span class="cart-topay pull-right">$ 0,0</span></td>
									</tr>
								</tfoot>
						</table>
					</div>
					<!--BOTONES DE PAGO Y DESCUENTO-->
					<div class="card-footer" id="cart-panel">
						<div class="btn-group btn-group-justified">
							<div class="btn-group ng-scope">
								<button type="button" class="btn btn-default btn-lg" ng-click="openPayBox()">
									<i class="fa fa-money-bill" aria-hidden="true"></i>
									<span class="hidden-xs">Pay</span>
								</button>
							</div>
							<div class="btn-group ng-scope" role="group" ng-controller="saveBox">
							</div>
							<div class="btn-group" role="group">
								<button type="button" id="cart-discount" class="btn btn-default btn-lg" >
									<i class="fa fa-gift"></i> <span class="hidden-xs">Discount</span></button>
							</div>
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default btn-lg" id="cart-return-to-order">
									<i class="fa fa-sync"></i>
									<span class="hidden-xs">Cancel</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--PRODUCTOS-->
			<div class="col-lg-5">
				<div class="card ">
					<div class="card-header with-border"></div>
					<div class="card-body">
							<form action="#" method="post" id="search-item-form">
								<div class="input-group">
									<div class="input-group-btn">
										<button type="submit" class="btn btn-large btn-default"><i class="fa fa-search"></i>
										</button>
										<button type="button" class="enable_barcode_search btn btn-large btn-default"><i class="fa fa-barcode"></i></button>
									</div>
									<input autocomplete="off" type="text" name="item_sku_barcode" placeholder="Barcode, SKU, product name or category ..." class="form-control">
								</div>
							</form>
						</div>
						<div class="card-body">
							<div class="overflow-auto"style="max-height: 500px;">
								<div class="row">
									<?php
									foreach ($datos as $producto) {
										echo '<div class="col-md-4">
												<img onclick="add('.$producto['id_product'].','.$producto['code_producto'].',\''.$producto['name_product'].'\','.$producto['price_product'].','.$producto['stock'].',\''.$producto['id_category'].'\')" src="http://multi-nexopos.tendoo.org/public/modules/nexo/images/default.png" title="'.$producto['name_product'].'"width="150" height="150">
											</div>';
										}
									?>
								</div>
							</div>
				</div>
			</div>
		</div>
	</section>
</div>