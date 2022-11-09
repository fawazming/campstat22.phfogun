</div>

<!-- BEGIN: Page content-->
<div>
	<h2 class="text-center">
		General Registration Statistics
	</h2>
	<div class="row">
		<div class="col-lg-4  col-sm-12">
			<div class="card">
				<div class="card-body">
					<h5 class="box-title text-center">Total Delegates</h5>
					<div class="row">
						<div class="col text-center">
							<div class="easypie" data-percent="<?=(($total_del/1000)*100)?>" data-bar-color="#00bcd4" data-size="110" data-line-width="8"><span class="easypie-data text-info" style="font-size:32px;"><?= ($total_del).'+'.$manual['total_del'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal">Overall</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<h5 class="box-title text-center">Total By Gender</h5>
					<div class="row">
						<div class="col text-center">
							<div class="easypie" data-percent="<?=(($male/400)*100)?>" data-bar-color="#00bcd4" data-size="110" data-line-width="8"><span class="easypie-data text-info" style="font-size:32px;"><?=($male).'+'.$manual['male'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal">Male</h6>
						</div>
						<div class="col text-center">
							<div class="easypie" data-percent="<?=(($male/600)*100)?>" data-bar-color="#2949ef" data-size="110" data-line-width="8"><span class="easypie-data text-primary" style="font-size:32px;"><?=($female).'+'.$manual['female'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal">Female
							</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		
	<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h5 class="box-title text-center">Total By Zone</h5>
					<div class="row">
						<div class="col-md-2 col-sm-4 text-center">
							<div class="easypie" data-percent="<?=(($remo/300)*100)?>" data-bar-color="#00bcd4" data-size="110" data-line-width="8"><span class="easypie-data text-info" style="font-size:32px;"><?=($remo).'+'.$manual['remo'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal"> <a href="<?= base_url('admin/zone?zid=1') ?>">Remo</a> </h6>
						</div>
						<div class="col-md-2 col-sm-4 text-center">
							<div class="easypie" data-percent="<?=(($egba/300)*100)?>" data-bar-color="#2949ef" data-size="110" data-line-width="8"><span class="easypie-data text-primary" style="font-size:32px;"><?=($egba).'+'.$manual['egba'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal"><a href="<?= base_url('admin/zone?zid=2') ?>">Egba</a>
							</h6>
						</div>
						<div class="col-md-2 col-sm-4 text-center">
							<div class="easypie" data-percent="<?=(($ijebu/300)*100)?>" data-bar-color="#00bcd4" data-size="110" data-line-width="8"><span class="easypie-data text-info" style="font-size:32px;"><?=($ijebu).'+'.$manual['ijebu'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal"><a href="<?= base_url('admin/zone?zid=3') ?>">Ijebu</a></h6>
						</div>
						<div class="col-md-2 col-sm-4 text-center">
							<div class="easypie" data-percent="<?=(($aoo/100)*100)?>" data-bar-color="#2949ef" data-size="110" data-line-width="8"><span class="easypie-data text-primary" style="font-size:32px;"><?=($aoo).'+'.$manual['aoo'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal"><a href="<?= base_url('admin/zone?zid=4') ?>">Ado Odo</a>
							</h6>
						</div>
						<div class="col-md-2 col-sm-4 text-center">
							<div class="easypie" data-percent="<?=(($others/100)*100)?>" data-bar-color="#ee1021" data-size="110" data-line-width="8"><span class="easypie-data text-primary" style="font-size:32px;"><?=($others) ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal"><a href="<?= base_url('admin/zone?zid=4') ?>">Others</a>
							</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h5 class="box-title text-center">Total By Category</h5>
					<div class="row">
						<div class="col text-center">
							<div class="easypie" data-percent="<?=(($psec/50)*100)?>" data-bar-color="#00bcd4" data-size="110" data-line-width="8"><span class="easypie-data text-info" style="font-size:32px;"><?=($psec).'+'.$manual['psec'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal">Primary Sch.</h6>
						</div>
						<div class="col text-center">
							<div class="easypie" data-percent="<?=(($jsec/150)*100)?>" data-bar-color="#00bcd4" data-size="110" data-line-width="8"><span class="easypie-data text-info" style="font-size:32px;"><?=($jsec).'+'.$manual['jsec'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal">Junior Sec.</h6>
						</div>
						<div class="col text-center">
							<div class="easypie" data-percent="<?=(($ssec/150)*100)?>" data-bar-color="#00bcd4" data-size="110" data-line-width="8"><span class="easypie-data text-info" style="font-size:32px;"><?=($ssec).'+'.$manual['ssec'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal">Senior Sec.</h6>
						</div>
						<div class="col text-center">
							<div class="easypie" data-percent="<?=(($sch_leaver/150)*100)?>" data-bar-color="#00bcd4" data-size="110" data-line-width="8"><span class="easypie-data text-info" style="font-size:32px;"><?=($sch_leaver).'+'.$manual['sch_leaver'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal">School Leaver</h6>
						</div>
						<div class="col text-center">
							<div class="easypie" data-percent="<?=(($hi/300)*100)?>" data-bar-color="#2949ef" data-size="110" data-line-width="8"><span class="easypie-data text-primary" style="font-size:32px;"><?=($hi).'+'.$manual['hi'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal">Higher Institution
							</h6>
						</div>
						<div class="col text-center">
							<div class="easypie" data-percent="<?=(($workers/500)*100)?>" data-bar-color="#2949ef" data-size="110" data-line-width="8"><span class="easypie-data text-primary" style="font-size:32px;"><?=($workers).'+'.$manual['workers'] ?></span></div>
							<h6 class="mb-0 mt-3 font-15 text-muted font-weight-normal">Workers
							</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

</div>
<!-- END: Page content-->

<!-- BEGIN: Page backdrops-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
	<div class="page-preloader">Loading</div>
</div><!-- END: Page backdrops-->
