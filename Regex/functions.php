<?php
    function validate($name, $pattern) {
        return preg_match_all($pattern, $name);
    }
?>