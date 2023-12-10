<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate form data (add your own validation logic)
    if (empty($name) || empty($email) || empty($message)) {
        // Handle validation error
        echo "Please fill in all the required fields.";
    } else {
        // Process the form data
        $to = "imcomputersystemsCEO@outlook.com"; // Replace with your actual email address
        $subject = "New Contact Form Submission";
        $headers = "From: $email\r\nReply-To: $email";

        // Compose the email message
        $email_message = "Name: $name\n";
        $email_message .= "Email: $email\n\n";
        $email_message .= "Message:\n$message";

        // Send email
        if (mail($to, $subject, $email_message, $headers)) {
            // Email sent successfully
            echo "Thank you for your message! We will get back to you soon.";
        } else {
            // Failed to send email
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
} else {
    // Handle non-POST requests (optional)
    echo "Invalid request method.";
}
?>
