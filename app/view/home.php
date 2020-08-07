<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title; ?></title>
        <link rel="stylesheet" href="<?= SITE_NAME.'public/style/style.css' ?>">
        <script src="https://kit.fontawesome.com/353c2a62b7.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <form>
            <h1>Escreva uma mensagem</h1>
            <textarea name="text" required id="text" cols="30" rows="10"></textarea>
            <div class="line">
                <p id="words"></p>
                <input type="submit" id="send_data" name="send_message" value="tweetar">
            </div>
        </form>
        <ul class="box"></ul>

        <!-- modal delete -->
        <div class="modal" data-id_modal="" id="modal">
            <div class="modal_box">
                <div class="header_modal">
                    <h1>Message</h1>
                </div>
                <div class="body_modal">
                    <span><i class="fas fa-exclamation-triangle"></i></span>
                    <p>Você tem certeza de que deseja deletar este item ?</p>
                </div>
                <div class="link_options">
                    <button class="cancel">CANCELAR</button>
                    <button class="delete">DELETAR</button>
                </div>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="<?= SITE_NAME.'public/js/functions.js' ?>"></script>
    </body>
</html>