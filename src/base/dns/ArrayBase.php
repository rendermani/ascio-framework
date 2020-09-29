<?php

namespace ascio\base\dns;

class ArrayBase extends \ascio\base\ArrayBase implements \Iterator  {
    private $_position = 0;    
    private $_arrayProperty;
}