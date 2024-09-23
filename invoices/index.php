<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <title>Invoice App</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Invoice Calculator</span>
        </div>
    </nav>
    <div class="container bg-primary-subtle w-50 mt-3 p-3 rounded-3 border border-1 border-primary">
        <?php
            // Only perform logic if the form was submitted
            if (isset($_GET['invoiceDate']) && isset($_GET['expiryDate'])) {
                // Calculate time difference
                $yeardiff = substr(date($_GET['expiryDate']), 0, 4) - substr(date($_GET['invoiceDate']), 0, 4);
                $monthdiff = substr(date($_GET['expiryDate']), 5, 2) - substr(date($_GET['invoiceDate']), 5, 2);
                $daydiff = substr(date($_GET['expiryDate']), 8, 2) - substr(date($_GET['invoiceDate']), 8, 2);
                // Variables for displaying to user
                $absyear = abs($yeardiff);
                $absmonth = abs($monthdiff);
                $absday = abs($daydiff);
                
                // If all values are zero, the invoice is due this day. prompt warning
                if (!$yeardiff && !$monthdiff && !$daydiff) {
                    // Warn user
                    echo('
                        <h3 class="urgent">WARNING: Your invoice is due today</h3>
                    ');
                }
                // If any values were negative, the invoice has expired
                else if ($yeardiff < 0  || $monthdiff < 0 || $daydiff < 0) {
                    // Display that the invoice is expired
                    echo("
                        <h3 class=\"urgent\">ALERT: Your invoice has expired.</h3>\n
                        <p>Your invoice expired {$absyear} year(s), {$absmonth} month(s), and {$absday} day(s) ago.
                    ");
                }
                // Else, all values were positive and the invoice is not due yet
                else {
                    echo("
                        <h3>Your invoice is not due yet</h3>\n
                        <p>Your invoice will expire in {$absyear} year(s), {$absmonth} month(s), and {$absday} day(s).</p>
                    ");
                }
            }

            // Always include form
            include 'form.php';
        ?>
    </div>
</body>
</html>