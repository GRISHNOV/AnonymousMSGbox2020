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
            <script>
                function hide_request_button() {
                    document.getElementById('new_user_request').style.display = 'none';
                    var x = document.getElementById("processing_input").value;
                    document.getElementById("processing_indicator").innerHTML = x;
                    return true;
                }
            </script>
            <form action="registration_processor.php" method="GET" onsubmit="return hide_request_button();">
                <p align="center">Выберите конфигурацию:</p>
                Время жизни:
                <select name = "Time_to_destroy">
                    <option value = "2h" selected>2 часа</option>
                    <option value = "12h">12 часов</option>
                    <option value = "48h">48 часов</option>
                </select>
                <hr>
                <div id="processing_indicator" align="center">
                    <input type="hidden" id="processing_input" value="PROCESSING">
                </div>
                <input type="submit" value="Создать" id="new_user_request">
            </form>
        </div>
    </body>
</html>
