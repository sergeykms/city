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
        <div class="row">
            <h2 class="display-6 mb-3">Добавить заявку</h2>
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
        <div class="row">
            <form action="/actions/tickets/addTickets.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fullNameField" class="form-label">Тема заявки</label>
                    <input type="text"
                           name="title"
                           value="<?= isset($fields['title']) ? $fields['title'] : '' ?>"
                           class="form-control"
                           id="fullNameField"
                           aria-describedby="emailHelp">
                    <?php
                    if (!isset($fields['title']) && $error) {
                        ?>
                        <p class="small" style=" color: crimson">Поле не может быть пустым</p>
                        <?php
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="fullNameField" class="form-label">Изображение</label>
                    <input type="file"
                           name="image"
                           class="form-control"
                           id="fullNameField"
                           aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="dobField" class="form-label">Описание</label>
                    <textarea name="description"
                              rows="6"
                              class="form-control"
                              id="dobField"
                              aria-describedby="emailHelp"><?= isset($fields['description']) ? $fields['description'] : '' ?></textarea>
                    <?php
                    if (!isset($fields['description']) && $error) {
                        ?>
                        <p class="small" style=" color: crimson">Поле не может быть пустым</p>
                        <?php
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-primary">Добавить заявку</button>
            </form>
        </div>
    </div>
</section>
<?php require_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>