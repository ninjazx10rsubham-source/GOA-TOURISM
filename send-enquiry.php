<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $message = strip_tags(trim($_POST["message"]));

    // Validate
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        echo "Please fill all fields.";
        exit;
    }

    // Your email where enquiries will be sent
    $to = "your-email@example.com";  

    $subject = "New Enquiry from Goa Tourism Website";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$message\n";

    $headers = "From: $email";

    if (mail($to, $subject, $email_content, $headers)) {
        echo "<h3>Thank you! Your enquiry has been sent successfully.</h3>";
        echo "<a href='contact.html'>Go back to Contact Page</a>";
    } else {
        echo "Oops! Something went wrong, please try again later.";
    }

} else {
    echo "Invalid request.";
}
?>
