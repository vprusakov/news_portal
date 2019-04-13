<div class="entry">
    <div class="entry__body" id="editor">
        <h2 data-name="headline" contenteditable id="js-headline"><?php echo $news_entry->headline; ?></h2>
        <div data-name="intro" contenteditable id="js-intro"><?php echo $news_entry->intro; ?></div>
        <div data-name="content" contenteditable id="js-content"><?php echo $news_entry->content; ?></div>
    </div>
    <div class="entry__footer">
        <a href="/manager/update/<?php isset($news_entry->id) ? $news_entry->id : ""; ?>" class="link" id="js-save">Сохранить</a>
    </div>
</div>
<script src="/js/app.js"></script>
<script>processEdits.init(<?php echo $news_entry->id !== -1 ? $news_entry->id : ""; ?>)</script>