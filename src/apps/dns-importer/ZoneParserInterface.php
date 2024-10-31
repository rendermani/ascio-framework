<?php
namespace ascio\dns\importer;

use ascio\dns\SOA;
use ascio\dns\Zone;

interface ZoneParserInterface {
    public function parse(?callable $function = null);
    public function getErrors(callable $function);
    public function parseZone(string $zoneDef) : Zone;
    public function setImporter(Importer $importer);
    public function getImporter() : Importer; 
    public function getSoa() : SOA;
}