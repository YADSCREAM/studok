<?php

/**
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
</style>
<body>
<h3>Добавить новый предмет</h3>
<form action="vendor/create.php" method="post">
    <p>Название предмета</p>
    <input type="text" name="title">
    <button type="submit">Добавить</button>
</form>
    <table>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Действие</th>
            <th>Действие</th>
        </tr>
		
		<form name="f1" method="post" action="search.php">
<input type="search" name="search_q"/></br>
</br>
<input type="submit" value="Поиск"/></br>
</form>

        <?php

            /*
             * Делаем выборку всех строк из таблицы "products"
             */

        /** @var TYPE_NAME $connect */
        $products = mysqli_query($connect, "SELECT * FROM `products`");

            /*
             * Преобразовываем полученные данные в нормальный массив
             */

            $products = mysqli_fetch_all($products);

            /*
             * Перебираем массив и рендерим HTML с данными из массива
             * Ключ 0 - id
             * Ключ 1 - title
             * Ключ 2 - price
             * Ключ 3 - description
             */
			 

            foreach ($products as $product) {
                ?>
                    <tr>
                        <td><?= $product[0] ?></td>
                        <td><a href="../crud/studing.php?product_id=<?= $product[0] ?>"><?= $product[1] ?></a></td>


                    
                        <td><a href="vendor/update.php?id=<?= $product[0] ?>">Изменить</a></td>
                        <td><a style="color: red;" href="vendor/delete.php?id=<?= $product[0] ?>">Удалить</a></td>
						
                    </tr>
					
                <?php
            }
        ?>
    </table>
</body>
</html>
