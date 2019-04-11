<?php foreach ($news as $news_item) { ?>
    <div class="feed__item">
        <div class="entry">
            <div class="entry__header">
                <span class="entry__id">#<?php echo $news_item->id; ?></span>
                <a href="/manager/delete/<?php echo $news_item->id; ?>" class="entry__delete-link link link--danger floated-right">Удалить</a>
            </div>
            <div class="entry__content">
                <h2><?php echo $news_item->headline; ?></h2>
                <p><?php echo $news_item->intro; ?></p>
                <a href="/manager/edit/<?php echo $news_item->id; ?>" class="entry__read-link" ></a>
            </div>
        </div>
    </div>
<?php } ?>