<?php   

    namespace app\core;

    class CoreController
    {
        protected $view_namespace = 'app/view/';
        protected $model_namespace = 'app/model/';

        public function view(String $view, String $title, Array $dados = []): void
        {
            require_once $this->view_namespace.$view.'.php';
        }

        public function model(String $model): object
        {
            $separete = explode('/', $this->model_namespace);
            $set_use = implode('\\', $separete);

            require_once $this->model_namespace.$model.'.php';
            $class = $set_use.$model;
            return new $class;
        } 
    }