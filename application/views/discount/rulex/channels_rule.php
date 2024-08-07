<?php
$allChannels = $rule->all_channels == 0 ? 'N' : 'Y';
$id = $rule->id;
//--- กำหนดช่องทางการขาย
//$channels = $this->discount_rule_model->getRuleChannels($id);
$channelsNo = 0; //count($channels);
 ?>

	<div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 top-col">
            <h4 class="title">Conditions according to Sales Channels</h4>
        </div>

        <div class="divider margin-top-5"></div>


				<div class="col-sm-2 col-2-harf">
					<span class="form-control left-label text-right">Channels</span>
				</div>
        <div class="col-sm-2">
					<div class="btn-group width-100">
						<button type="button" class="btn btn-sm width-50" id="btn-all-channels" onclick="toggleChannels('Y')">ทั้งหมด</button>
						<button type="button" class="btn btn-sm width-50" id="btn-select-channels" onclick="toggleChannels('N')">ระบุ</button>
					</div>
        </div>
				<div class="col-sm-3 padding-5">
					<button type="button" class="option btn btn-xs btn-info btn-block padding-right-5" id="btn-show-channels" onclick="showSelectChannels()" >
						Channels <span class="badge pull-right" id="badge-channels"><?php echo $channelsNo; ?></span>
					</button>
				</div>
        <div class="divider-hidden"></div>
				<div class="col-sm-2 col-2-harf">&nbsp;</div>
				<div class="col-sm-3">
					<button type="button" class="btn btn-sm btn-success btn-block" onclick="saveChannels()"><i class="fa fa-save"></i> บันทึก</button>
				</div>


    </div>

		<input type="hidden" id="all_channels" value="<?php echo $allChannels; ?>" />

<?php $this->load->view('discount/rule/channels_rule_modal'); ?>
