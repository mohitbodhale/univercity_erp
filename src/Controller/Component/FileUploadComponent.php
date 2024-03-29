<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Text;

class FileUploadComponent extends Component {

    public function upload($fileData, $destinationFolder) {
        $filename = Text::uuid() . '-' . $fileData['name'];
        $destination = WWW_ROOT . $destinationFolder . DS . $filename;

        if (move_uploaded_file($fileData['tmp_name'], $destination)) {
            return $filename;
        } else {
            return false;
        }
    }
} 
?>