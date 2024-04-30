<?php
$user = NULL;
if (isset($_SESSION['user']['name'])) {
    $user = $_SESSION['user']['name'];
}
?>

<header class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">City Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Заявки</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Мои заявки
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/add-ticket.php">Добавить</a></li>
                            <li><a class="dropdown-item" href="/my-tickets.php">Мои заявки <span
                                            class="badge bg-secondary">4</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/tickets-control.php" class="nav-link">Управление заявками</a>
                    </li>
                </ul>
                <div class="right-side d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <?= !$user ? 'Аккаунт' : $user ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                                <?php
                                if (!$user) {
                                ?>
                                <li>
                                    <form action="/login.php" method="post">
                                        <button class="dropdown-item">Вход</button>
                                    </form>
                                    <form action="/register.php" method="post">
                                        <button class="dropdown-item">Регистрация</button>
                                    </form>
                                    <?php
                                    } else {
                                        ?>
                                        <form action="/actions/user/logout.php" method="post">
                                            <button class="dropdown-item">Выход</button>
                                        </form>
                                        <?php
                                    }
                                    ?>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Поиск заявок"
                               aria-label="Поиск заявок">
                        <button class="btn btn-outline-success" type="submit">Поиск</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>
