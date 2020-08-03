<?php

    namespace app\controller;
    use app\core\CoreController;

    class HomeController extends CoreController
    {

        protected $model_msg;

        public function __construct()
        {
            $this->model_msg = $this->model('MsgModel');
        }

        public function home(Array $req, Array $res): void
        {
            $this->view('home', 'Tweet');
        }

        public function envio_dados(Array $req, Array $res): bool
        {
            $msg = $_POST['text'];

            if($this->model_msg->save_data($msg)){
                return true;
            }else{
                return false;
            }
        }

        public function select_data(Array $req, Array $res): void
        {   
            $dados = $this->model_msg->return_data();
            foreach($dados as $key){
                $data = $key["data"];
                $explode = explode(' ', $data);
                $horas = $explode[1];

                echo "
                    <li>
                        <span>Você disse: </span>
                        <p>".$key['msg']."</p>
                        <small>Data de envio: ".$horas."</small>
                    </li>
                ";
            }
        }

    }