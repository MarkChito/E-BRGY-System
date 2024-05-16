<div class="row colorbox-group-widget">
	<div class="col-md-3 col-sm-6 info-color-box">
		<div class="white-box">
			<div class="media bg-primary">
				<div class="media-body">
					<h3 class="info-count" id="total"><?= number_format($population) ?> <span class="pull-right"><i class="icon-people"></i></span></h3>
					<p class="info-text font-18">Population</p>
					<p class="info-ot font-13"><a href="<?= site_url('population') ?>" class="text-white">Total Population</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 info-color-box">
		<div class="white-box">
			<div class="media bg-success">
				<div class="media-body">
					<h3 class="info-count"><?= number_format(count($voters)) ?> <span class="pull-right"><i class="icon-user-following"></i></span></h3>
					<p class="info-text font-18">Voters</p>
					<p class="info-ot font-13"><a href="<?= site_url('resident_info/voters') ?>" class="text-white">Total Voters</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 info-color-box">
		<div class="white-box">
			<div class="media bg-warning">
				<div class="media-body">
					<h3 class="info-count"><?= number_format(count($nonvoters)) ?> <span class="pull-right"><i class="icon-user-unfollow"></i></span></h3>
					<p class="info-text font-18">Non Voters</p>
					<p class="info-ot font-13"><a href="<?= site_url('resident_info/non-voters') ?>" class="text-white">Total Non Voters</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 info-color-box">
		<div class="white-box">
			<div class="media" style="background-color:#6861ce">
				<div class="media-body">
					<h3 class="info-count"><?= number_format(count($pwd)) ?> <span class="pull-right"><i class="fa fa-wheelchair"></i></span></h3>
					<p class="info-text font-18 text-white">PWD</p>
					<p class="info-ot font-13"><a href="<?= site_url('resident_info/pwd') ?>" class="text-white">Total PWD</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row colorbox-group-widget">
	<div class="col-md-3 col-sm-6 info-color-box">
		<div class="white-box">
			<div class="media bg-info">
				<div class="media-body">
					<h3 class="info-count"><?= number_format(count($senior)) ?> <span class="pull-right"><i class="fa fa-users"></i></span></h3>
					<p class="info-text font-18">Senior Citizen</p>
					<p class="info-ot font-15"><a href="<?= site_url('resident_info/senior') ?>" class="text-white">Total Senior Citizen</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 info-color-box">
		<div class="white-box">
			<div class="media" style="background-color:#1973e9">
				<div class="media-body">
					<h3 class="info-count"><?= number_format($permit) ?> <span class="pull-right"><i class="fa fa-building-o"></i></span></h3>
					<p class="info-text font-18 text-white">Establishment</p>
					<p class="info-ot font-13"><a href="<?= site_url('business') ?>" class="text-white">Business Permit Details</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 info-color-box">
		<div class="white-box">
			<div class="media" style="background-color:#f25961">
				<div class="media-body">
					<h3 class="info-count"><?= number_format($blotter) ?> <span class="pull-right"><i class="icon-layers"></i></span></h3>
					<p class="info-text font-18 text-white">Blotter</p>
					<p class="info-ot font-13"><a href="<?= site_url('blotter') ?>" class="text-white">Blotter Details</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 info-color-box">
		<div class="white-box">
			<div class="media bg-success">
				<div class="media-body">
					<h3 class="info-count">P <?= number_format($revenue, 2) ?> <span class="pull-right"><i class="fa fa-product-hunt"></i></span></h3>
					<p class="info-text font-18 ">Revenue</p>
					<p class="info-ot font-13"><a href="<?= site_url('payments') ?>" class="text-white">Revenue Details</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-lg-8 col-xs-12">
		<div class="white-box sc-widget">
			<h4 class="box-title">This Week Revenue Chart</h4>
			<ul class="list-inline text-right">
				<li>
					<h6><i class="fa fa-circle text-info m-r-5 "></i>Brgy Clearance</h6>
				</li>
				<li>
					<h6><i class="fa fa-circle text-primary m-r-5"></i>Indigency Certificate</h6>
				</li>
				<li>
					<h6><i class="fa fa-circle text-warning m-r-5"></i>Residency Certificate</h6>
				</li>
				<li>
					<h6><i class="fa fa-circle m-r-5" style="color:#d27906"></i>Business Permit</h6>
				</li>
				<li>
					<h6><i class="fa fa-circle text-dark m-r-5"></i>Others</h6>
				</li>
			</ul>
			<div class="chartist-sales-chart chart-pos m-t-20"></div>
		</div>
	</div>
	<div class="col-md-4 col-lg-4 col-xs-12">
		<div class="white-box">
			<h3 class="box-title">Resident Chart</h3>
			<div id="morris-donut-chart"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-xs-12 col-lg-12">
		<div class="white-box">
			<h3 class="box-title">COVID19 Status Bar Chart</h3>
			<ul class="list-inline text-right">
				<li>
					<h6><i class="fa fa-circle text-success m-r-5 "></i>Negative</h6>
				</li>
				<li>
					<h6><i class="fa fa-circle text-danger m-r-5 "></i>Positive</h6>
				</li>
				<li>
					<h6><i class="fa fa-circle text-dark m-r-5 "></i><a href="<?= site_url('covid-deaths') ?>">Deaths</a></h6>
				</li>
				<li>
					<h6><i class="fa fa-circle text-primary m-r-5 "></i><a href="<?= site_url('covidstatus') ?>">All Details</a></h6>
				</li>
			</ul>
			<div id="morris-bar-chart"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12">
		<div class="white-box">
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="iprofile">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="ribbon-wrapper activity-widget">
							<div class="ribbon ribbon-bookmark ribbon-danger font-18">ANNOUNCEMENT:</div>
							<div class="steamline">
								<?php
								$color = array('bg-primary', 'bg-info', 'bg-danger', 'bg-warning', 'bg-secondary');
								$no = 0;
								foreach ($announcement as $row) : ?>
									<div class="sl-item">
										<div class="sl-left">
											<div class="icon-box <?= $color[$no] ?>">
												<i class="icon-pin" aria-hidden="true"></i>
											</div>
										</div>
										<div class="sl-right">
											<div>
												<a href="javascript:void(0);" class="text-danger font-semibold font-18"><?= ucwords($row['what']); ?></a>
											</div>
											<p class="m-b-0 font-15"><?= ucwords($row['description']); ?></p>
											<p class="m-b-0 text-info">Venue: <b class="text-primary"><?= ucwords($row['venue']); ?></b></p>
											<p class="m-b-0 text-info">When: <b class="text-primary"><?= date('F d, Y h:i:s A', strtotime($row['date'])) ?></b></p>

											<p class="m-b-0">By: <a href="javascript:void(0);" class="text-link"><?= ucwords($row['who']); ?></a></p>

										</div>
									</div>
								<?php $no++;
								endforeach ?>
								<div class="text-right"><a class="btn btn-info btn-rounded btn-sm btn-outline" href="<?= site_url('announcement') ?>">See all announcement...</a></div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="white-box">
	<div class="row">
		<div class="col-sm-12">
			<h4 class="box-title">BACKGROUND OF BARANGAY</h4>
			<p class="m-b-20"><?= !empty($info->dashboard_text) ? $info->background : null ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<h4 class="box-title">BARANGAY MISSION AND VISION</h4>
			<p class="m-b-20"><?= !empty($info->dashboard_text) ? $info->dashboard_text : null ?></p>
		</div>
	</div>

	<img src="<?= !empty($info->dashboard_img) ? 'assets/uploads/' . $info->dashboard_img : 'assets/img/bg1.png' ?>" style="width: 100%" />
</div>