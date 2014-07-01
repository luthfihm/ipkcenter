<?php 
	foreach ($teks->result() as $row) {
		$name = $row->name;
		$image = $row->image;
		$profile = $row->profile;
	}
?>
<section id="profiles">
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url() ?>">Home</a></li>
		<li><a href="<?php echo base_url() ?>index.php/main/profiles">Profiles</a></li>
		<li class="active"><?php echo $name; ?></li>
	</ol>
	<h1 class="sectiontitle" style="margin-bottom:50px"><b><?php echo $name; ?></b></h1>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12 overview" align="center">
				<img src="<?php echo base_url() ?>assets/images/<?php echo $image ?>" class="profimage2 circular">
				<br>
				<br>
				<?php echo $profile; ?>
			</div>
		</div>
	</div>
</section>