<!--  Add New Address Modal  --------->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog item-modal">
        <div class="modal-content item-modal">
            <div class="modal-header" style="border-bottom:solid 1px #e5e5e5; background-color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title-site text-center" id="modal-title" style="margin-bottom:0px;" >ตะกร้าสินค้า</h4>
            </div>
            <div class="modal-body" style="padding-top:0px; min-height:100px;">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="cart-table">
									<?php $no = 1; ?>
									<?php $totalQty = 0; ?>
									<?php $totalAmount = 0; ?>
									<?php if(!empty($cart)) : ?>
									<table class="table cart-table" style="margin-bottom:0px;">
										<tbody>
											<?php foreach($cart as $cs) : ?>
											<tr id="cart-row-<?php echo $no; ?>">
												<td class="fix-width-80 text-center">
													<img src="<?php echo $cs->image_path; ?>" width="60"/>
												</td>
												<td class="min-width-100" style="padding:8px 0px 0px 0px;">
													<span class="display-block font-size-10"><?php echo $cs->ItemCode; ?></span>
													<span class="display-block font-size-10"><?php echo $cs->ItemName; ?></span>
													<div class="width-100">
														<div class="col-xs-6 blue blod font-size-18" style="height:34px; padding-top:10px; padding-left: 0;">
															<?php echo number($cs->SellPrice, 2); ?>
														</div>
														<div class="col-xs-6">
															<div class="ace-spinner middle touch-spinner">
																<div class="input-group">
																	<div class="spinbox-buttons input-group-btn">
																		<button type="button" class="btn spinbox-down btn-minier btn-white btn-info"
																		style="width:25px; height:25px; line-height: 1; border-radius:50%; text-align:center;" onclick="qtyDown(<?php echo $no; ?>)">
																		<i class="icon-only  ace-icon ace-icon fa fa-minus"></i>
																	</button>
																	</div>
																	<input type="text" class="input-minier spinbox-input form-control text-center no-border cart-qty"
																	style="font-size:20px;" id="cart-qty-<?php echo $no; ?>"
																	data-no="<?php echo $no; ?>" data-id="<?php echo $cs->id; ?>"
																	value="<?php echo $cs->Qty; ?>" readonly>
																	<div class="spinbox-buttons input-group-btn">
																	<button type="button" class="btn spinbox-up btn-minier btn-lg btn-white btn-info"
																	style="width:25px; height:25px; line-height: 1; border-radius:50%; text-align:center;" onclick="qtyUp(<?php echo $no; ?>)">
																	<i class="icon-only  ace-icon ace-icon fa fa-plus"></i>
																	</button>
																</div>
															</div>
														</div>
													</div>
													</div>
													<input type="hidden" id="sellPrice-<?php echo $no; ?>" value="<?php echo $cs->SellPrice; ?>"/>
													<input type="hidden" id="amount-<?php echo $no; ?>" value="<?php echo $cs->LineTotal; ?>"/>
												</td>
												<td class="fix-width-20 text-right" style="vertical-align:text-top; font-size:18px; ">
													<a href="javascript:void(0)" style="color:#d15b47;" onclick="removeRow(<?php echo $no; ?>)">
														<i class="fa fa-trash"></i>
													</a>
												</td>
											</tr>

											<?php $no++; ?>
											<?php $totalQty += $cs->Qty; ?>
											<?php $totalAmount += $cs->LineTotal; ?>
										<?php endforeach; ?>
										</tbody>
									</table>
								<?php endif; ?>
                </div>
              </div>
            </div>
            <div class="modal-footer item-footer">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 font-size-18 blue text-left">จำนวนรวม</div>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-7 font-size-18 blue text-right" id="total-qty"><?php echo number($totalQty); ?></div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 font-size-18 blue text-left">มูลค่ารวม</div>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-7 font-size-18 blue text-right" id="total-amount"><?php echo number($totalAmount, 2); ?></div>
							<div class="divider-hidden"></div>
							<div class="divider-hidden"></div>
							<div class="col-lg-lg-6 col-md-6 col-sm-6 col-xs-4 padding-5">
								<button type="button" class="btn btn-sm btn-warning btn-block" data-dismiss="modal" aria-hidden="true"><i class="fa fa-arrow-left"></i></button>
							</div>
							<div class="col-lg-lg-6 col-md-6 col-sm-6 col-xs-8 padding-5">
								<button type="button" class="btn btn-sm btn-success btn-block" id="btn-checkout" onclick="checkout()">Check out</button>
							</div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog item-modal">
				<button type="button" class="btn btn-white btn-info item-close" data-dismiss="modal" aria-hidden="true">
					<i class="fa fa-times"></i>
				</button>
        <div class="modal-content item-modal">
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="item" style="padding:0px;">
									<div class="width-100 display-block" id="img">
										<img src="<?php echo get_image_path(1, 'large'); ?>" class="width-100"/>
									</div>
									<div class="font-size-14 bold" style="padding:3px 15px;" id="item-name"></div>
									<div class="font-size-14 bold" style="padding:3px 15px;" id="item-code"></div>
									<div class="item-price bold" style="padding:3px 15px;" id="item-price"></div>
                </div>
              </div>
            </div>
            <div class="modal-footer width-100 text-center item-footer">
							<div class="width-100 text-center">
								<div class="ace-spinner middle touch-spinner" style="width:200px;">
									<div class="input-group">
										<div class="spinbox-buttons input-group-btn">
											<button type="button" class="btn spinbox-down btn-white btn-info"
											style="width:50px; height:50px; padding:3px 10px; border-radius:50%; text-align:center;" onclick="spinDown()">
											<i class="icon-only  ace-icon ace-icon fa fa-minus"></i>
										</button>
									</div>
									<input type="text" class="input-lg spinbox-input form-control text-center no-border" id="item-qty" value="1" style="font-size:24px;">
									<div class="spinbox-buttons input-group-btn">
										<button type="button" class="btn spinbox-up btn-lg btn-white btn-info"
										style="width:50px; height:50px; padding:3px 10px; border-radius:50%; text-align:center;" onclick="spinUp()">
											<i class="icon-only  ace-icon ace-icon fa fa-plus"></i>
										</button>
									</div>
								</div>
							</div>
							</div>
							<div class="divider-hidden"></div>
							<div class="divider-hidden"></div>
							<button type="button" class="btn btn-lg btn-success btn-block" id="btn-add-to-cart" onclick="addTocart()">Add to cart <span id="btn-price">1000.00 บาท</span></button>
            </div>
        </div>
    </div>
