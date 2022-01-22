<body>

    <head>
        <link rel="stylesheet" href="styles.css"> 
        <meta name='viewport'content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/><meta name="HandheldFriendly"content="true"/>
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
            <h1 class="text-center">Look Back</h1>
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