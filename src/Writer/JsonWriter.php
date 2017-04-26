<?php
namespace Writer;

use Writer\BaseWriter;

class JsonWriter extends BaseWriter{

    public function handleData() {
        $this->setContent(json_encode($this->data));
    }

}