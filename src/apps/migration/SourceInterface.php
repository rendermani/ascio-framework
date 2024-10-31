<?php
namespace ascio\migration;

interface SourceInterface {
    public function get($id);
    public function exists($id);

}