<body>

    <head>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Cookie|Raleway:300,700,400);

            * {
                box-sizing: border-box;
                font-size: 1em;
                margin: 0;
                padding: 0;
            }

            body {
                background: url('assets/bg/photo-1514903796-5d8b9bdc2092.jpg') center no-repeat;
                background-size: cover;
                color: #333;
                font-size: 18px;
                font-family: 'Raleway', sans-serif;
            }

            .container {
                border-radius: 0.5em;
                box-shadow: 0 0 1em 0 rgba(51, 51, 51, 0.25);
                display: block;
                max-width: 880px;
                overflow: hidden;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                padding: 2em;
                position: absolute;
                top: 50%;
                left: 50%;
                z-index: 1;
                width: 98%;
            }

            .container:before {
                /*background: url('http://tfgms.com/sandbox/dailyui/bg-1.jpg') center no-repeat;*/
                background-size: cover;
                content: '';
                -webkit-filter: blur(10px);
                filter: blur(10px);
                height: 100vh;
                position: absolute;
                top: 50%;
                left: 50%;
                z-index: -1;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                width: 100vw;
            }

            .container:after {
                background: rgba(255, 255, 255, 0.6);
                content: '';
                display: block;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
                width: 100%;
            }

            form button.submit {
                background: rgba(255, 255, 255, 0.25);
                border: 1px solid #333;
                line-height: 0.25em;
                padding: 1em 3em;
                -webkit-transition: all 0.25s;
                transition: all 0.25s;
                font-size: 36px;
            }

            form button:hover,
            form button:focus,
            form button:active,
            form button.loading {
                background: #333;
                color: #fff;
                outline: none;
            }

            form button.success {
                background: #27ae60;
                border-color: #27ae60;
                color: #fff;
            }

            @-webkit-keyframes spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }

            @keyframes spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }

            form button span.loading-spinner {
                -webkit-animation: spin 0.5s linear infinite;
                animation: spin 0.5s linear infinite;
                border: 2px solid #fff;
                border-top-color: transparent;
                border-radius: 50%;
                display: inline-block;
                height: 1em;
                width: 1em;
            }

            form label {
                border-bottom: 1px solid #333;
                display: block;
                font-size: 2.25em;
                margin-bottom: 0.5em;
                -webkit-transition: all 0.25s;
                transition: all 0.25s;
            }

            form label.col-one-half {
                float: left;
                width: 50%;
            }

            form label.col-one-half:nth-of-type(even) {
                border-left: 1px solid #333;
                padding-left: 0.25em;
            }

            form label input {
                background: none;
                border: none;
                line-height: 1em;
                font-weight: 300;
                padding: 0.125em 0.25em;
                width: 100%;
            }

            form label input:focus {
                outline: none;
            }

            form label input:-webkit-autofill {
                background-color: transparent !important;
            }

            form label span.label-text {
                display: block;
                font-size: 0.5em;
                font-weight: bold;
                padding-left: 0.5em;
                text-transform: uppercase;
                -webkit-transition: all 0.25s;
                transition: all 0.25s;
            }

            h1 {
                font-size: 3em;
                margin: 0 0 0.5em 0;
                text-align: center;
                font-family: 'Cookie', cursive;
            }

            h1 img {
                height: auto;
                margin: 0 auto;
                max-width: 240px;
                width: 100%;
            }

            html {
                font-size: 24px;
                height: 100%;
            }

            .text-center {
                text-align: center;
            }

            .item {
                background: transparent;
                border: none;
                width: 200px;
                padding-top: 10px;
            }
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
            <meta name="HandheldFriendly" content="true" />
        </style>
    </head>
    <?php
    include('controller.php');
    if (isset($_POST['submit'])) {
        insert($_POST);
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
            <center>
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
                                $budget += (int)$key[1];
                                $sold += (int)$key[2];
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
                    <tr>
                        <td>กำไร</td>
                        <td><b><?= $sold - $budget ?></b></td>
                    </tr>
                </table>
            </center>
        </div>
    </body>