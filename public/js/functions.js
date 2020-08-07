const url = window.location.href;

function limit_string(size){
    let text = document.getElementById('text');
    let pe = document.getElementById('words');

    let size_words = size;
    let size_string = '';

    setInterval(() => {
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
    }, 1)

    pe.innerHTML = 'Caracteres restantes: '+size;
}

limit_string(100);

function send_data(way){
    let input_text = document.getElementById('text');
    let input = document.getElementById('send_data');

    document.querySelector('body').onload = () => {
        $.ajax({
            url: way+'select',
            type: "POST",
            success: (result) => {
                $(".box").html(result);
            },
            error: () => {
                $(".box").html('Error');
            }
        });
    };

    input.addEventListener('click', (e) =>{
        e.preventDefault();

        if(input_text.value == '' | input_text.value == ' '){
            alert('Por favor preencha o campos de texto');
        }else{
            $.ajax({
                url: way+'recived_data',
                type: "POST",
                data: "text="+input_text.value,
                dataType: "html"
            }).done((data) => {
                if(data != true){
                    $.ajax({
                        url: way+'select',
                        type: "POST",
                        success: (result) => {
                            $(".box").html(result);
                        },
                        error: () => {
                            $(".box").html('Error');
                        }
                    });
                }else{
                    alert('Não foi possivel enviar os dados');
                }
            }).fail((jqXHR, textStatus) => {
                console.log('erro ao enviar os dados | codestatus: '+textStatus);
            })
    
            input_text.value = '';
        }
    });
}

send_data(url);

function delete_itemModal(url){
    setInterval(() => {  //tenho que colocar em um set interval, por que sempre q adiciono ou deleto um item muda a ordem no array
        let delete_button = document.getElementsByClassName("delete_item");
        
        for(let i = 0; i < delete_button.length; i++){
            delete_button[i].addEventListener('click', () => {
                console.log('clicou no botao');
                let modal = document.querySelectorAll("#modal");
                let cancel = document.getElementsByClassName("cancel");
                let delete_item = document.getElementsByClassName("delete");

                for(let z = 0; z < modal.length; z++){
                    modal[z].style.display = 'flex';

                    let toggle = true;

                    for(let c = 0; c < cancel.length; c++){
                        cancel[c].addEventListener('click', () => {
                            if(toggle){
                                modal[z].style.display = 'none';
                            }

                            toggle = false;
                        })
                    }

                    for(let d = 0; d < delete_item.length; d++){
                        delete_item[d].addEventListener('click', () => {
                            if(toggle){
                                $.ajax({
                                    url: url+'delete_item',
                                    data: 'id_item='+delete_button[i].getAttribute('data-id'),
                                    type: 'POST',
                                    success: function(data){    
                                        if(data != true){
                                            $.ajax({
                                                url: url+'select',
                                                type: "POST",
                                                success: (result) => {
                                                    $(".box").html(result);
                                                },
                                                error: () => {
                                                    $(".box").html('Error');
                                                }
                                            });
                                        }else{
                                            console.log('deu ruim');
                                        }
                                    },
                                    error: function (){
                                        console.log('error');
                                    }
                                })
                            }

                            toggle = false;

                            modal[z].style.display = 'none';
                        })
                    }
                }
            })
        }
    }, 300)
}

delete_itemModal(url);