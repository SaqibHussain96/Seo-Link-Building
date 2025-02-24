<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Basic validation (you should add more robust validation)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Please fill in all fields."; // Or redirect back to the form with an error message
        exit;
    }

    $to = "info@seolinkbuilding.site"; // Your email address
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n"; // Important for HTML emails
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; // Important for HTML emails


    $email_message = "<html><body>";
    $email_message .= "<h1>New Contact Form Submission</h1>";
    $email_message .= "<p><strong>Name:</strong> " . $name . "</p>";
    $email_message .= "<p><strong>Email:</strong> " . $email . "</p>";
    $email_message .= "<p><strong>Subject:</strong> " . $subject . "</p>";
    $email_message .= "<p><strong>Message:</strong> " . $message . "</p>";
    $email_message .= "</body></html>";



    if (mail($to, $subject, $email_message, $headers)) {
        echo "Thank you for your message. We will contact you shortly."; // Or redirect to a thank you page
    } else {
        echo "There was an error sending your message.";  // Or redirect back to the form with an error message
    }
}
?>