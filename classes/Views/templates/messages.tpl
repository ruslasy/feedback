<!doctype html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <title>Форма обратной связи (Задание для теста)</title>
        <link rel="stylesheet" type="text/css" href="/resources/style/main.css">
        <script src="/resources/js/main.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    </head>
    <body>
        <div class="main_box">
            <div class="def_box content_box">
                <h1 class="h1_class">Обратная связь</h1>
                <input class="input_text" id="fio" placeholder="Введите ФИО"  type="text" name="fio">
                <input class="input_text" id="email" placeholder="Введите Email" type="text" name="phone">
                <textarea style="height:auto;" rows="10" class="input_text" id="message" placeholder="Введите сообщение" name="message"></textarea>
                <div class="box_bottom_form">
                    <button class="color blue button buttton_captcha" id="send_button" onclick="sendMessage()">Отправить</button>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div>

        <div class="main_box">
            <div class="def_box content_box">
                <h1 class="h1_class">Сообщения</h1>
                <div id="msgs">
                </div>
            </div>
        </div>
    </body>
</html>
