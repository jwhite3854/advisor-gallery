<?php

$imagePath = APP_ROOT.'/images/vault/tbnl/';

$images = glob( $imagePath.'*.jpg' );
//$images = array_reverse($images);

$baseUrl = Url::render('/');
$fileBase = ArchiveApp::getConfig('file_base');

?>
<div class="container p-3">
	<div class="grid archive">
	<?php if ( count($images) > 0 ): foreach ( $images as $image ): 
		$location = str_replace($fileBase.'/', $baseUrl, $image);
		$image_full = str_replace('tbnl/', '', $location);
		?>
		<div class="grid-item mb-2">
			<a class="item " href="<?php echo $image_full ?>">
				<img src="<?php echo $location ?>" class="rounded img-fluid" style="width: 120px;"/>
			</a>
		</div>
	<?php endforeach; endif; ?>
	</div>
</div>