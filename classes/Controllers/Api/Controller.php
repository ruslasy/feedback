<?php   
namespace Controllers\Api;

use Controllers\Controller as MainController;
use App\DataBase;
use Models\Model;
use App\App;
use Models\Message;

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
        $json = json_decode(file_get_contents('php://input'),true);
        $jo = (object)[];
        $model = new Message();

        if (iconv_strlen((string)$json['fio'])<5 || iconv_strlen((string)$json['email'])<10 || iconv_strlen((string)$json['message'])<40)
        { //Проверка полей на длинну
            $jo->status = '0';
            $jo->e_m = 'Ошибка. Заполните поля';
            echo json_encode( $jo );
            return;
        }

        if (iconv_strlen((string)$json['fio'])>99 || iconv_strlen((string)$json['email'])>99 || iconv_strlen((string)$json['message'])>2000)
        { //Проверка полей на длинну
            $jo->status = '0';
            $jo->e_m = 'Ошибка. Поля слишком длинные.';
            echo json_encode( $jo );
            return;
        }
        $model->appendMessage($json);
        $jo->status = 'ok';
        header('Content-type: application/json');
        die(json_encode($jo));
    }
}
