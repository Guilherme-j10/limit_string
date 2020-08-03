<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title; ?></title>
        <link rel="stylesheet" href="<?= SITE_NAME.'public/style/style.css' ?>">
    </head>
    <body>
        <form>
            <h1>Escreva uma mensagem</h1>
            <textarea name="text" id="text" cols="30" rows="10"></textarea>
            <div class="line">
                <p id="words"></p>
                <input type="submit" id="send_data" name="send_message" value="tweetar">
            </div>
        </form>
        <ul class="box"></ul>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="<?= SITE_NAME.'public/js/functions.js' ?>"></script>
    </body>
</html>