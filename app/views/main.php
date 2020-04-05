<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../app/views/main.css">
        <title>Document</title>
        <style>
        .yellow + label {
            background-color: yellow;
            color: black;
            }
        .orange + label {
            background-color: orange;
            color:black;
            }
        .red + label {
            background-color: red;
            color:black;
            }
        </style>
    </head>
    <body>
        <h1>MAIN</h1>
        <?php $view_data = self::$view_data; ?>
            <form action="dashboard-update" method="post">
                <label for="task">new task: </label>
                <input type="text" name="task">
                <input type="checkbox" name="priority" value="low">
                <label for="priority"> Low </label>
                <input type="checkbox" name="priority" value="medium">
                <label for="priority"> Medium </label>
                <input type="checkbox" name="priority" value="high">
                <label for="priority"> High </label>
                <br>

                <?php

                if (!empty($view_data)) : ?>
                    <?php foreach ($view_data as $data) : ?>
                        <?php foreach ($data as $key => $value) : ?>
                            <?php if ($value['priority'] == 'low') {
									$class = 'class="yellow"';
								} elseif ($value['priority'] == 'medium') {
									$class = 'class="orange"';
								} elseif ($value['priority'] == 'high') {
									$class = 'class="red"';
								}
                            ?>

                            <input <?=$class?> type="checkbox" name="checkbox[]" value="<?=$value['id']?>">
                            <label for="<?=$value['id']?>"> <?=($value['done'] == true) ? '<del>'.$value['task'].'</del>' : $value['task'] ?></label><br>

                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endif; ?>


                <input type="submit" name="delete" value="Delete">
                <input type="submit" name="submit" value="Submit">

            </form>

        <form action="/todo/public/logout" method="post">
            <input type="submit" value="Logout">
        </form>
    </body>
</html>

