<section id="repository">
	<div class="container">
		<div class="row">
			<h1>Repository</h1>
			<br>
			<div class="panel-group" id="accordion">
			  <div class="panel panel-default">
			    <div class="panel-heading">
			      <h4 class="panel-title">
			        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
			          <span class="glyphicon glyphicon-folder-open"></span>  Files
			        </a>
			      </h4>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse in">
			      <div class="panel-body">
                    <?php foreach ($files as $file) {
                    	if (is_dir($file)) { ?>
                    		<a href="<?php echo base_url(); ?>index.php/main/repo/<?php echo $dir.'/'.$file ?>"><span class="glyphicon glyphicon-folder-open"></span>  <?php echo $file; ?></a> <br>		
                    	<?php }
                    	else {?>
			        <a href="<?php echo base_url($dir).'/'.$file; ?>"><span class="glyphicon glyphicon-file"></span>  <?php echo $file; ?></a> <br>
					<?php }} ?>
			      </div>
			    </div>
			  </div>
	</div>
</section>