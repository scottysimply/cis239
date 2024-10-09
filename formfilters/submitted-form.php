<h3>Subscribed</h3>
<?php
    $name = filter_input(INPUT_POST, 'fullname');
    echo ('<p>Thank you for subscribing, ' . $name . '.</php>');
?>