<h1>Dashboard</h1>
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
</ol>
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-table"></i> List of Events</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="10%">ID #</th>
                                <th width="20%">Date </th>
                                <th>Title </th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($events as $event) { ?>
                            <tr>
                                <td><?php echo $event->id; ?></td>
                                <td><?php echo $event->date; ?></td>
                                <td><?php echo $event->title; ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/edit').'/'.$event->id; ?>"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="close" onclick="del_event('<?php echo $event->id; ?>')">×</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php
                    if ($kat == 'all')
                    {
                        $link = base_url('admin/main').'/';
                    }
                    else if ($kat == NULL)
                    {
                        $link = base_url('admin/unkat').'/';
                    }
                    else
                    {
                        $link = base_url('admin/kat').'/'.$kat.'/';
                    }
                ?>
                <ul class="pager">
                <li class="previous <?php if (!$prev) echo 'disabled'; ?>"><a href="<?php echo $link.($page-1); ?>">&larr; Previous</a></li>
                <li class="next <?php if (!$next) echo 'disabled'; ?>"><a href="<?php echo $link.($page+1); ?>">Next &rarr;</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-font"></i> Category <a href="#" onclick="toggle_edit_kat();"><span class="fa fa-cog pull-right"></span></a></h3>
            </div>
            <div class="panel-body">
                <div id="list-kat">
                    <div class="list-group">
                        <a href="<?php echo base_url('admin/main'); ?>" class="list-group-item <?php if ($kat == 'all') echo 'active'; ?>">
                            <span class="badge">
                                <?php echo $this->events_model->NumAll(); ?>
                            </span>
                            All
                        </a>
                        <?php foreach ($categories as $category) { ?>
                        <a href="<?php echo base_url('admin/kat').'/'.$category->id_kat; ?>" class="list-group-item <?php if ($kat == $category->id_kat) echo 'active'; ?>">
                            <span class="badge">
                                <?php echo $this->events_model->NumKat($category->id_kat); ?>
                            </span>
                            <?php echo $category->title; ?>
                        </a>
                        <?php } ?>
                        <a href="<?php echo base_url('admin/unkat'); ?>" class="list-group-item <?php if ($kat == NULL) echo 'active'; ?>">
                            <span class="badge">
                                <?php echo $this->events_model->NumNull(); ?>
                            </span>
                            Uncategorized
                        </a>
                    </div>
                    <div class="text-right btn-cat">
                        <a href="#" onclick="toggle_kat()"><i class="fa fa-plus"></i> Add Category</a>
                    </div>
                    <div class="form-cat" style="display: none;">
                        <form class="form-inline" id="form-category" role="form">
						    <div class="input-group">
      						    <input type="text" class="form-control" id="category" placeholder="Title">
      						    <span class="input-group-btn">
        						    <button class="btn btn-default" type="submit"><span class="fa fa-plus"></span></button>
                                    <button class="btn btn-default" type="submit" onclick="toggle_kat()"><span>×</span></button>
      						    </span>
    					    </div>
					    </form>
                    </div>
                </div>
                <div id="edit-kat" style="display: none;">
                    <form action="<?php echo base_url('admin/edit_kat') ?>" method="POST" role="form">
                        <?php foreach ($categories as $category) { ?>
                        <div class="input-group">
	      			        <input type="hidden" name="id_kategori[]" value="<?php echo $category->id_kat; ?>">
      				        <input type="text" class="form-control" value="<?php echo $category->title; ?>" name="nama_kategori[]">
      				        <span class="input-group-btn">
        				        <button class="btn btn-default" type="button" onclick="del_kat(<?php echo $category->id_kat; ?>)"> <span class="close"></span>×<span></button>
      				        </span>
    			        </div>
                        <?php } ?>
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-default" onclick="toggle_edit_kat();">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.row -->
<script>
    $(document).ready(function(){
        $("#form-category").submit(function(){
			if ($("#category").val() != ""){
				$.ajax({
					type	: "POST",
					url 	: "<?php echo base_url('ajax/add_kat'); ?>",
					data	: {
						title : $("#category").val()
					},
					success	: function(html){
						if (html == 'true'){
							window.location = "<?php echo $link; ?>";
						}else{
							alert('Gagal!');
                            $(".load-full").hide();
						}
					},
					beforeSend : function(){
						$(".load-full").show();
					}
				});
			}else{
				
			}
			return false;
		});
    });
    function toggle_kat()
    {
        $(".btn-cat").toggle();
        $(".form-cat").toggle();
        $("#category").focus();
    }
    function toggle_edit_kat()
    {
        $("#list-kat").toggle();
        $("#edit-kat").toggle();
    }
    function del_event(id) {
        if (confirm("Are you sure?"))
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('ajax/del_event'); ?>",
                data: {
                    id: id
                },
                beforeSend: function () {
                    $(".load-full").show();
                },
                success: function (html) {
                    if (html == 'true') {
                        window.location = "<?php echo $link; ?>";
                    } else {
                        alert('Gagal!');
                        $(".load-full").hide();
                    }
                }
            });
        }
    }
    function del_kat(id_kat){
		if (confirm("Yakin Untuk Menghapus?")){
			$.ajax({
				type	: "POST",
				url 	: "<?php echo base_url('ajax/del_kat'); ?>",
				data	: {
					id : id_kat
				},
				success	: function(html){
					if (html == 'true'){
						window.location = "<?php echo $link; ?>";
					}else {
                        alert('Gagal!');
                        $(".load-full").hide();
                    }
				},
				beforeSend : function(){
					$(".load-full").show();
				}
			});
		}
	}
</script>