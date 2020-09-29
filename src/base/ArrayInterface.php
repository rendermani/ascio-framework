<?php
namespace ascio\base;

interface ArrayInterface {
    public function __construct();
    public function rewind();
    public function current();
    public function key();
    public function next();
    public function valid();
    public function push($value);
    public function pop();
    public function shift();
    public function first();
    public function last();
    public function index($nr);
    public function toArray();
    public function fromArray($array);    
    public function toJson();
    public function fromJson($json);
    public function getArrayKey();
    public function count() : int;
    public function init($parent=null);
    public function add ($args=null);
}