<?php

session_start();

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    isset($_SESSION['fields']) && $fields = $_SESSION['fields'];
    unset($_SESSION['error']);
    unset($_SESSION['fields']);
} else {
    $error = false;
}
?>

<!doctype html>
<html lang="ru">
<?php require_once __DIR__ . '/components/head.php' ?>
<body>
<?php require_once __DIR__ . '/components/header.php' ?>
<section class="main">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Авторизация
            </div>
            <?php
            if ($error) {
                ?>
                <div class="alert alert-danger" style="margin-top: 20px" role="alert">
                    <?= $error ?>
                </div>
                <?php
            }
            ?>
            <div class="card-body">
                <form action="/actions/user/login.php" method="post">
                    <div class="mb-3">
                        <label for="emailField" class="form-label">E-mail</label>
                        <input type="text"
                               name="email"
                               class="form-control"
                               value="<?= isset($fields['email']) ? $fields['email'] : '' ?>"
                               id="emailField"
                               aria-describedby="emailHelp">
                        <?php
                        if (!isset($fields['email']) && $error) {
                            ?>
                            <p class="small" style=" color: crimson">Введите корректный адрес электронной почты</p>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="passwordField" class="form-label">Пароль</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               id="passwordField">
                        <?php
                        if (!isset($fields['password']) && $error) {
                            ?>
                            <p class="small" style=" color: crimson">Пароль должен быть не менее 6 символов и содержать
                                одну цифру и латинские буквы в верхнем и нижнем регистре</p>
                            <?php
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Войти</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>