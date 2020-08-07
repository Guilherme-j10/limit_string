<?php

    use elevenstack\expressphp\Express as express;

    $app = new express();

    $app->type_aplication('web');
    $app->namespace('app/controller/');

    $app->get('/', 'HomeController:home');
    $app->post('/recived_data', 'HomeController:envio_dados');
    $app->post('/select', 'HomeController:select_data');
    $app->post('/delete_item', 'HomeController:delete_data');

    $app->error($app->getRoute_request(), function($res){
        $res['send']('página não encontrada');
    });