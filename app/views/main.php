<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
        .yellow + label {
            background-color: yellow;
            }
        .orange + label {
            background-color: orange;
            }
        .red + label {
            background-color: red;
            }
        </style>
    </head>
    <body>
        <h1>MAIN</h1>

        <form action="" method="post">
            <label for="task">new task: </label>
            <input type="text" name="task">
            <input type="checkbox" name="priority" value="low">
            <label for="priority"> Low </label>
            <input type="checkbox" name="priority" value="medium">
            <label for="priority"> Medium </label>
            <input type="checkbox" name="priority" value="high">
            <label for="priority"> High </label>
            <input type="submit" name="Submit" value="Submit">
        </form>

        <?php $view_data = self::$view_data; ?>

        <form action="" method="post">

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
                    <input <?=$class?> type="checkbox" name="task" value="<?=$value['id']?>"
                    <?php echo ($value['done'] == true) ? 'checked' : '' ?>>
                    <label for="<?=$value['id']?>"> <?=$value['task']?></label><br>

                <?php endforeach; ?>
            <?php endforeach; ?>

            <input type="submit" value="done">
        </form>

        <form action="/todo/public/logout" method="post">
            <input type="submit" value="Logout">
        </form>
    </body>
</html>
