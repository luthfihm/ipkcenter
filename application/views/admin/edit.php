<h1>Event <small>Edit Event</small></h1>
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('admin/main'); ?>"><i class="icon-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-edit"></i> Edit Event</li>
</ol>
<form role="form" id="form-new">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" value="<?php echo $event->title; ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" id="cat">
                <label>Category</label>
                <select class="form-control" id="category">
                    <option value="NULL">Uncategorized</option>
                    <?php
                        foreach ($categories as $category){
                    ?>
                    <option value="<?php echo $category->id_kat; ?>" <?php if ($event->category == $category->id_kat) echo "selected"; ?>><?php echo $category->title; ?></option>
                    <?php } ?>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group has-feedback" id="cat-other" style="display: none;">
                <label for="other">Category</label>
                <input type="text" class="form-control" id="other" placeholder="Other">
                <a href="#" onclick="show_cat();"><span class="fa fa-caret-square-o-down form-control-feedback"></span></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tags">Tags</label>
                <?php
                    $tags = $this->events_model->GetTags($event->id);
                    $arr_tags = array();
                    foreach ($tags as $tag)
                    {
                        array_push($arr_tags,$tag->tag);
                    }
                ?>
                <input type="text" class="form-control" id="tags" placeholder="Separate with koma (,)" value="<?php echo implode(',',$arr_tags); ?>">
            </div>
        </div>
    </div>
    <textarea class="form-control tinymce" rows="9" id="content"><?php echo $event->content; ?></textarea>
    <br>
    <button type="submit" class="btn btn-default" id="btn-submit">Submit</button>
    <div id="loading" style="display: none;">
        <img src="<?php echo base_url('assets/images/loading2.gif')?>">
    </div>
</form>
<script>
    $(document).ready(function () {
        $("#category").change(function () {
            var cat = $("#category").val();
            if (cat == "other") {
                $("#cat").hide();
                $("#cat-other").show();
            }
        });
        $("#form-new").submit(function () {
            var title = $("#title").val();
            var category = $("#category").val();
            var other = $("#other").val();
            var tags = $("#tags").val();
            var content = $("#content").val();
            if ((title != "") && (tags != "") && (content != "")) {
                if ((category == "other") && (other == "")) {
                    alert("Field uncomplete!");
                }
                else {
                    $.ajax({
					    type	: "POST",
                        url : "<?php echo base_url('ajax/edit_event'); ?>",
                        data : {
                            id : "<?php echo $event->id; ?>",
                            title : title,
                            category : category,
                            other : other,
                            tags : tags,
                            content : content
                        },
                        success	: function(html){
						    if (html == 'true'){
							    window.location = "<?php echo base_url('admin/main'); ?>";
						    }else{
							    alert("Perintah gagal dilakukan!");
                                $("#loading").hide();
						        $("#btn-submit").show();
						    }
                        },
                        beforeSend : function(){
						    $("#btn-submit").hide();
                            $("#loading").show();
					    }
                    });
                }
            }
            else {
                alert("Field uncomplete!");
            }
            return false;
        });
    });
    function show_cat() {
        $("#cat-other").val("");
        $("#cat-other").hide();
        $("#category").val("NULL");
        $("#cat").show();
    }
</script>