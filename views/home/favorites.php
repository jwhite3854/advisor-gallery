<div class="container p-3">
	<div class="row justify-content-center">
		<div class="col-md-9 text-center">
		<?php  if ( count($data['favorites']) > 0 ): ?>
			<?php foreach ( $data['favorites'] as $location ): ?>
			<div class="mb-3 favorites">
				<div class="favToggler chosen <?php echo ( $data['enable_toggle'] ?: 'd-none' ) ?>" data-src="<?php echo $location ?>">
					<div class="toggleInterior"></div>
				</div>
				<a class="item " href="<?php echo $location ?>">
					<img src="<?php echo $location ?>" class="rounded img-fluid"/>
				</a>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>
		</div>
	</div>
	<hr class="mt-5"/>
	<div class="row">
		<div class="col-6">
		<?php if ($data['enable_toggle']): ?>
			<button class="btn btn-info mr-2" id="enableSelect">Select Mode: On</button>
		<?php else: ?>
			<button class="btn btn-secondary mr-2" id="enableSelect">Select Mode: Off</button>
		<?php endif; ?>

		<?php if ($data['enable_grid']): ?>
			<button class="btn btn-secondary viewGrid" id="toggleView">View Mode: Masonry</button>
		<?php else: ?>
			<button class="btn btn-secondary" id="toggleView">View Mode: Column</button>
		<?php endif; ?>
		</div>
		<?php  if ( count($data['favorites']) > 0 ): ?>
		<div class="col-6">
			<button class="btn btn-danger float-right" id="clearAll">Clear All</button>
		</div>
		<?php endif; ?>
	</div>
</div>