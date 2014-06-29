<h1>Event <small>Add New Event</small></h1>
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('admin/main'); ?>"><i class="icon-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-edit"></i> New Event</li>
</ol>
<form role="form">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" id="cat">
                <label>Category</label>
                <select class="form-control" id="category">
                    <option value="NULL">Uncategorized</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group has-feedback" id="cat-other" style="display: none;">
                <label for="title">Category</label>
                <input type="text" class="form-control" id="other" placeholder="Other">
                <a href="#" onclick="show_cat();"><span class="fa fa-caret-square-o-down form-control-feedback"></span></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" class="form-control" id="tags" placeholder="Separate with koma (,)">
            </div>
        </div>
    </div>
    <textarea class="form-control tinymce" rows="8"></textarea>
    <br>
    <button type="submit" class="btn btn-default">Submit</button>
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
    });
    function show_cat() {
        $("#cat-other").val("");
        $("#cat-other").hide();
        $("#category").val("NULL");
        $("#cat").show();
    }
</script>