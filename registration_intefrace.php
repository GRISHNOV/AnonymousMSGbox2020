<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <script src="particles.min.js"></script>
        <title>registration</title>
    </head>
    <body class="registration_client_page">
    <div id="particles-js"></div>
        <script>
            particlesJS.load('particles-js', 'assets/particles.json', function() {
                console.log('callback - particles.js config loaded');
            });
        </script>
        <div class="registration_box">
            <form action="registration_processor.php" method="GET">
                <p align="center">Выберите конфигурацию:</p>
                Время жизни:
                <select name = "Time_to_destroy">
                    <option value = "2h" selected>2 часа</option>
                    <option value = "12h">12 часов</option>
                    <option value = "48h">48 часов</option>
                </select>
            </form>
            <?php?>
        </div>
    </body>
</html>
