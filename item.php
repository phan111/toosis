<body>

    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <?php
    include('controller.php');
    if (isset($_POST['submit'])) {
        add_item($_POST);
    }
    ?>
    <body>
        <div class="container">
            <header>
                <h1>
                    <a href="#">
                        <img src="assets/logo/logo.png">
                    </a>
                </h1>
            </header>
            <h1 class="text-center">Items</h1>
            <form class="registration-form" method="post" action="#">
                <label class="col-one-half">
                    <span class="label-text">ชื่อสินค้า</span>
                    <input type="text" name="item">
                </label>
                <div class="text-center">
                    <button class="submit" name="submit">เพิ่มสินค้า</button>
                </div>
            </form>
            <hr>
            <br>
            <center>
                <?php $num = 1; ?>
                <table>
                    <?php foreach (get_item() as $key) : ?>
                        <tr>
                            <td><b><?= $num ?>.</b></td>
                            <td><b><?= $key[0] ?></b></td>
                        </tr>
                        <?php $num++; ?>
                    <?php endforeach; ?>
                </table>
            </center>
        </div>
    </body>