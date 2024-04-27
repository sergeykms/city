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
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="emailRegisterField" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="emailRegisterField" aria-describedby="emailHelp">
                        <div id="emailRegisterHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
                    </div>
                    <div class="mb-3">
                        <label for="fullNameField" class="form-label">ФИО</label>
                        <input type="text" class="form-control" id="fullNameField" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="dobField" class="form-label">Дата рождения</label>
                        <input type="datetime-local" class="form-control" id="dobField" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="passwordRegisterField" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="passwordRegisterField">
                    </div>
                    <div class="mb-3">
                        <label for="passwordConfirmField" class="form-label">Подтверждение пароля</label>
                        <input type="password" class="form-control" id="passwordConfirmField">
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