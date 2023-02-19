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
    <title>Регистрация заявки</title>
</head>
<body class="background-site">
<?php if (!empty($_SESSION['user']['name'])): ?> //false
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
    <div class="alert">
        <?php if (!empty($_SESSION['success'])): ?>
            <div class="alert-danger success-alert" role="alert">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);

                ?>
                <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close"
                ></button>
            </div>
        <?php endif; ?>
    </div>

    <section class="form-list-application">
        <div class="container">
            <div class="container-list-application">
                <h1 class="form-list-application-title">Регистрация заявки</h1>
                <form action="#" method="post">
                    <div class="container-list-application-flex">
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">
                                Дата регистрации:
                            </h4>
                            <input class="input_form_list" type="date" value=""/>
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Статус заявки:</h4>
                            <input
                                    class="input_form_list"
                                    type="text"
                                    placeholder="Приняты"
                                    required
                            />
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Тип устройства:</h4>
                            <input
                                    class="input_form_list"
                                    type="text"
                                    placeholder="Компьютер"
                                    required
                            />
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">
                                Модель устройства:
                            </h4>
                            <input
                                    class="input_form_list"
                                    type="text"
                                    placeholder="Компьютер"
                                    required
                            />
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Имя клиента:</h4>
                            <input
                                    class="input_form_list"
                                    type="text"
                                    placeholder="Иванов Иван Иванович"
                                    required
                            />
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Номер телефона:</h4>
                            <input
                                    class="input_form_list"
                                    type="text"
                                    placeholder="+(996)-000-000-000"
                                    required
                            />
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Мастер:</h4>
                            <input
                                    class="input_form_list"
                                    type="text"
                                    placeholder="Петров Петр Васильевич"
                                    required
                            />
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Для мастера:</h4>
                            <p>
                  <textarea
                          class="input_form_list textarea_com"
                          name="comment"
                          placeholder="Введите ваш комментарий"
                          required
                  ></textarea>
                            </p>
                        </div>
                        <div class="input_form_list_submit_end">
                            <div class="checkbox_center">
                                <input type="checkbox" id="scales" name="scales"/>
                                <label class="checkbox_text_labal" for="scales"
                                >Принять заявку</label
                                >
                            </div>
                            <div class="list__red-block">
                                <div class="btn list__red">
                                    <input
                                            class="list__red-input"
                                            type="submit"
                                            value="Очистить"
                                    />
                                    <img src="../../img/delete.svg" alt="" class="img-icon"/>
                                </div>
                                <div class="list__red btn">
                                    <input
                                            class="list__red-input"
                                            type="submit"
                                            value="Редактировать"
                                    />
                                    <img src="../../img/icon-pencil.svg" alt="" class="img-icon"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
<?php else:

    header("Location: ../login_form.php ");
    $_SESSION['errors'] = 'Пройдите авторизацияю';
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
