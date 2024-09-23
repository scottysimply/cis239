<!--
        author: scott
        date: 9/18/24
        document: functions.php
-->
<?php
    /**
     * Generates math-related facts in the form of an associative array.
     */
    function mathFacts() {
        $facts = [
            "Hyperoperations" => "Hyperoperations are the operations past standard addition, multiplication, and exponentiation.",
            "Floats" => "Floating point numbers are represented with accuracy of 2^n, while we use 10^n accuracy. This means that 1f + 1f != 2; it's actually slightly greater than 2.",
            "Interpolation" => "Interpolation is when discrete values are given smooth \"between\" values.",
            "Derivation" => "Deriving means to formulate a solution. Differentiation means to calculate the derivative of a function.",
            "Bezier" => "When 3 or more points are recursively interpolated, the result is a Bezier curve.",
        ];
        // Print pairs
        foreach ($facts as $key => $value) {
            echo("<h3>" . $key . "</h3>\n" . "<p>" . $value . "</p>\n");
        }
        // Return count
        return count($facts);
    }
    /**
     * Calculates the area of the rectangle with the provided width and height
     */
    function calculateArea($length, $width) {
        return $length * $width;
    }

?>