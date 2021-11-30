<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 00</title>         
    </head>
    <body>
        <table style="margin:auto; ">

            <tr>
                <td colspan="2" style="font-weight: bold; text-align: center; background-color: cyan">$_SERVER</td>
            </tr>
            <?php
            foreach ($_SERVER as $key => $value) {
                ?>
                <tr>
                    <td style="background-color:cyan;"><?php echo $key ?></td>
                    <td style="background-color:grey;"><?php echo $value ?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="2" style="font-weight: bold; text-align: center; background-color: cyan">$_GET</td>
            </tr>
            <?php
            foreach ($_GET as $key => $value) {
                ?>
                <tr>
                    <td style="background-color:cyan;"><?php echo $key ?></td>
                    <td style="background-color:grey;"><?php echo $value ?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="2" style="font-weight: bold; text-align: center; background-color: cyan">$_POST</td>
            </tr>
            <?php
            foreach ($_POST as $key => $value) {
                ?>
                <tr>
                    <td style="background-color:cyan;"><?php echo $key ?></td>
                    <td style="background-color:grey;"><?php echo $value ?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="2" style="font-weight: bold; text-align: center; background-color: cyan">$_FILES</td>
            </tr>
            <?php
            foreach ($_FILES as $key => $value) {
                ?>
                <tr>
                    <td style="background-color:cyan;"><?php echo $key ?></td>
                    <td style="background-color:grey;"><?php echo $value ?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="2" style="font-weight: bold; text-align: center; background-color: cyan">$_REQUEST</td>
            </tr>
            <?php
            foreach ($_REQUEST as $key => $value) {
                ?>
                <tr>
                    <td style="background-color:cyan;"><?php echo $key ?></td>
                    <td style="background-color:grey;"><?php echo $value ?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="2" style="font-weight: bold; text-align: center; background-color: cyan">$_SESSION</td>
            </tr>
            <?php
            if (isset($_SESSION)) {
                foreach ($_SESSION as $key => $value) {
                    ?>
                    <tr>
                        <td style="background-color:cyan;"><?php echo $key ?></td>
                        <td style="background-color:grey;"><?php echo $value ?></td>
                    </tr>
                    <?php
                }
            }
            ?>

            <tr>
                <td colspan="2" style="font-weight: bold; text-align: center; background-color: cyan">$_ENV</td>
            </tr>

            <?php
            foreach ($_ENV as $key => $value) {
                ?>
                <tr>
                    <td style="background-color:cyan;"><?php echo $key ?></td>
                    <td style="background-color:grey;"><?php echo $value ?></td>
                </tr>
                <?php
            }
            ?>


            <tr>
                <td colspan="2" style="font-weight: bold; text-align: center; background-color: cyan">$_COOKIE</td>
            </tr>
            <?php
            foreach ($_COOKIE as $key => $value) {
                ?>
                <tr>
                    <td style="background-color:cyan;"><?php echo $key ?></td>
                    <td style="background-color:gey;"><?php echo $value ?></td>
                </tr>
                <?php
            }
            ?>
        </table> 
        <?php
        phpinfo();
        ?>
    </body>
</html>