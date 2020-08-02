<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tweet</title>
        <style>
            *{
                margin: 0px;
                padding: 0px;
                outline: none;
                border: none;
                font-weight: normal;
                box-sizing: border-box;
            }

            body{
                display: flex;
                justify-content: center;
                align-items: center;
                font-family: Arial;
                min-height: 100vh;
                background-color: #ebebeb;
            }

            form{
                width: 50%;
                padding: 24px;
                border-radius: 5px;
                background-color: #1a63d9;
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items: flex-start;
            }

            form h1{
                color: #fff;
                font-size: 1em;
                margin-bottom: 10px;
            }

            form textarea{
                width: 100%;
                height: 120px;
                padding: 12px;
                resize: none;
                border-radius: 5px;
            }

            form .line {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
            }

            form p{
                margin: 15px 0px;
                color: #fff;
            }

            form input{
                background-color: #222;
                color: #fff;
                padding: 12px 24px;
                border-radius: 5px;
                margin-top: 15px;
                font-size: .9em;
                cursor: pointer;
                letter-spacing: .5px;
            }
        </style>
    </head>
    <body>
        <form>
            <h1>Escreva uma mensagem</h1>
            <textarea name="text" id="text" cols="30" rows="10"></textarea>
            <div class="line">
                <p id="words"></p>
                <input type="submit" value="tweetar">
            </div>
        </form>
        <script>
            function limit_string(size){
                let text = document.getElementById('text');
                let pe = document.getElementById('words');

                let size_words = size;
                let size_string = '';

                document.querySelector('body').addEventListener('keyup', (e) =>{
                    size_string = text.value
                    let left_words = size - size_string.length;

                    if(left_words < 0){
                        let arr_string = size_string.split('');
                        let positive_value = left_words * -1;

                        if(left_words < 0){
                            for (let i = 0; i < positive_value; i++) {
                                arr_string[(arr_string.length - 1) - i] = '';
                            }
                        }else{
                            arr_string[arr_string.length - 1] = '';
                        }

                        left_words = 0;

                        let new_value = arr_string.join('');
                        text.value = '';
                        text.value = new_value;
                    }

                    pe.innerHTML = 'Caracteres restantes: '+left_words;
                });

                pe.innerHTML = 'Caracteres restantes: '+size;
            }

            limit_string(240);
        </script>
    </body>
</html>