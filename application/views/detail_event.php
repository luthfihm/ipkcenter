<?php 
	foreach ($event->result() as $row) {
		$title = $row->title;
		$content = $row->content;
	}
?>

<section id="events">
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url() ?>">Home</a></li>
		<li><a href="<?php echo base_url() ?>index.php/main/events">Events</a></li>
		<li class="active"><?php echo $title; ?></li>
	</ol>
	<h1 class="sectiontitle" style="margin-bottom:50px"><b><?php echo $title; ?></b></h1>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<p><?php echo $content; ?></p>
			</div>
		</div>
	</div>
</section>