</div>


<script id="cart-template" type="text/x-handlebarsTemplate">
<table class="table cart-table" style="margin-bottom:0px;">
	<tbody>
	{{#each this}}
	<tr id="cart-row-{{no}}">
		<td class="fix-width-80 text-center">
			<img src="{{image_path}}" width="60"/>
		</td>
		<td class="min-width-100" style="padding:8px 0px 0px 0px;">
			<span class="display-block font-size-10">{{ItemCode}}</span>
			<span class="display-block font-size-10">{{ItemName}}</span>
			<div class="width-100">
				<div class="col-xs-6 blue blod font-size-18" style="height:34px; padding-top:10px; padding-left: 0;">
					{{priceLabel}}
				</div>
				<div class="col-xs-6">
					<div class="ace-spinner middle touch-spinner">
						<div class="input-group">
							<div class="spinbox-buttons input-group-btn">
								<button type="button" class="btn spinbox-down btn-minier btn-white btn-info"
								style="width:25px; height:25px; line-height: 1; border-radius:50%; text-align:center;" onclick="qtyDown({{no}})">
								<i class="icon-only  ace-icon ace-icon fa fa-minus"></i>
							</button>
							</div>
							<input type="text" class="input-minier spinbox-input form-control text-center no-border cart-qty"
							style="font-size:20px;" id="cart-qty-{{no}}"
							data-no="{{no}}" data-id="{{id}}"
							value="{{Qty}}" readonly>
							<div class="spinbox-buttons input-group-btn">
							<button type="button" class="btn spinbox-up btn-minier btn-lg btn-white btn-info"
							style="width:25px; height:25px; line-height: 1; border-radius:50%; text-align:center;" onclick="qtyUp({{no}})">
							<i class="icon-only  ace-icon ace-icon fa fa-plus"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
			</div>
			<input type="hidden" id="sellPrice-{{no}}" value="{{SellPrice}}"/>
			<input type="hidden" id="amount-{{no}}" value="{{LineTotal}}"/>
		</td>
		<td class="fix-width-20 text-right" style="vertical-align:text-top; font-size:18px; ">
			<a href="javascript:void(0)" style="color:#d15b47;" onclick="removeRow({{no}})">
				<i class="fa fa-trash"></i>
			</a>
		</td>
	</tr>
	{{/each}}
	</tbody>
	</table>
</script>
