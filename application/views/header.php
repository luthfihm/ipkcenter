<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
    <?php 
      echo link_tag('assets/css/bootstrap.css');
      echo link_tag('assets/css/responsiveslides.css');
      echo link_tag('assets/css/style.css')
    ?>
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/responsiveslides.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
       $(document).ready(function(){
       // cache the window object
       $window = $(window);
     
       $('section[data-type="background"]').each(function(){
         // declare the variable to affect the defined data-type
         var $scroll = $(this);
                         
          $(window).scroll(function() {
            // HTML5 proves useful for helping with creating JS functions!
            // also, negative value because we're scrolling upwards                             
            var yPos = -($window.scrollTop() / $scroll.data('speed')); 
             
            // background position
            var coords = '50% '+ yPos + 'px';
     
            // move the background
            $scroll.css({ backgroundPosition: coords });    
          }); // end window scroll
       });  // end section function
    }); // close out script
    </script>

    <script type="text/javascript">
      jQuery(document).ready(function($) {
          $('#navbar-main').affix({
              offset: {
                  top: 0
              }
          });
      });
    </script>

  </head>