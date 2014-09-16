<section class="todo-control">

    <section class="todo-list" data-filter="all">
        <?php foreach ($items as $item): ?>
            <?php echo Modules::run('mylist/_pagelet_item', $item); ?>
        <?php endforeach; ?>
    </section><hr>

    <footer class="clearfix">
        <div class="pull-left">
            <strong class="todo-count"><?php echo $items_left; ?></strong> item(s) left
        </div>
        <ul class="todo-filter list-inline pull-right">
            <li><a rel="async" href="#" ajaxify="<?php echo site_url('mylist/mylist_ajax/filter/all'); ?>">All</a></li>
            <li><a class="text-muted" rel="async" href="#" ajaxify="<?php echo site_url('mylist/mylist_ajax/filter/active'); ?>">Active</a></li>
            <li><a class="text-muted" rel="async" href="#" ajaxify="<?php echo site_url('mylist/mylist_ajax/filter/completed'); ?>">Completed</a></li>
        </ul>
    </footer>
</section>
