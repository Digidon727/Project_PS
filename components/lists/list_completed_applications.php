<?php
error_reporting(-1);
session_start();

require_once __DIR__ . '/../funcs/db.php';
require_once __DIR__ . '/../funcs/login_and_registration.php';

if (isset($_GET['do']) && $_GET['do'] = 'exit') {
    if (!empty($_SESSION['user'])) {
        unset($_SESSION['user']);
        header("Location: ../login_form.php");
    }
    header("Location: ../login_form.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../../css/style.min.css"/>
    <title>Лист выполненных заявок</title>
</head>
<body class="background-site">
<?php if (!empty($_SESSION['user']['name'])): ?>
    <header class="header-main__menu">
        <div class="container">
            <div class="header-main__menu-main">
                <div class="header-main__nav-logo">
                    <img src="../../img/logo1.svg" alt="icon" class="header__logo"/>
                </div>

                <div class="header-main__nav">
                    <nav>
                        <ul class="header-main__list">
                            <li class="header-main__item">
                                <a href="./list_reg.php" class="header-main__btn btn"
                                >Регистрация заявки</a
                                >
                            </li>
                            <li class="header-main__item">
                                <a
                                        href="./list_active_applications.php"
                                        class="header-main__btn btn"
                                >Активные заявки</a
                                >
                            </li>
                            <li class="header-main__item">
                                <a
                                        href="./list_completed_applications.php"
                                        class="header-main__btn btn"
                                >Выполненные заявки</a
                                >
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="header-main__info-accounts">
                    <div class="header-main__info-account">
                        <div class="header-main__img-avatar">
                            <img src="../../img/avatar.png" alt=""/>
                        </div>
                        <div class="header-main__info-user">
                            <p>Добро пожаловать: <?= htmlspecialchars($_SESSION['user']['name']) ?></p>
                            <p>Электронная почта: <?= htmlspecialchars($_SESSION['user']['email']) ?></p>
                        </div>
                    </div>

                    <div class="header-main__btn-exit">
                        <a href="?do=exit" class="btn">Вход</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <hr class="line_bk"/>

    <section class="list__active-app">
        <div class="container">
            <div class="list__active-info-header">
                <h2 class="list__active-title">Лист выполненных заявок</h2>

                <ul class="list__active-info-tables">
                    <li class="list__active-table-header">
                        <div class="list__active-table-block">
                            <div class="list__active-text-header">№</div>
                            <div class="list__active-text-header">Дата</div>
                            <div class="list__active-text-header">Статус</div>
                            <div class="list__active-text-header">Тип устройства</div>
                            <div class="list__active-text-header">Модель</div>
                            <div class="list__active-text-header">Имя</div>
                            <div class="list__active-text-header">Номер телефона</div>
                            <div class="list__active-text-header">Мастер</div>
                            <div class="list__active-text-header">Для мастера</div>
                        </div>

                        <div class="form-info-search">
                            <form
                                    class="form-search-inp"
                                    method="post"
                                    action="./search_form.php"
                            >
                                <input
                                        class="search-inp1"
                                        type="text"
                                        name="search"
                                        placeholder="Введите..."
                                        required
                                />
                                <input class="btn-top" type="submit" value=""/>
                            </form>
                        </div>
                    </li>

                    <li class="list__active-info-applications">
                        <div class="list__active-info-block">
                            <div class="list__active-text-applications">1</div>
                            <div class="list__active-text-applications">01.02.23</div>
                            <div class="list__active-text-applications">Принят</div>
                            <div class="list__active-text-applications">Системный блок</div>
                            <div class="list__active-text-applications">i3 9900</div>
                            <div class="list__active-text-applications">
                                Иванов Иван Иванович
                            </div>
                            <div class="list__active-text-applications">
                                +(996)-000-000-000
                            </div>
                            <div class="list__active-text-applications">
                                Иванов Иван Иванович
                            </div>
                            <div class="list__active-text-applications">
                                Краткое сообщение...
                            </div>
                        </div>

                        <div class="list__active-buttons">
                            <a href="./list_z.php" class="list__active-button"
                            >Подробнее</a
                            >
                            <a href="./list_red.php" class="list__active-button"
                            >Изменить</a
                            >
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </section>
<?php else:
    header("Location: ../login_form.php ");
    die();
    ?>

<?php endif; ?>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"
></script>
</body>
</html>
