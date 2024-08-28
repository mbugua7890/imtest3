<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set the recipient email address
        $to = "info@imcomputersystems.com"; // Replace with your email address

        // Set the email subject
        $subject = "New Contact Us Message from $name";

        // Build the email content
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers
        $headers = "From: $name <$email>";

        // Send the email
        if (mail($to, $subject, $email_content, $headers)) {
            // Redirect to a thank-you page (optional)
            header("Location: thank-you.html");
            exit;
            if ($success) {
                echo '<div class="message success">Thank you! Your message has been sent.</div>';
            } 
            
        } else {
            echo "Oops! Something went wrong, and we couldn't send your message.";
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Please submit the form.";
}
?>
