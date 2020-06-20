<style>
.mb-3 {
	position: relative;
}

.favToggler {
	width: 48px;
	height: 48px;
	border-left: 2px #000 solid;
	border-bottom: 2px #000 solid;
	position: absolute;
	top: 8px;
	right: 8px;
	border-radius: 8px;
}

.toggleInterior {
	border: 8px #f00 solid;
	height: 46px;
	background-color: #f99;
	border-radius: 6px;
}

.chosen .toggleInterior {
	border: 8px #0f0 solid;
	background-color: #9f9;
}
</style>
<div class="container p-3">
	<div class="row justify-content-center">
		<div class="col-md-9 text-center">
		<?php  if ( count($data['favorites']) > 0 ): ?>
			<?php foreach ( $data['favorites'] as $image ): 
				$location = str_replace($fileBase.'/', $baseUrl, $image); ?>
			<div class="mb-3 favorites">
				<?php if (1): ?>
					<div class="favToggler chosen" data-src="<?php echo $location ?>">
						<div class="toggleInterior"></div>
					</div>
				<?php endif; ?>
				<a class="item " href="<?php echo $location ?>">
					<img src="<?php echo $location ?>" class="rounded img-fluid"/>
				</a>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>
		</div>
	</div>
</div>