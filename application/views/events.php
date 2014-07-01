<section id="events" data-speed="4" data-type="background">
    <h1 class="sectiontitle" style="margin-bottom:50px"><b>Events</b></h1>
    <div class="container">
      <div class="row">
        <?php 
          foreach ($events->result() as $row) {
            $string = $row->content;
            $overview = substr($string, 0, 300).'...';
        ?>
          <div class="col-xs-12 col-md-4 overview">
          <h3 class="sectiontitle"><?php echo $row->title; ?></h3>
          <p><?php echo $overview; ?></p>
          <div style="text-align:right"><a href="<?php echo base_url() ?>index.php/main/detail_event/<?php echo $row->id; ?>"><b>Read More</b></a></div>
        </div>
        <?php
          }
        ?>
        <div class="clear"></div>
      </div>
    </div>
  </section>