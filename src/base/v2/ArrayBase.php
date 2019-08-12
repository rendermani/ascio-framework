<?php

namespace ascio\base\v2;

class ArrayBase extends \ascio\base\ArrayBase implements \Iterator  {
    private $_position = 0;    
    private $_arrayProperty;
}