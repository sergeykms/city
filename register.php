<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $path = "/";
    header("Location:$path");
}

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
                Регистрация
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
                <form action="/actions/user/register.php"
                      method="post"
                      novalidate>
                    <div class="mb-3">
                        <label for="emailRegisterField" class="form-label">E-mail</label>
                        <input type="text"
                               class="form-control"
                               value="<?= isset($fields['email']) ? $fields['email'] : '' ?>"
                               id="emailRegisterField"
                               aria-describedby="emailHelp"
                               name="email">

                        <?php
                        if (!isset($fields['email']) && $error) {
                            ?>
                            <p class="small" style=" color: crimson">Введите корректный адрес электронной почты</p>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="fullNameField" class="form-label">ФИО</label>
                        <input type="text"
                               class="form-control"
                               value="<?= isset($fields['name']) ? $fields['name'] : '' ?>"
                               id="fullNameField"
                               aria-describedby="emailHelp"
                               name="name">
                        <?php
                        if (!isset($fields['name']) && $error) {
                            ?>
                            <p class="small" style=" color: crimson">Введите имя</p>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="dobField" class="form-label">Дата рождения</label>
                        <input type="date"
                               class="form-control"
                               value="<?= isset($fields['birthday']) ? $fields['birthday'] : '' ?>"
                               id="dobField"
                               aria-describedby="emailHelp"
                               name="birthday">
                        <?php
                        if (!isset($fields['birthday']) && $error) {
                            ?>
                            <p class="small" style=" color: crimson">Введите дату рождения</p>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="passwordRegisterField" class="form-label">Пароль</label>
                        <input type="password"
                               class="form-control"
                               id="passwordRegisterField"
                               name="password">
                        <?php
                        if (!isset($fields['password']) && $error) {
                            ?>
                            <p class="small" style=" color: crimson">Пароль должен быть не менее 6 символов и содержать
                                одну цифру и латинские буквы в верхнем и нижнем регистре</p>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="passwordConfirmField" class="form-label">Подтверждение пароля</label>
                        <input type="password"
                               class="form-control"
                               id="passwordConfirmField"
                               name="passwordConfirm">
                        <?php
                        if (!isset($fields['passwordConfirm']) && $error) {
                            ?>
                            <p class="small" style=" color: crimson">Введенные пароли не совпадают</p>
                            <?php
                        }
                        ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Создать аккаунт</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>