<?php

namespace ascio\base;

interface Rest {
    function get();
    function delete();
    function create();
    function update();
}