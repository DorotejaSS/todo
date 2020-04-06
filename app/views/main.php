<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../app/views/css/main2.css">
        <!-- <link rel="stylesheet" type="text/css" href="../app/views/css/util.css"> -->
        <!-- <link rel="stylesheet" type="text/css" href="../app/views/css/main.css"> -->
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <a class="navbar-brand" href="/todo/public/logout">Logout</a>
            </div>
        </nav>

        <div style="background-image: url('../app/views/images/bg-01.jpg'); background-size:cover">
            <?php $view_data = self::$view_data; ?>
            <form class="login100-form validate-form flex-sb flex-w" action="dashboard-update" method="post">
                <div class="col-3">
                    <label for="task">Task</label>
                    <input type="text" class="form-control"name="task">
                </div>
                <div class="priority">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="priority" id="exampleRadios1" value="low" checked>
                        <label class="form-check-label">
                            Low
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="priority" id="exampleRadios1" value="medium">
                        <label class="form-check-label">
                            Medium
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="priority" id="exampleRadios1" value="high">
                        <label class="form-check-label">
                            High
                        </label>
                    </div>
                </div>


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
                                $class_d = "form-check-input";
                            ?>

                                <div class="form-check task">
                                    <input <?=$class.$class_d?> type="checkbox" name="checkbox[]" value="<?=$value['id']?>" id="defaultCheck1">
                                    <label class="form-check-label" for="<?=$value['id']?>">
                                        <?=($value['done'] == true) ? '<del>'.$value['task'].'</del>' : $value['task'] ?>
                                    </label>
                                </div>


                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

                <input class="btn btn-danger" type="submit" name="delete" value="Delete">
                <input class="btn btn-success" type="submit" name="submit" value="Submit">

            </form>
        </div>
    </body>
</html>

