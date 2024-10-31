<?php

namespace ascio\dns\base;

interface Rest {
    function get();
    function delete();
    function create();
    function update();
}