<?php
namespace Writer;

use Writer\BaseWriter;

class JsonWriter extends BaseWriter{

    public function handleData() {
        try {
        $this->setContent(json_encode($this->data));
            return TRUE;
        }catch(Exception $e){
            return FALSE;
        }
    }

}