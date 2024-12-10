<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

// Include database configuration
include 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    // Sanitize input data to prevent SQL injection
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
//    echo "erhfkerf";

    // Prepare the SQL query to insert data into the 'enquiry' table
    $sql = "INSERT INTO enquiry (name, email, phone) VALUES ('$name', '$email', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully, proceed to send email
        // Fetch email settings from 'emails' table
       
        $sqlFetch = "SELECT * FROM emails "; // Corrected to use $email
        // print_r($sqlFetch);
        $result = $conn->query($sqlFetch);
       
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $smtpEmail = $row['email12'];
            $smtpPassword = $row['password'];

            // Proceed to send email only if the smtpEmail and smtpPassword are fetched
            if (!empty($smtpEmail) && !empty($smtpPassword)) {
                $mail = new PHPMailer(true);
                try {
                    // Server settings
                    $mail->isSMTP();                                    // Use SMTP
                    $mail->Host       = 'smtp.gmail.com';               // Gmail SMTP server
                    $mail->SMTPAuth   = true;                           // Enable SMTP authentication
                    $mail->Username   = $smtpEmail;                     // Your email address
                    $mail->Password   = $smtpPassword;                  // Your app-specific password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use STARTTLS encryption
                    $mail->Port       = 587;

                    // Send email to the user
                    $mail->setFrom($smtpEmail, 'Team Bizto CrM');
                    $mail->addAddress($email);                          // Send to user email
                    $mail->addReplyTo($smtpEmail, 'Bizto CrM Support'); 

                    // Attach PDF file for the user only
                    $pdfPath = 'pdf.pdf'; // Replace with the actual file path
                    if (file_exists($pdfPath)) {
                        $mail->addAttachment($pdfPath, 'pdf.pdf'); // Attach the PDF file with optional renaming
                    }

                    // Email content for the user
                    $mail->isHTML(true);
                    $mail->Subject = 'Thank You for Reaching Out';
                    $mail->Body = "
                     <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                        <h3 style='color: #4CAF50; border-bottom: 2px solid #4CAF50; padding-bottom: 10px;'>Thank You for Reaching Out to Us</h3>
                        <p style='margin: 20px 0; font-size: 1rem; color: #555;'>We appreciate your interest in our services. Our team will get back to you shortly with more details regarding your request.</p>
                        <p style='margin: 20px 0; font-size: 1rem; color: #555;'>
                            If you have any immediate questions, please feel free to reach out to our customer care team at 
                            <a href='tel:+916364884022' style='color: #4CAF50; text-decoration: none;'><strong>+91-636-488-4022</strong></a>.
                        </p>
                        <p style='margin-top: 20px; font-size: 0.9em; color: #666;'>Best regards,<br><strong style='color: #4CAF50;'>CRC The Flagship</strong></p>
                        <footer style='margin-top: 30px; font-size: 0.8em; color: #999; border-top: 1px solid #ddd; padding-top: 10px;'>
                            <p>This is an automated email. Please do not reply to this message.</p>
                        </footer>
                    </div>
                    ";

                    // Send the email to the user
                    if (!$mail->send()) {
                        echo "<script>alert('Failed to send user email');</script>";
                    }

                    // Clear recipient addresses and attachments
                    $mail->clearAddresses();
                    $mail->clearAttachments(); // Ensure no attachments are carried over

                    // Send internal email to your team
                    $mail->addAddress($smtpEmail); // Internal team email
                    $mail->Subject = 'New Contact Form Submission';
                    $mail->Body = "
                   <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                        <h3 style='color: #4CAF50; border-bottom: 2px solid #4CAF50; padding-bottom: 10px;'>New Contact Form Submission</h3>
                        <p style='margin: 10px 0;'><strong style='color: #555;'>Name: </strong> {$name}</p>
                        <p style='margin: 10px 0;'><strong style='color: #555;'>Phone: </strong> {$phone}</p>
                        <p style='margin: 10px 0;'><strong style='color: #555;'>Email: </strong> {$email}</p>
                        <p style='margin-top: 20px; font-size: 0.9em; color: #666;'>This is an automated notification. Please do not reply to this email.</p>
                    </div>
                    ";

                    // Send internal email
                    if ($mail->send()) {
                        echo "<script>alert('Form Submitted Successfully');</script>";
                    }
                } catch (Exception $e) {
                    echo "<script>alert('Error in sending email: " . $mail->ErrorInfo . "');</script>";
                }
            }
        } else {
            echo "<script>alert('No email settings found for the provided email');</script>";
        }
    } else {
        echo "<script>alert('Error inserting data into the database');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>

<!-- Form to submit data -->
<form method="POST" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br><br>

    <label for="phone">Phone:</label>
    <input type="number" name="phone" required><br><br>

    <button type="submit" name="save">Save</button>
</form>

</body>
</html>
