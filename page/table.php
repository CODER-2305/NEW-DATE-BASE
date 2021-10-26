<? include_once('./components/header.php');?>
<? include_once('./components/aside.php');?>
<main class="main">
    <section class="head">
        <h2 class="head__title">Таблица умножения</h2>
        <p class="head__date">Сегодня 03 Март 2020 год</p>
    </section>
    <form action="" class="form form_table" >
        <label class="form__label">
            <span class="form__text">Количество колонок</span>
            <input type="text" class="form__input" name="col">
        </label>
        <label class="form__label">
            <span class="form__text">Количество строк</span>
            <input type="text" class="form__input" name="row">
        </label>
        <button class="form__btn">Отправить</button>
    </form>
    <div class="table">
    </div>
</main>
<script type="text/javascript">
    const formTable = document.querySelector('.form_table');
    const table = document.querySelector('.table');
    let formBtn = document.querySelector('.form__btn');
    formTable.addEventListener('submit', function(event){
        event.preventDefault();
        fetch('./components/creat-table.php', {
            method: 'post',
            body: new FormData(this)
        })
        .then(res => res.text())
        .then(jav => table.innerHTML = jav)

    })

</script>