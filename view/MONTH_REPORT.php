<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">CURRENT MONTH APPLICATIONS</h1>
  </div>
	<section class="ftco-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<?php echo $this->zoningadmin_model->get_time_report('month');?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>