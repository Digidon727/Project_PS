<?php
error_reporting(-1);
session_start();

require_once __DIR__ . '/funcs/db.php';
require_once __DIR__ . '/funcs/login_and_registration.php';


if (isset($_POST['registration'])) {

    $registration = registration(); // 0
    if ($registration == false) {
        header("Location: registration_forms.php");
        die();
    } else {
        header("Location: login_form.php");
        die();
    }

}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/style.min.css"/>
    <title>Регистрацияы</title>
</head>
<body class="body-login">
<!-- Header -->
<header class="header">
    <div class="container">
        <div class="header__nav">
            <div class="header__logo-img">
                <img class="header__logo" src="../img/logo1.svg" alt=""/>
            </div>
            <div>
                <nav>
                    <ul class="header__nav-list">
                        <li class="header__nav-item">
                            <a href="../index.php" class="btn">Главная</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="#" class="btn">О нас</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="../components/registration_forms.php" class="btn">Регистрация</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="../components/login_form.php" class="btn">Вход</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<hr class="line_bk"/>

<!-- Section Login -->
<section class="section__login">
    <div class="container">
        <div class="alert">
            <?php if (!empty($_SESSION['errors'])): ?>
                <div class="alert-danger errors-alert" role="alert">
                    <?php
                    echo $_SESSION['errors'];
                    unset($_SESSION['errors']);
                    ?>

                    <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close"
                    ></button>
                </div>
            <?php endif; ?>

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

        <?php if (empty($_SESSION['user']['name'])): ?>
        <div class="form">
            <div class="form__logo">
                <img class="logo" src="../img/logo1.svg" alt=""/>
            </div>
            <div>
                <h2 class="form__title-h2">Project_PS</h2>
                <h2 class="form__title-h22">Регистрация</h2>
            </div>

            <form action="registration_forms.php" method="post" class="form__forms-input">
                <div class="form__info">
                    <input
                            type="text"
                            name="email"
                            class="form__input-login input_text"
                            placeholder="Адрес электронной почты"

                    />
                </div>
                <div class="form__info">
                    <input
                            type="text"
                            name="name"
                            class="form__input-login input_text"

                            placeholder="Имя пользователя"

                    />
                </div>
                <div class="form__password">
                    <input
                            type="password"
                            name="pass"
                            class="form__input-pass input_text"
                            placeholder="Пароль"

                    />
                </div>
                <div class="form__button">
                    <button type="submit" name="registration" class="btn">
                        Зарегистрироваться
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>

</section>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"
></script>
</body>
</html>
