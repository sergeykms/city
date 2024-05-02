<?php
global $userTickets;
foreach ($userTickets as $ticket) {
    ?>
    <tr>
        <td>
            <img src="<?= $ticket['image'] ?>" width="200" alt="">
        </td>
        <td><?= $ticket['title'] ?></td>
        <td><?= $ticket['description'] ?></td>
        <td>
            <span class="badge rounded-pill"
                  style="color: <?= $ticket['text_color'] ?>; background: <?= $ticket['background_color'] ?>">
                <?= $ticket['status_name'] ?>
            </span>
        </td>
        <td>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    Действия
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Удалить</a></li>
                </ul>
            </div>
        </td>
    </tr>
    <?php
}
?>
