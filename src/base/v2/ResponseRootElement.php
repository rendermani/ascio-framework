<?php
namespace ascio\base\v2;

use ascio\base\BaseClass;

class ResponseRootElement extends BaseClass {
    public function getResponse() {
        $name = get_parent_class() . "Response";
        return $this->$name;
    }
    public function getObjects() {
        $parent = get_parent_class() . "Response";
        $out = [];
        foreach($this->_apiObjects as $key => $value) {
            if($key !== $parent) {
                $out = [$this->$key];
            }
        }
        return $out;
    }
    public function getObject($nr = 1) {
        $key = $this->_apiObjects[$nr];
        return $this->$key;
    }
}