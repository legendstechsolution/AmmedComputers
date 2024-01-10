<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["mail"];
    $phone = $_POST["phone"];
    $location = $_POST["location"];
    $subjectcontent=isset($_POST["subject"])?$_POST["subject"]:[];
    $messagecontent=isset($_POST["message"])?$_POST["message"]:[];
   $selectedServices = isset($_POST["service"]) ? $_POST["service"] : [];

// Get the selected products
$selectedProducts = isset($_POST["product"]) ? $_POST["product"] : [];
    
    // You can customize the recipient email address
    $recipient_email = "satheeshss2001@gmail.com";
    
    // Build the email message
    $subject = "Enquiry Form Submission";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Location: $location\n";
    
    // Include selected services
    $message .= "Selected Services:\n";
    foreach ($selectedServices as $service) {
        $message .= " - $service\n";
    }
    
    // Include selected products
    $message .= "Selected Products:\n";
    foreach ($selectedProducts as $product) {
        $message .= " - $product\n";
    }
    $message .= "subject: $messagecontent\n";
    $message .= "question: $subjectcontent\n";
    ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "587");
$bounce     = "satheeshss2001@gmail.com";
$headers    = "From:$recipient_email\r\nReturn-path:$bounce";
    // Send the email
    if (mail($recipient_email, $subject, $message,$headers)) {
        // Email sent successfully, now show a JavaScript alert
      
         // Replace "index.php" with the URL of your index page
        echo '<script>alert("Email sent successfully!");</script>';
         // Terminate script execution after the redirect
    } else {
        // Email sending failed, show a JavaScript alert
        echo '<script>alert("Email sending failed.");</script>';
    }
} else {
    // Redirect or display an error message if the request method is not POST
    echo "Invalid request method.";
}
?>