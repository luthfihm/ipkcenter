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
                                    <a href="#" class="close">×</a>
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
                <h3 class="panel-title"><i class="fa fa-font"></i> Category</h3>
            </div>
            <div class="panel-body">
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
                <div class="text-right">
                    <a href="#"><i class="fa fa-plus"></i> Add Category</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.row -->