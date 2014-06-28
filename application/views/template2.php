<?php $this->load->view('header')?>

<?php $this->load->view('menu2')?>

		<?php 

			if(!empty($data))

				$this->load->view($view,$data);

			else

				$this->load->view($view);

		?>

<?php $this->load->view('footer')?>

