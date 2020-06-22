<?php

$uri =  trim($_SERVER["REQUEST_URI"], '/');

// Get the real $uri set in routes config
$redirect_base = ArchiveApp::getConfig('redirect_base');
$base = trim($redirect_base, '/');

if ( !empty($base) ) {
	$uri = str_replace( $base, 'images', $uri );
}

if ($uri === '') {
	$uri = 'current';
}

$imagePath = APP_ROOT.'/images/'.$uri.'/';

$movies = glob( $imagePath.'*.mp4' );
//$movies = array_reverse($movies);

$images = glob( $imagePath.'*.jpg' );
//$images = array_reverse($images);

$imagesP = glob( $imagePath.'*.png' );

$images = array_merge($images, $imagesP);

$baseUrl = Url::render('/');
$fileBase = ArchiveApp::getConfig('file_base');
?>
<div class="container p-3">
	<div class="row justify-content-center">
		<div class="col-md-9 text-center">
		<?php if ( count($movies) > 0 ): ?>
			<?php foreach ( $movies as $movie ): $location = str_replace($fileBase, $baseUrl, $movie); ?>
			<div class="video-responsive portrait mb-3 rounded">
				<video controls="controls" controlsList="nodownload" playsinline>
					<source src="<?php echo $location ?>" type="video/mp4">
				</video>
			</div>
		<?php endforeach; endif; ?>
		<?php  if ( count($images) > 0 ): ?>
			<?php foreach ( $images as $image ): 
				$date = false;
				//$exif_data = exif_read_data($image);
				$exif_data = false;
				if ( !empty($exif_data) ) {
					$FileDateTime = $exif_data['FileDateTime'];
					$date = date('m/d/Y,  H:i:s', ($FileDateTime-7300));
				}
				$location = str_replace($fileBase.'/', $baseUrl, $image); ?>
			<div class="mb-3">
				<?php if ( !!$date && array_key_exists('datetime', $data) && $data['datetime'] ): ?>
					<h5 style="text-align: right"><?php echo $date ?></h5>
				<?php endif; ?>
				<?php if ($data['enable_toggle']): ?>
					<?php $chosen = in_array($location, $data['favorites']) ? 'chosen' : ''; ?>
					<div class="favToggler <?php echo $chosen ?>" data-src="<?php echo $location ?>">
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