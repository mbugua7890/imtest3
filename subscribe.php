<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email address from the form
    $email = htmlspecialchars(trim($_POST['email']));

    // Validate email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // File where the email addresses will be saved
        $file = 'subscribers.txt';

        // Check if the email already exists
        $subscribers = file($file, FILE_IGNORE_NEW_LINES);
        if (in_array($email, $subscribers)) {
            echo '<div class="message error">This email is already subscribed.</div>';
        } else {
            // Save the email to the file
            file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);
            echo '<div class="message success">Thank you for subscribing to our newsletter!</div>';
        }
    } else {
        echo '<div class="message error">Invalid email address.</div>';
    }
} else {
    echo '<div class="message error">Please submit the form.</div>';
}
?>
