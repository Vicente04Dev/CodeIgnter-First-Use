<h2> <?= esc($title) ?>

<?php if(!empty($news) AND is_array($news)) : ?>
    <?php foreach($news as $item): ?>
        <h3> <?= $item['title']?> </h3>

        <div class="main">
            <p> <?= esc($item['body'])?> </p>
        </div>

        <a href="/news/<?= esc($item['slug'], 'url')?>">Ver notícia</a>

    <?php endforeach ?>
<?php else: ?>

    <h3>Não tem notícia nessa categoria </h3>
    <p> Lamentamos, mas não temos uma notícia para apresentar</p>

<?php endif ?>