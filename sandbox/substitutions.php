<?php
namespace ascio\lib;
require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

use ascio\v3\AbstractMark;
use ascio\v3\Trademark;

$_substitutions = [
    ["name" => "TreatyOrStatuteMark","type" => "\\ascio\\v3\\TreatyOrStatuteMark"], 
    ["name" => "Trademark","type" => "\\ascio\\v3\\Trademark"], 
    ["name" => "CourtValidatedMark","type" => "\\ascio\\v3\\CourtValidatedMark"] 
];
/**
$mark = new AbstractMark();
foreach($mark->substitutions() as $name => $class) {
    echo $name.": ".$class."\n";
}
echo "subst:".$mark->substitutions()->isSubstituted()."\n";

*/

$mark = new Trademark();
foreach($mark->substitutions() as $name => $class) {
    echo $name.": ".$class."\n";
}
echo "subst:".$mark->substitutions()->isSubstituted()."\n";