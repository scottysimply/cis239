<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Calculator</title>
</head>
<body>
    <?php
        // Include functions
        include 'functions.php';

        /**
         * Logic to run if the form was not submitted. Displays fun facts and form
         */
        function unsubmittedLogic() {
            $facts = funFacts();
            // display each album
            foreach ($facts as $album => $band) {
                echo($album . " by " . $band . "<br/>");
            }
            // line ending
            echo("<br/>");
            // Echo count
            echo("<br/>There were " . count($facts) . " albums to display");

            // Include form
            include 'form.php';
        }

        /**
         * Logic in the program to run if the form was submitted. Displays form results and the form
         */
        function submittedLogic($years, $loan, $interest) {
            // Sanitize the interest
            $numInterest = str_replace("%", "", $interest) / 100;
            // Get interest based on user input
            $total = interestPaid($years, $loan, $numInterest);
            // Display total and show values
            echo('Your loan was worth $' . $loan . ' over ' . $years . ' years, at a rate of ' . ($numInterest * 100) . "%.<br/>");
            echo('You should have paid $' . ($total) . ' by now');

            // Include form
            include 'form.php';
        }
        /**
         * Tries to get a key from $_GET if it exists. Returns null otherwise
         */
        function GETIfExists($key) {
            if (!isset($_GET[$key])) return null; // i love early return btw

            return $_GET[$key];
        }
    ?>
    <?php
        // Check if form was submitted
        $years = GETIfExists('carYears'); // Utilizes function i wrote to ensure that a value exists in $_GET
        $loan = GETIfExists('loanAmount');
        $interest = GETIfExists('interestAmount');
        if ($years != null && $loan != null && $interest != null) {
            submittedLogic($years, $loan, $interest); // Do submitted logic and use early return
            return;
        }
        // Otherwise, use the unsubmitted logic
        unsubmittedLogic();
    ?>
</body>
</html>