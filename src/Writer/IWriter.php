<?php

namespace Writer;

interface IWriter{
    
    public function generate(array $data, $fileName);
    
}