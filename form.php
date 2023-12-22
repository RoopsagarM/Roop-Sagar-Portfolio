<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate the inputs (you may want to add more validation)
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Email recipient
    $to = "mangineni1411@gmail.com";

    // Email subject
    $subject = "New Contact Form Submission";

    // Email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message. Please try again later.";
    }

    // Redirect to index page
    header("Location: index.html");
    exit; // Ensure that no other code is executed after the redirection
} else {
    echo "Invalid request method.";
    exit;
}
?>
