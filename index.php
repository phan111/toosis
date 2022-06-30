<body>

    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <?php
    include('controller.php');
    if (isset($_POST['submit'])) {
        insert($_POST);
    }
    if (isset($_POST['rental_submit'])) {
        rental($_POST);
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
            <h1 class="text-center">Accounting</h1>
            <form class="registration-form" method="post" action="#">
                <label class="col-one-half">
                    <span class="label-text">สินค้า</span>
                    <select name="item" class="item">
                        <?php foreach (get_item() as $key) : ?>
                            <option value="<?= $key[0] ?>"><?= $key[0] ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="col-one-half">
                    <span class="label-text">ต้นทุน</span>
                    <input type="number" name="budget">
                </label>
                <label>
                    <span class="label-text">ขาย</span>
                    <input type="number" name="sold">
                </label>
                <label class="col-one-half">
                    <span class="label-text">จำนวน</span>
                    <input type="number" name="amount" step="1" value="1">
                </label>
                <div class="text-center">
                    <button class="submit" name="submit">บันทึก</button>
                </div>
                <input name="date" type="hidden" value="<?= today() ?>"><br>
            </form>
            <hr>
            <br>
            <form class="registration-form" method="post" action="#">
                <label class="col-one-half">
                    <span class="label-text">ค่าที่</span>
                    <input type="number" name="rental">
                </label>
                <div class="text-center">
                    <button class="submit" name="rental_submit">บันทึก</button>
                </div>
            </form>
            <br>
            <hr>
            <br>
            <center style="max-height:250px;overflow-y:scroll;">
                <table border="1" cellspacing="0" style="border-color:#fff;font-size:28px;background: rgba(255, 255, 255, 0.25);" width="90%">
                    <thead>
                        <tr>
                            <th>สินค้า</th>
                            <th>ต้นทุน</th>
                            <th>ขาย</th>
                            <th>จำนวน</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <?php
                        $budget = 0;
                        $sold = 0;
                        ?>
                        <?php foreach (read("A1229:E") as $key) : ?>
                            <?php if (isset($key[0]) && $key[4] == today()) : ?>
                                <?php
                                $budget += (int)$key[1]*(int)$key[3];
                                $sold += (int)$key[2]*(int)$key[3];
                                ?>
                                <tr>
                                    <td><?= $key[0] ?></td>
                                    <td><?= $key[1] ?></td>
                                    <td><?= $key[2] ?></td>
                                    <td><?= $key[3] ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br>
                <table style="font-size: 28px;background: rgba(255, 255, 255, 0.25);padding: 5px 25px;border-radius:5px;">
                    <tr>
                        <td>ต้นทุน</td>
                        <td><b><?= $budget ?></b></td>
                    </tr>
                    <tr>
                        <td>ขาย</td>
                        <td><b><?= $sold ?></b></td>
                    </tr>
                    <?php foreach (get_rental() as $key) : ?>
                        <?php if ($key[1] == today()) : ?>
                            <tr>
                                <td>ค่าที่</td>
                                <td><b><?= $key[0] ?></b></td>
                            </tr>
                            <tr>
                                <td>กำไร</td>
                                <td><b><?= $sold - $budget - $key[0] ?></b></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </center>
        </div>
    </body>
