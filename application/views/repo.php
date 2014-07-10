<section id="repository">
	<div class="container">
		<div class="row">
			<h1>Repository</h1>
			<br>
			<h4><ol class="breadcrumb">
				<li></span><a href="<?php echo base_url(); ?>index.php/main/repo"> files</a></li>
				<?php 
					$arr = explode('/', $dir);
					$arr_size = count($arr);
					$folderpath = "";
					for ($i=2; $i < $arr_size; $i++) {
						$folderpath = $folderpath.$arr[$i];
						if ($i != $arr_size-1)
							$folderreq = urlencode($dir."/".$folderpath);
						else
							$folderreq = urlencode($dir); 
						?>
					<li><a href="<?php echo base_url(); ?>index.php/main/repo/<?php echo '?path='.$folderreq ?>"> <?php echo $arr[$i] ?></a></li>
				<?php
					}
				?>
				
			</ol></h4>
			<div class="col-md-4 col-xs-12">
			<?php foreach ($files as $file) {
                    	$path = urlencode($dir."/".$file);
                    	if (strpos($file,'.') === false) { ?>
                    		<a href="<?php echo base_url(); ?>index.php/main/repo/<?php echo '?path='.$path ?>"><span class="glyphicon glyphicon-folder-close"></span>  <?php echo $file; ?></a> <br>		
                    	<?php }
                    	else {?>
			        <a href="<?php echo base_url($dir).'/'.$file; ?>"><span class="glyphicon glyphicon-file"></span>  <?php echo $file; ?></a> <br>
					<?php }} ?>
			</div>
</section>