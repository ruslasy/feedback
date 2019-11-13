<?php   
namespace Controllers\Api;

use Controllers\Controller as MainController;
use App\DataBase;
use Models\Model;
use App\App;
use Models\Message;
use JsonSchema\Validator;

class Controller extends MainController
{
    public function getMessages()
    {
        $model = new Message();
        header('Content-type: application/json');
        $json = $model->getMessagesJSON(); 
        die($json);
    }

    public function addMessage()
    {
        $json = json_decode(file_get_contents('php://input')); 
        header('Content-type: application/json');
        $jo = (object)[];
        $model = new Message();
        $validator = new Validator();
        $validator->validate(
            $json, (object) [
                "type"=>"object",
                "properties"=>(object)[
                    "fio"=>(object)[
                        "type"=>"string",
                        "minLength"=>5,
                        "maxLength"=>150
                    ],
                    "email"=>(object)[
                        "type"=>"string",
                        "minLength"=>10,
                        "maxLength"=>50
                    ],
                    "message"=>(object)[
                        "type"=>"string",
                        "minLength"=>40,
                        "maxLength"=>2000
                    ]
                ]
            ]);
        if (!$validator->isValid()) { 
            foreach ($validator->getErrors() as $error) {
                $err .= $error['property'].' : '.$error['message'];
            }         
            $jo->status = '0';
            $jo->e_m = 'Ошибка json \n'. $err;
            echo json_encode( $jo );
            return; 
        }
        $model->appendMessage($json->fio, $json->email, $json->message);
        $jo->status = 'ok';
        die(json_encode($jo));
    }
}
