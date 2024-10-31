<?php

namespace ascio\v2\base;

interface Rest {
    function get();
    function delete();
    function create();
    function update();
}