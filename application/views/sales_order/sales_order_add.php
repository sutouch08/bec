<?php $this->load->view('include/header'); ?>
<script src="<?php echo base_url(); ?>assets/js/jquery.autosize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/sortable.min.js"></script>
<?php $this->load->view('sales_order/style'); ?>
<div class="row">
  <div class="col-sm-6 col-xs-6 padding-5">
    <h3 class="title">
      <?php echo $this->title; ?>
    </h3>
  </div>
  <div class="col-sm-6 col-xs-6 padding-5">
    <p class="pull-right top-p">
      <button type="button" class="btn btn-sm btn-default" onclick="leave()"><i class="fa fa-arrow-left"></i> &nbsp; Back</button>
    </p>
  </div>
</div><!-- End Row -->
<hr class="padding-5" />
<form id="addForm" method="post" action="<?php echo $this->home; ?>/add">
  <?php $this->load->view('sales_order/sales_order_add_header'); ?>
  <?php $this->load->view('sales_order/sales_order_add_detail'); ?>
  <?php $this->load->view('sales_order/sales_order_add_footer'); ?>

  <input type="hidden" id="sale_id" value="<?php echo $this->_user->sale_id; ?>" />
  <input type="hidden" id="sale_team" value="<?php echo $this->_user->team_id; ?>" />
  <input type="hidden" id="vat_rate" value="<?php echo getConfig('SALE_VAT_RATE'); //--- default sale vat rate 
                                            ?>" />
  <input type="hidden" id="vat_code" value="<?php echo getConfig('SALE_VAT_CODE'); //--- default sale vat code
                                            ?>" />
  <input type="hidden" id="priceList" value="1" />
  <input type="hidden" id="is_draft" value="0">
  <input type="hidden" id="creditLimit" value="<?php echo getConfig('CREDIT_LIMIT') == 1 ? 1 : 0; ?>" />
</form>

<?php $this->load->view('sales_order/sales_order_ship_to_modal'); ?>
<?php $this->load->view('sales_order/sales_order_bill_to_modal'); ?>


<script id="ship-to-template" type="text/x-handlebarsTemplate">
  {{#each this}}
    <option value="{{code}}">{{code}} : {{name}}</option>
  {{/each}}
</script>

<script id="bill-to-template" type="text/x-handlebarsTemplate">
  {{#each this}}
    <option value="{{code}}">{{code}} : {{name}}</option>
  {{/each}}
</script>


<div class="modal fade" id="free-item-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:900px; max-width:90vw;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center" id="free-item-modal-label">เลือก n ชิ้น จากรายการต่อไปนี้</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5" style="max-height:400px; overflow:auto;">
            <table class="table table-striped table-bordered table-narrow border-1" style="min-width:500px;">
              <thead>
                <tr>
                  <th class="fix-width-100">Code</th>
                  <th class="min-width-250">Description</th>
                  <th class="fix-width-80 text-right">Std. Price</th>
                  <th class="fix-width-80 text-right">Sell Price</th>
                  <th class="fix-width-100">Qty</th>
                  <th class="fix-width-50 text-center"></th>
                </tr>
              </thead>
              <tbody id="free-item-table">

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white btn-default btn-100" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-white btn-primary btn-100" onclick="addFreeRows()"><i class="fa fa-plus"></i> Add </button> -->
      </div>
    </div>
  </div>
</div>

<script id="free-item-template" type="text/x-handlebars-template">
  {{#each this}}
    {{#if nodata}}
      <tr>
        <td colspan="5" class="text-center">--- No Free Item ---</td>
      </tr>
    {{else}}
      <tr>
        <td>{{code}}</td>
        <td>{{name}}</td>
        <td class="text-right">{{stdPriceLabel}}</td>
        <td class="text-right">{{sellPriceLabel}}</td>
        <td class="text-right">
          <input type="number" class="form-control input-xs text-center"
            id="input-{{uuid}}"
            data-item="{{id}}"
            data-uid="{{uid}}"
            data-parent="{{uid}}"
            data-pdcode="{{code}}"
            data-pdname="{{name}}"
            data-stdprice="{{std_price}}"
            data-price="{{price}}"
            data-sellprice="{{sell_price}}"
            data-stdpricelabel="{{stdPriceLabel}}"
            data-pricelabel="{{priceLabel}}"
            data-sellpricelabel="{{sellPriceLabel}}"
            data-discpercent="{{discPercent}}"
            data-discamount="{{discAmount}}"
            data-uom="{{uom}}"
            data-uomcode="{{uom_code}}"
            data-rule="{{rule_id}}"
            data-policy="{{id_policy}}"
            data-vatcode="{{vat_group}}"
            data-vatrate="{{vat_rate}}"
            data-qty="{{qty}}"
            data-img="{{img}}"
            value="1" />
        </td>
        <td class="middle">
          <button class='btn btn-info btn-minier btn-block' id='btn-{{uuid}}' onclick="addFreeRow('{{uuid}}')">Add</button>
        </td>
      </tr>
    {{/if}}
  {{/each}}
</script>


<script>
  $('#projects').select2();
</script>
<script src="<?php echo base_url(); ?>scripts/sales_order/sales_order.js?v=<?php echo date('YmdH'); ?>"></script>
<script src="<?php echo base_url(); ?>scripts/sales_order/sales_order_add.js?v=<?php echo date('YmdHm'); ?>"></script>
<script src="<?php echo base_url(); ?>scripts/address.js"></script>




<?php $this->load->view('include/footer'); ?>