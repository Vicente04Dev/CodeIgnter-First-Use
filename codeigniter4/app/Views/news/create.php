<h1> <?= esc($title) ?> </h1>

<?= session()->getFlashData('errors') ?>
<?= validation_list_errors() ?>

<form action="/news" method="post">
    <?= csrf_field() ?>

    <label for="title">Título</label>
    <input type="text" name="title" value="<?= set_value('title') ?>" />

    <br>

    <label for="body" > Mensagem </label>
    <textarea name="body"> <?= set_value('body') ?> </textarea>

    <br>

    <input type="submit" name="submit" value="Cadastrar notícia" />
</form>