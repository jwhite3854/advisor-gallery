<?php

$thumbs = glob( APP_ROOT.'/images/vidtb/*.png' );
//$images = array_reverse($images);

$baseUrl = Url::render('/');
$fileBase = ArchiveApp::getConfig('file_base');

?>
<div class="container p-3">
<?php if ( count($thumbs) > 0 ): foreach ( $thumbs as $thumb ): 
	$url = str_replace( $fileBase.'/', $baseUrl, $thumb ); 
	$src = str_replace('vidtb', 'videos', str_replace( '.png', '.mp4', $url ) );
	?>
	<div class="grid-item gridid">
		<a class="video-responsive0" href="<?php echo $src ?>" data-lity>
			<div class="sbimgbg rounded" style="background: url('<?php echo $url ?>') no-repeat center / cover;"></div>
		</a>
	</div>
<?php endforeach; endif; ?>
</div>