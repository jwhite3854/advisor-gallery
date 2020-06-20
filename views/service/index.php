<div class="container p-3">
	<p style="color: #fff"><?php echo $message ?></p>
	<form id="serve_form" action="http://localhost:8081/service/process" method="post" enctype="multipart/form-data">
		<p><input type="text" name="submit_nonce" /></p>
		<p><input type="submit" value="Submit" /></p>
	</form>
	<ul>
		<li>928272 - Normalize image names</li>
		<li>927275 - Normalize movie names</li>
		<li>987222 - Move to vault</li>
		<li>928722 - Create thumbnail</li>
	</ul>
</div>