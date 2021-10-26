<main class="main">
    <section class="head">
        <h2 class="head__title">Гостевая книга</h2>
        <p class="head__date">Сегодня 03 Март 2020 год</p>
    </section>

    <?if ($_SESSION['login']):?>

    <form action="../components/<?= $_GET['id'] ? 'edit_comment.php' : 'write_comment.php';?>" class="form" method="post">
        <label class="form__label">
            <input hidden type="" name="id" value="<?= $_GET['id']?>">
            <!-- <span class="form__text">Введите имя</span> -->
            <input type="text" class="form__input" readonly value="<?= $_SESSION['login']?>"  name="name">
        </label>
        <?
        include_once('./components/db.php');
        $comments = getComment();
        $commen = olComment($_GET['id'])['comment'];
        ?>
        <label class="form__label">
            <?if (!$_GET['id']):?>
            <span class="form__text">Оставте отзыв</span>
            <?endif;?>
            <textarea class="form__input" name="descr"><?= $commen?></textarea>
        </label>
        <button class="form__btn"><?= !$_GET['id'] ? "ОТПРАВИТЬ" : "ИЗМЕНИТЬ";?></button>
    </form>
    <?endif;?>
    <?if (!$_GET['id']):?>
    <div class="comments">
        <?foreach ($comments as $key => $comment):?>
        <div class="comments__item">
            <p class="comments__item-time"></p>
            <section class="comments__body">
                <div class="comments__head">
                    <h2 class="comment__head-title"><?= $comment['login']?></h2>
                    <img src="<?= $_SESSION['photo']?>" alt="" class="comments__head-img">
                </div>
                <p class="comments__body-descr"><?= $comment['comment']?></p>
                <?if ($_SESSION['login'] == $comment['login']):?>
                <div class="comments__footer">
                    <a href="/?route=guest&id=<?= $comment['id'];?>" class="comments__footer-link"><i class="fal fa-edit"></i></a>
                    <a href="#" class="comments__footer-link"><i class="fal fa-trash"></i></a>
                </div>
                <?endif;?>
            </section>
        </div>
        <?endforeach;?>
    </div>
    <?endif;?>
</main>