<h2> <?= esc($news['title'])?> </h2>
<h4> <?= esc($news['id'])?> </h4>
<p> <?= esc($news['body']) ?></p>

<?= view_cell('AlertMessage::show', ['type' => 'danger', 'message' => 'Holá Mundo!']); ?>