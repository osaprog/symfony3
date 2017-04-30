<?php

namespace Writer;

class XmlWriter extends BaseWriter{

    public function handleData() {
        try{
        $xml = new \SimpleXMLElement('<root/>');
        array_walk_recursive($this->data, function($value, $key)use($xml) {
            $xml->addChild($key, htmlspecialchars($value));
        });
        $this->data = $xml->asXML();

        $this->headers->set('Content-Disposition', sprintf('attachment; filename="%s"', $this->fileName));
        if (!$this->headers->has('Content-Type')) {
            $this->headers->set('Content-Type', 'xml');
        }
        $this->setContent($this->data);
           return TRUE;
        }  catch (Exception $e){
            return FALSE;
        }
    }

}