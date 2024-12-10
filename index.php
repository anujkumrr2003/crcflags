<?php
// include 'config.php';

// // Check if 'blog' is set in the URL
// if (isset($_GET['blog'])) {
//     $blog = $_GET['blog'];

//     // Prepare and execute the SQL statement using the blog
//     $stmt = $conn->prepare("SELECT * FROM content WHERE blog = ?");
//     $stmt->bind_param("s", $blog);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $record = $result->fetch_assoc();

//     // Check if the record exists
//     if ($record) {
?>
<!DOCTYPE html>
<html lang="en">
   
<head>




<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <link rel="stylesheet" href="bootstrap.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
      integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
      integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
   <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500&display=swap"
      rel="stylesheet">
   <link rel="stylesheet" href="style.css">
   <?php
include "config.php"; // Include database configuration file

// Query to fetch all records from meta_data table
$sql = "SELECT * FROM meta_data";
$result = $conn->query($sql);

// Check if there are records
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<title>" . htmlspecialchars($row['meta_title']) . "</title>";
        echo '<meta name="description" content="' . htmlspecialchars($row['meta_description']) . '">';
        echo '<meta name="keywords" content="' . htmlspecialchars($row['meta_keywords']) . '">';
    }
} else {
    echo "<title>No Meta Data Found</title>";
}
?>



   <!-- Google tag (gtag.js) -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16575568697"></script>
   <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() { dataLayer.push(arguments); }
      gtag('js', new Date());

      gtag('config', 'AW-16575568697');
   </script>


   <script type="text/javascript">
      (function (c, l, a, r, i, t, y) {
         c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments) };
         t = l.createElement(r); t.async = 1; t.src = "https://www.clarity.ms/tag/" + i;
         y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y);
      })(window, document, "clarity", "script", "kkl80mwvc8");
   </script>
</head>

<body>
   <style>
      .form-popup-bg {
         position: absolute;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         display: flex;
         flex-direction: column;
         align-content: center;
         justify-content: center;
      }

      .form-popup-bg {
         position: fixed;
         left: 0;
         top: 0;
         height: 100%;
         width: 100%;
         background-color: rgba(94, 110, 141, 0.9);
         opacity: 0;
         visibility: hidden;
         -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
         -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
         transition: opacity 0.3s 0s, visibility 0s 0.3s;
         overflow-y: auto;
         z-index: 10000;
      }

      .form-popup-bg.is-visible {
         opacity: 1;
         visibility: visible;
         -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
         -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
         transition: opacity 0.3s 0s, visibility 0s 0s;
      }

      .form-container {
         background-color: #ffffff;
         border-radius: 10px;
         box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
         display: flex;
         flex-direction: column;
         width: 100%;
         max-width: 646px;
         margin-left: auto;
         margin-right: auto;
         position: relative;
         padding: 16px;
         color: #000000;
      }

      .close-button {
         color: #000000;
         width: 40px;
         height: 40px;
         position: absolute;
         top: 18px;
         right: 12px;
         border: solid 2px #000;
         place-content: center;
         display: flex;
         align-items: center;
         z-index: 99;
      }

      .form-popup-bg:before {
         content: '';
         background-color: #fff;
         opacity: 0.25;
         position: absolute;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
      }

      .popup_form {
         width: 100%;
         padding: .375rem .75rem;
         font-size: 1rem;
         font-weight: 400;
         line-height: 1.5;
         background: none;
         border: 1px solid #000;
         outline: none;
      }

      .b-user-message {
         position: absolute;
         left: -5000px;
         text-indent: 100%;
         white-space: nowrap;
         overflow: hidden;
      }
   </style>



   <div class="modal fade form-popup-bg" id="enquireModal" tabindex="-1" aria-labelledby="enquireModalLabel"
      aria-hidden="true">
      <div class="form-container">
         <div class="modal-header border-0 p-0">
            <button class="btnCloseForm close-button">X</button>
         </div>

         <div class="row align-items-center">
            <div class="col-sm-6">
               <div class="img_frpm "> <img src="img/about_img (1).png" width="100%" alt=""> </div>
            </div>
            <div class="col-sm-6">
               <div class="form_text">

                  <h3 class="modal-title mb-3 fs-4" id="enquireModalLabel">CRC The Flagship Noida</h3>

                  <form method="post" action="" class="contact-form">
<style>

</style>
<div class="mb-4 position-relative">
                                 <!-- <input autocomplete="off" id="FIRSTNAME" name="name"
                                    class="form-control text_form"
                                    data-error="Name cannot contain digit or special character"
                                    placeholder="Your Full Name" pattern="[a-zA-Z ]{4,35}" required="">
                                    <span class="icon-inside"><i class="fas fa-user"></i></span>
                                 </div> -->

                  <input autocomplete="off" id="FIRSTNAME" name="name" style="margin-bottom:10px;"
                                    class="form-control text_form"
                                    data-error="Name cannot contain digit or special character"
                                    placeholder="Your Full Name" pattern="[a-zA-Z ]{4,35}"                                   
                                    required="">
                                    <span class="icon-inside"><i class="fas fa-user"></i></span>
</div>
<div class="mb-4 position-relative">
                                    <input autocomplete="off" id="EMAIL" name="email" style="margin-bottom:10px;"
                                    class="form-control text_form email-address"
                                    data-error="Name cannot contain digit or special character"
                                    placeholder="Email Address" pattern="\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+"
                                    required="">
                                    <span class="icon-inside"><i class="fas fa-envelope"></i></span>
</div>
<div class="mb-4 position-relative">
                                    <input autocomplete="off" type="text" id="PHONE" name="phone" style="margin-bottom:10px;"
                                    class="form-control text_form number-only" data-error="Phone is required"
                                    placeholder="Phone/Mobile" required=""
                                    pattern="[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}">
                                    <span class="icon-inside"><i class="fa-solid fa-phone"></i></span>

</div>
                   


                     <div class="col-lg-12 form-group">
                        <div class="advanced-button">
                           <button class="header_phone theme_button" id="SubmitQuerytop" type="submit"  name="save" >GET CALL
                              BACK</button>
                           <input autocomplete="off" id="PROJECT" name="PROJECT" maxlength="200" type="hidden"
                              value="CRC The Flagship Noida">
                           <input autocomplete="off" id="LOCATION" name="LOCATION" maxlength="200" type="hidden"
                              value="Noida">
                           <input autocomplete="off" id="TEAM" name="TEAM" maxlength="200" type="hidden"
                              value="umikoindia">
                           <div class="form-group b-user-message">
                              <label class="control-label" for="USER_MESSAGE">&nbsp;</label>
                              <input id="USER_MESSAGE" type="text" name="USER_MESSAGE" tabindex="-1" value=""
                                 autocomplete="off" />
                               
                           </div>
                        </div>
                     </div>
                     <div class="form-response"></div>

                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   
   
   
   
   
   
   
   <!-- ===========================btn sticky icon start================================== -->
   <div class="sticky_icon">
      <div class="social_icon">
         <ul class="d-flex">
            <div class="col-4">
               <li><a href="tel:+91-6364884022">Phone</a></li>
            </div>
            <div class="col-4">
               <li><a href="https://api.whatsapp.com/send?phone=+919910111300 &amp;text=Hello, CRC The Flagship Noida Get in touch with me my name is"
                     target="_blank" class="fixed-Whatsapp">Whatsapp</a></li>
            </div>
            <div class="col-4 border-0">
               <li><a class="btnOpenForm" href="#">Enquire</a></li>
            </div>
         </ul>
      </div>
   </div>
   <!-- ===========================btn sticky icon end================================== -->





   <!-- modal popup on restart -->
   <div class="modal fade madal-reload" id="exampleModal" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">

               <button type="button" class="close btan_g" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body ">

               <div class="row pt-2 align-items-center">
                  <div class="col-sm-6">
                     <div class="modal_form_img mb-4 mb-lg-0">

                        <img src="img/about_img1.png" width="100%" alt="">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form_modal text-center">
                        <div class="motal_form_text pb-2">
                           <h5 class="modal-title" id="exampleModalLabel">CRC The Flagship</h5>
                           <h4><span><i class="fa-solid fa-location-dot me-2 pb-2"></i></span>At Sector-140A, Noida
                           </h4>
                           <p class="mb-1 pt-2 mb-2 mt-1"><b> Type : </b>Retail Shops, Food Court & Office Space </p>

                        </div>
                        <?php
// Include the database connection
// include 'config.php';

// // Check if the form is submitted
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
//     // Sanitize input data to prevent SQL injection
//     $name = $conn->real_escape_string($_POST['name']);
//     $email = $conn->real_escape_string($_POST['email']);
//     $phone = $conn->real_escape_string($_POST['phone']);

//     // Prepare the SQL INSERT statement
//     $stmt = $conn->prepare("INSERT INTO enquiry (name, email, phone) VALUES (?, ?, ?)");

//     // Check if the statement is prepared successfully
//     if ($stmt === false) {
//         echo "Error preparing the statement: " . $conn->error;
//         exit;
//     }

//     // Bind parameters to the statement (data types: s for string)
//     if (!$stmt->bind_param("sss", $name, $email, $phone)) {
//         echo "Error binding parameters: " . $stmt->error;
//         exit;
//     }

//     // Execute the statement
//     if ($stmt->execute()) {
//         echo "<script>alert('New record created successfully'); window.location.href = 'index.php';</script>";
//     } else {
//         echo "Error executing query: " . $stmt->error;
//     }

//     // Close the prepared statement
//     $stmt->close();
// }

// // Close the database connection
// $conn->close();
?>


<form method="post" action="" class="contact-form banner_form pt-2">
    <div class="form_sectionr row text-center justify-content-center">
        <!-- Name Input Field -->
        <div class="mb-3 position-relative col-lg-12">
        <input autocomplete="off" id="FIRSTNAME" name="name"
                                    class="form-control text_form"
                                    data-error="Name cannot contain digit or special character"
                                    placeholder="Your Full Name" pattern="[a-zA-Z ]{4,35}" required="">
            <span class="icon-inside"><i class="fas fa-user"></i></span>
        </div>

        <!-- Email Input Field -->
        <div class="mb-3 position-relative col-lg-12">
        <input autocomplete="off" id="EMAIL" name="email"
                                    class="form-control text_form email-address"
                                    data-error="Name cannot contain digit or special character"
                                    placeholder="Email Address" pattern="\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+"
                                    required="">
            <span class="icon-inside"><i class="fas fa-envelope"></i></span>
        </div>

        <!-- Phone Input Field -->
        <div class="mb-3 position-relative col-lg-12">
        <input autocomplete="off" type="text" id="PHONE" name="phone"
                                    class="form-control text_form number-only" data-error="Phone is required"
                                    placeholder="Phone/Mobile" required=""
                                    pattern="[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}">
            <span class="icon-inside"><i class="fa-solid fa-phone"></i></span>
        </div>

        <!-- Submit Button -->
        <div class="col-lg-12 form-group">
            <div class="advanced-button">
                <button class="header_phone theme_button" id="SubmitQuerytop" type="submit" name="save">GET CALLBACK</button>
            </div>
        </div>
    </div>
</form>


                              <div class="form-response"></div>
                           </div>
                       



                     </div>
                  </div>

               </div>
            </div>


         </div>
      </div>
   </div>
   <!--  -->


   <!-- ==============btn scroll section start===================== -->
   <div class="go-top"> </div> <!-- ==============btn scroll section end===================== -->
   <!-- =====================header sart ======================== -->

   <!-- ======= fixed-tag======== -->
   <!-- <div class="fixed-tag d-none d-md-block">
      <img src="img/header_img.png" width="100%" alt="img">
   </div> -->
   <!-- ======= fixed-tag======== -->

   <header>


      <div class="header py-1 px-lg-5 px-2">
         <div class="container-xll mx-lg-5 mx-3 header_with">
            <div class="row align-items-center">
               <div class="col-lg-2  text-start">
                  <div class="logo d-flex"> <a class="logo_1" href="#"><img src="img/logo1.png" width="270"
                           alt="logo1"></a> </div>
               </div>
               <div class="col-lg-7">
                  <div class="menu float-end">
                     <ul class="d-lg-flex align-items-center">
                        <li><a class="active hamberger" href="#">Home</a></li>
                        <li> <a class="hamberger" href="#amenities"> Amenities</a></li>
                        <li> <a class="hamberger" href="#Price_list_jump">Price List</a></li>
                        <li><a class="hamberger" href="#floor_plan">Floor Plan</a></li>
                        <li><a class="hamberger" href="#gallery_jump">Gallery</a></li>
                        <li class="me-lg-5"><a class="hamberger" href="#location_jump">Location</a></li>


                     </ul>
                     <div class="hamberger">
                        <div class="mobilemenu"> </div>
                     </div>

                  </div>

               </div>

               <div class="col-lg-3">
                  <div class="contect-us float-end " style="float: right !important;">
                     <div class="d-flex ">
                        <ul class="d-flex me-2 align-items-center">
                           <li><a href="tel:+91-6364884022"><i class="fa fa-phone" aria-hidden="true"></i></a>
                           </li>
                           <li> <a href="tel:+91-6364884022"><span>+91-6364884022</span></a> </li>
                        </ul>
                     </div>
                  </div>
               </div>





            </div>
         </div>
      </div>

   </header> <!-- =========================header close ========================== -->

   <div class="banner_bg">
      <div class="banner">
         <div class="banner_img"> 
         <?php
include "config.php";

// Fetch the latest image
$image = null;
$result = $conn->query("SELECT home_image FROM image ORDER BY id DESC LIMIT 1");

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $image = $row['home_image']; // Assign the image path to $image
}
?>

<!-- Display current image -->
<?php if ($image): ?>
   
      
      

    


            
    <img src="http://localhost/crcflag/admin/<?php echo $image; ?>" alt="Uploaded Image" style="width:100%;" >

         <?php else: ?>
    
    <?php endif; ?>
            <div class="banner_text">
               <div class="container">
                  <div class="row align-items-center">

                     <div class="col-lg-8 col-md-6">
                        <div class="banner_wrapper_text me-lg-5 pe-lg-5">
                           <?php include'config.php'; ?>
                           <?php // Fetch Data
$sql = "SELECT id, plan_name, price, area, type FROM home_content";
$result = $conn->query($sql); ?>
<?php  if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
         echo "
         <h5>Welcome To</h5>
         <h1 class='mb-3 mt-2'>" . $row['plan_name'] . "</h1>
         <h6 class='mb-3'><span><i class='fa-solid fa-location-dot me-2'></i></span>" . $row['price'] . " Noida</h6>
         <h3 class='mb-2 col-lg-7'>" . $row['area'] . "</h3>
     
         <h4 class='mb-2 d-lg-none d-block'> 
             <a class='d-flex' href='tel:+91-6364884022'>
                 <span><i class='fa fa-phone' aria-hidden='true'></i></span>
                 <h3>+91-6364884022</h3>
             </a> 
         </h4>
     
         <div class='bgk'>
             <ul class='mt-3'>
                 <li class='d-flex text-white align-items-center'>
                     <h3 class=''>Starting Price</h3>
                     <p class='ms-3 me-3 fs-3'>" . $row['type'] . "<sub class='fs-5'> Onwards </sub></p>
                 </li>
             </ul>
         </div>";
     
        }
      }
                              ?>
                           

                           <div
                              class="banner_highlight p-2 mt-2 text-center text-center align-items-center justify-content-center d-flex">
                              <ul class="">
                                 <li
                                    class="text-center d-flex text-white justify-content-center align-items-center mb-1">
                                    <h3 class="">Assured Gift On Every Booking </h3>
                                 </li>
                                 <li
                                    class="text-center d-flex text-white justify-content-center align-items-center mb-1">
                                    <h3 class="">Free Gold Coin On Every Booking </h3>
                                 </li>

                              </ul>
                           </div>

                        </div>
                     </div>



                     <div class="col-lg-4 mb-mobile mb-mobile col-md-6 d-none d-md-block">


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
                    $mail->setFrom($smtpEmail, 'CRC The Flagship');
                    $mail->addAddress($email);                          // Send to user email
                    $mail->addReplyTo($smtpEmail, 'CRC The Flagship Support'); 

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
                    $mail->Subject = 'New Lead Submission';
                    $mail->Body = "
                   <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                        <h3 style='color: #4CAF50; border-bottom: 2px solid #4CAF50; padding-bottom: 10px;'>New Lead Submission</h3>
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



                     <?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// // Include PHPMailer files
// require 'phpMailer/Exception.php';
// require 'phpMailer/PHPMailer.php';
// require 'phpMailer/SMTP.php';

// // Include database configuration
// include 'config.php';

// // Check if the form is submitted
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
//     // Sanitize input data to prevent SQL injection
//     $name = $conn->real_escape_string($_POST['name']);
//     $email = $conn->real_escape_string($_POST['email']);
//     $phone = $conn->real_escape_string($_POST['phone']);

//     // Prepare the SQL query to insert data into the 'enquiry' table
//     $sql = "INSERT INTO enquiry (name, email, phone) VALUES ('$name', '$email', '$phone')";

//     if ($conn->query($sql) === TRUE) {
//         // Data inserted successfully, proceed to send email
//         $mail = new PHPMailer(true);
//         try {
//             // Server settings
//             $mail->isSMTP();                                    // Use SMTP
//             $mail->Host       = 'smtp.gmail.com';               // Gmail SMTP server
//             $mail->SMTPAuth   = true;                           // Enable SMTP authentication
//             $mail->Username   = 'anujkumrr2003@gmail.com';      // Your email address
//             $mail->Password   = 'frjubpqvvdwgmnmb';             // Your app-specific password
//             $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use STARTTLS encryption
//             $mail->Port       = 587;

//             // Email settings
//             $mail->setFrom('anujkumrr2003@gmail.com', 'CRC The Flagship');
//             $mail->addAddress($email);
//             $mail->addReplyTo('anujkumrr2003@gmail.com', 'CRC The Flagship CrM Support');

//             // Attach PDF file for the user only
//                     $pdfPath = 'pdf.pdf'; // Replace with the actual file path
//                     if (file_exists($pdfPath)) {
//                         $mail->addAttachment($pdfPath, 'pdf.pdf'); // Attach the PDF file with optional renaming
//                     }

//            // Email content for the user
//         $mail->isHTML(true);
//         $mail->Subject = 'Thank You for Reaching Out ';
       
//         $mail->Body = "
        
//     <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
//         <h3 style='color: #4CAF50; border-bottom: 2px solid #4CAF50; padding-bottom: 10px;'>Thank You for Reaching Out to Us</h3>
      
//         <p style='margin: 20px 0; font-size: 1rem; color: #555;'>We appreciate your interest in our services. Our team will get back to you shortly with more details regarding your request.</p>
//         <p style='margin: 20px 0; font-size: 1rem; color: #555;'>
//             If you have any immediate questions, please feel free to reach out to our customer care team at 
//             <a href='tel:+916364884022' style='color: #4CAF50; text-decoration: none;'><strong>+91-636-488-4022</strong></a>.
//         </p>

//         <p style='margin-top: 20px; font-size: 0.9em; color: #666;'>Best regards,<br><strong style='color: #4CAF50;'>CRC The Flagship</strong></p>
//         <footer style='margin-top: 30px; font-size: 0.8em; color: #999; border-top: 1px solid #ddd; padding-top: 10px;'>
//             <p>This is an automated email. Please do not reply to this message.</p>
//         </footer>
//     </div>
   
// ";







//         // Send the email to the user
//         if (!$mail->send()) {
//          echo "<script>alert('Failed to send user email');</script>";
//      }
 
//      // Clear recipient addresses
//      $mail->clearAddresses();
//      $mail->clearAttachments();
 
//      // Email to your team (internal notification)
//      $mail->addAddress('anujkumrr2003@gmail.com'); // Your email
//      $mail->Subject = 'New Lead Submission';
//      $mail->Body = "
//      <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
//          <h3 style='color: #4CAF50; border-bottom: 2px solid #000; padding-bottom: 10px;'>New Lead Submission</h3>
//          <p style='margin: 10px 0;'><strong style='color: #555;'>First Name: </strong> {$name}</p>
        
//          <p style='margin: 10px 0;'><strong style='color: #555;'>Phone Number: </strong> {$phone}</p>
//          <p style='margin: 10px 0;'><strong style='color: #555;'>Email: </strong> {$email}</p>
//          <p style='margin-top: 20px; font-size: 0.9em; color: #666;'>This is an automated notification. Please do not reply to this email.</p>
//      </div>
//      ";
 
//      // Send the internal email
//      if ($mail->send()) {
//          echo "<script>alert('Form Submited Successfully');</script>";
//      }
//  } catch (Exception $e) {
//      echo "<script>alert('Error in sending email: " . $mail->ErrorInfo . "');</script>";
//  }
// }
// }
?>
                        <div class="Banner-form float-end">
                           <form method="post" action=""
                              class="contact-form banner_form">
                              <div class="form_section text-center">
                                 <h3 class="form_title mb-2">Schedule A Site Visit</h3>
                                 <p class="mb-4">Please fill out the form below, our expert will get back to you soon.
                                 </p>
                                 <div class="mb-4 position-relative">
                                 <input autocomplete="off" id="FIRSTNAME" name="name"
                                    class="form-control text_form"
                                    data-error="Name cannot contain digit or special character"
                                    placeholder="Your Full Name" pattern="[a-zA-Z ]{4,35}" required="">
                                    <span class="icon-inside"><i class="fas fa-user"></i></span>
                                 </div>
                                 <div class="mb-4 position-relative">
                                 <input autocomplete="off" id="EMAIL" name="email"
                                    class="form-control text_form email-address"
                                    data-error="Name cannot contain digit or special character"
                                    placeholder="Email Address" pattern="\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+"
                                    required="">
                                    <span class="icon-inside"><i class="fas fa-envelope"></i></span>
                                 </div>
                                 <div class="mb-4 position-relative">
                                 <input autocomplete="off" type="text" id="PHONE" name="phone"
                                    class="form-control text_form number-only" data-error="Phone is required"
                                    placeholder="Phone/Mobile" required=""
                                    pattern="[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}">
                                    <span class="icon-inside"><i class="fa-solid fa-phone"></i></span>
                                 </div>
                                 

                                 <div class="col-lg-12 form-group">
                                    <div class="advanced-button">
                                    <button type="submit" id="SubmitQuerytop" name="save">GET CALLBACK</button>
                                      
                                           
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-response"></div>
                              </div>
                           </form>

                        </div>
                     </div>



                  </div>
               </div>

            </div>
         </div>


      </div>

      <div class="scroll-down d-none d-md-block ">
         <a href="#about-sec" class="hero-5-scroll-wrap"></a>
      </div>
   </div>
   <!-- banner section closed -->
   <div class="form_bottom">
      <div class="col-lg-4 mb-mobile col-md-5 d-block d-md-none">
         <div class="Banner-form">
            <form method="post" action="" class="contact-form banner_form">
               <div class="form_section">
                  <div class="form_text text-center">
                     <h3 class="form_title mb-3"> Schedule A Site Visit </h3>
                     <p class="mb-4">Please fill out the form below, our expert will get back to you soon. </p>
                  </div>
                  <div class="mb-4 position-relative">
                     <input autocomplete="off" id="FIRSTNAME" name="FIRSTNAME" class="form-control text_form"
                        data-error="Name cannot contain digit or special character" placeholder="Your Full Name"
                        pattern="[a-zA-Z ]{4,35}" required="">
                     <span class="icon-inside"><i class="fas fa-user"></i></span>
                  </div>
                  <div class="mb-4 position-relative">
                     <input autocomplete="off" id="EMAIL" name="EMAIL" class="form-control text_form email-address"
                        data-error="Name cannot contain digit or special character" placeholder="Email Address"
                        pattern="\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+" required="">
                     <span class="icon-inside"><i class="fas fa-envelope"></i></span>
                  </div>
                  <div class="mb-4 position-relative">
                     <input autocomplete="off" type="text" id="PHONE" name="PHONE"
                        class="form-control text_form number-only" data-error="Phone is required"
                        placeholder="Phone/Mobile" required=""
                        pattern="[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}">
                     <span class="icon-inside"><i class="fa-solid fa-phone"></i></span>
                  </div>
                  <input autocomplete="off" id="DOMAIN" name="DOMAIN" maxlength="200" type="hidden"
                     value="">

                  <div class="col-lg-12 form-group">
                     <div class="advanced-button">
                        <button class="header_phone theme_button" id="SubmitQuerytop" type="submit" name="save">GET
                           CALL BACK</button>
                        <input autocomplete="off" id="PROJECT" name="PROJECT" maxlength="200" type="hidden"
                           value="CRC The Flagship Noida">
                        <input autocomplete=" off" id="LOCATION" name="LOCATION" maxlength="200" type="hidden"
                           value="Noida">
                        <input autocomplete="off" id="TEAM" name="TEAM" maxlength="200" type="hidden"
                           value="umikoindia">
                     </div>
                  </div>
                  <div class="form-response"></div>
               </div>
            </form>
         </div>
      </div>
   </div>




   <main>


      <!--================ from section end ============== -->
      <div class="about_bg" id="about-sec">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-lg-5 mb-lg-0 mb-5">
                  <div class="about_img">
                     <?php include "config.php"; ?>
                     <?php // Fetch Records
$result = $conn->query("SELECT * FROM project ORDER BY created_at DESC"); ?>
                  <?php while ($row = $result->fetch_assoc()): ?>
                     <!-- <img src="img/about_img.png" width="100%" alt="about"> -->
                     <img src="http://localhost/crcflag/admin/<?= htmlspecialchars($row['image_path']) ?>" width="100%" alt="Image">
                  </div>
               </div>
               <div class="col-lg-7 ">
                  <div class="about_text ms-lg-5 me-0">
                     <ul class="d-flex align-items-center">
                        <li>
                           <div class="line1"></div>
                        </li>

                        <li>
                           <h6 class="mx-1">Overveiw</h6>
                        </li>
                        <li>
                           <div class="line2"></div>
                        </li>
                     </ul>
                     <h2 class=""><?= htmlspecialchars($row['title']) ?></h2>
                     <h3 class="my-2"><?= htmlspecialchars($row['subtitle']) ?></h3>
                     <p class="mt-4 mb-4"><?= $row['description'] ?>
                     </p>
                     <?php endwhile; ?>

                     <div class="btan">
                     <a class="btnOpenForm" href="http://localhost/crcflag/pdf.pdf" download>Brochure</a>


                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!--====================== about bg =========== -->
      <div class="price_list_bg" id="Price_list_jump">
        
         <div class="price_list">
            <div class="container">
               <div class="col-lg-12 mb-5 text-center">
                  <ul class="d-flex text-center  justify-content-center align-items-center">
                     <li>
                        <div class="line1"></div>
                     </li>

                     <li>
                        <h6 class="mx-1">Our Price List </h6>
                     </li>
                     <li>
                        <div class="line2"></div>
                     </li>
                  </ul>
                  <h2>Price List</h2>
               </div>
               <!-- <div class="row justify-content-center"> -->


                  <!-- <div class="col-lg-4 col-md-6  mb-lg-0 mb-5"> -->
                  <?php
include "config.php";

// Fetch Data
$sql = "SELECT id, plan_name, price, area, type FROM plans";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='container' >";
    echo "<div class='row' > "; // Start the row for cards
    // Loop through the result set
    while ($row = $result->fetch_assoc()) {
        echo "
        <div class='col-md-4' >  <!-- 4 columns per card, 3 cards per row on medium screens -->
            <div class='car' style='border:2px solid #3BB24A; margin: 10px;'> <!-- Card with border -->
                <div class='card-body'>
                    <h3 class='card-title' style='text-align:center; color:#000; background-color:#fff; padding:10px;   border-top-left-radius: 10px;
    border-top-right-radius: 10px;'>" . $row['plan_name'] . "</h3>
                    <h3 class='my-3' style='text-align:center; color:#fff;'>₹ " . $row['price'] . "<sub style='font-size: 59%;'></sub></h3>
                    <ul class='list-unstyled'>
                        <li class='d-flex align-items-center text-center justify-content-center mb-3'>
                            <h5 class='mb-0' style='color:#fff;'><b>Area :</b></h5>
                            <p class='ms-3' style='color:#fff;'>" . $row['area'] . "</p>
                        </li>
                        <li class='d-flex align-items-center text-center justify-content-center'>
                            <h5 class='mb-0' style='color:#fff;'><b>Type :</b></h5>
                            <p class='ms-3' style='color:#fff;'>" . $row['type'] . "</p>
                        </li>
                    </ul>
                    <div class='btnOpenForm mb-4 mt-5'>
                        <a href='#' class='btn btn' style='margin-left:30%; background-color:#3BB24A; color:#fff;'>Request A Call</a>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
    echo "</div>"; // Close the row
    echo "</div>"; // Close the container
} else {
    echo "No plans found.";
}

$conn->close();
?>

<style>
   .car {
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
}

.card-body {
    padding: 0px; /* Adds padding inside each card */
}

.card-title {
    font-size: 1.5rem; /* Adjusts the title size */
    font-weight: bold;
    color: #333;
}

.btnOpenForm a {
    text-decoration: none;
}

</style>

                     
                     <!-- <div class="price_list_box me-lg-3 text-center"> -->
                    

                        
                        <!-- <div class="price_list_high "> -->
                        
                        



                  <!-- <div class="col-lg-4 col-md-6  mb-lg-0 mb-5">
                     <div class="price_list_box me-lg-3 text-center">
                        <div class="price_list_high ">
                           <h3>Plans And Pricing</h3>
                        </div>
                        <div class="Price_list_text">
                           <h3 class="my-3">₹ On Request <sub style="font-size: 59%;"></sub></h3>
                           <ul>
                              <li class="d-flex align-items-center text-center justify-content-center mb-3">
                                 <h5 class="mb-0"><b>Area :</b></h5>
                                 <p class="ms-3">On Request </p>
                              </li>
                              <li class="d-flex align-items-center text-center justify-content-center">
                                 <h5 class="mb-0"><b>Type :</b></h5>
                                 <p class="ms-3">Retail Shops</p>
                              </li>
                           </ul>
                        </div>
                        <div class="btan btnOpenForm mb-4 mt-5"> <a href="#">Request A Call</a> </div>
                     </div>
                  </div> -->




               </div>
            </div>
         </div>
      </div>


      <div class="amenities_bg" id="amenities">
         <div class="amenities_main mx-lg-5 mx-3">
            <div class=" container-xll">
               <div class="col-lg-12 mb-5 text-center ">
                  <ul class="d-flex align-items-center justify-content-center">
                     <li>
                        <div class="line1"></div>
                     </li>
                     <li>
                        <h6 class="mx-2">Overview </h6>
                     </li>
                     <li>
                        <div class="line2"></div>
                     </li>

                  </ul>
                  <h2 class="mt-2">Features &amp; Amenities</h2>
               </div>
               <div class="row">


                  <?php include 'config.php'; ?>
<?php
// Fetch records
$result = $conn->query("SELECT * FROM items");
?>
<div class="row">
   <?php while ($row = $result->fetch_assoc()) { ?>
      <!-- Each item is displayed in a grid column -->
      <div class="col-lg-3 mb-4 col-md-6">
         <div class="amenities_box">
            <img src="http://localhost/crcflag/admin/img/<?php echo $row['image']; ?>" width="100%" height="220" alt="">
            <div class="overlay_text p-2">
               <h4 class="pt-2"><?php echo $row['name']; ?></h4>
            </div>
         </div>
      </div>
   <?php } ?>
</div>


                 <!--<div class="col-lg-3  mb-4 col-md-6">
                     <div class="amenities_box">
                        <img src="img/amenities_2.png" width="100%" alt="">
                        <div class="overlay_text p-2">
                           <h4 class="pt-2">EV Charging Point </h4>
                        </div>
                     </div>
                  </div>

                  <div class="col-lg-3  mb-4 col-md-6">
                     <div class="amenities_box">
                        <img src="img/amenities_3.png" width="100%" alt="">
                        <div class="overlay_text p-2">
                           <h4 class="pt-2">CCTV Surveillance </h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3  mb-4 col-md-6">
                     <div class="amenities_box">
                        <img src="img/amenities_4.png" width="100%" alt="">
                        <div class="overlay_text p-2">
                           <h4 class="pt-2">24X7 Security</h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3  mb-4 col-md-6">
                     <div class="amenities_box">
                        <img src="banner_bg.png" width="100%" alt="">
                        <div class="overlay_text p-2">
                           <h4 class="pt-2">Internet / Wi-Fi Connectivity</h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3  mb-4 col-md-6">
                     <div class="amenities_box">
                        <img src="banner_bg.png" width="100%" alt="">
                        <div class="overlay_text p-2">
                           <h4 class="pt-2">3 Levels Parking Space</h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3  mb-4 col-md-6">
                     <div class="amenities_box">
                        <img src="banner_bg.png" width="100%" alt="">
                        <div class="overlay_text p-2">
                           <h4 class="pt-2">Smoking Zone</h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3  mb-4 col-md-6">
                     <div class="amenities_box">
                        <img src="banner_bg.png" width="100%" alt="">
                        <div class="overlay_text p-2">
                           <h4 class="pt-2">Pharmacy</h4>
                        </div>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>





      <!--=========== gallery section start =========== -->

   
  
      <div class="gallery_bg" id="gallery_jump">
         <div class="gallery mx-lg-5 mx-3">
            <div class=" container-xll">
               <div class="col-lg-12 mb-5 text-center">
                  <ul class="d-flex text-center  justify-content-center align-items-center">
                     <li>
                        <div class="line1"></div>
                     </li>

                     <li>
                        <h6 class="mx-1">Project Gallery</h6>
                     </li>
                     <li>
                        <div class="line2"></div>
                     </li>
                  </ul>
                  <h2>Gallery</h2>
               </div>
               <div class="row">
                  <div class="gallery_slider">
                     <?php include 'config.php'; ?>
                     <?php // Fetch records
$result = $conn->query("SELECT * FROM images");
?>
                  <?php while ($row = $result->fetch_assoc()) { ?>
                     <div class="col-lg-4 col-md-4 mb-4">

                        <div class="gallery_img"> <img src="http://localhost/crcflag/admin/img/<?php echo $row['image']; ?>" style="width:300px; height:200px;"
                              alt="project_overview_img">
                           <div class="overlay"> <a href="http://localhost/crcflag/admin/img/<?php echo $row['image']; ?>" data-fancybox="gallery" data-caption=""
                                 tabindex="0">SEE
                                 ALL GALLERY <span><i class="fa-solid fa-arrow-trend-up"></i></span></a>
                           </div>
                        </div>
                     </div>
                     <?php } ?>

                     <!-- <div class="col-lg-4 col-md-4 mb-4">

                        <div class="gallery_img"> <img src="img/gallery_img2.png" width="100%" height="100%"
                              alt="project_overview_img">
                           <div class="overlay"> <a href="img/gallery_img2.png" data-fancybox="gallery" data-caption=""
                                 tabindex="0">SEE
                                 ALL GALLERY <span><i class="fa-solid fa-arrow-trend-up"></i></span></a>
                           </div>
                        </div>
                     </div> -->
                     <!-- <div class="col-lg-4 col-md-4 mb-4">

                        <div class="gallery_img"> <img src="img/gallery_img3.png" width="100%" height="100%"
                              alt="project_overview_img">
                           <div class="overlay"> <a href="img/gallery_img3.png" data-fancybox="gallery" data-caption=""
                                 tabindex="0">SEE
                                 ALL GALLERY <span><i class="fa-solid fa-arrow-trend-up"></i></span></a>
                           </div>
                        </div>
                     </div> -->
                     <!-- <div class="col-lg-4 col-md-4 mb-4">

                        <div class="gallery_img"> <img src="img/gallery_img4.png" width="100%" height="100%"
                              alt="project_overview_img">
                           <div class="overlay">
                              <a href="img/gallery_img4.png" data-fancybox="gallery" data-caption="" tabindex="0">SEE
                                 ALL GALLERY <span><i class="fa-solid fa-arrow-trend-up"></i></span></a>
                           </div>
                        </div>
                     </div> -->
                     <!-- <div class="col-lg-4 col-md-4 mb-4">

                        <div class="gallery_img"> <img src="img/gallery_img5.png" width="100%" height="100%"
                              alt="project_overview_img">
                           <div class="overlay"> <a href="img/gallery_img5.png" data-fancybox="gallery" data-caption=""
                                 tabindex="0">SEE
                                 ALL GALLERY <span><i class="fa-solid fa-arrow-trend-up"></i></span></a>
                           </div>
                        </div>
                     </div> -->





                  </div>
               </div>
            </div>
         </div>
      </div>



      <!-- =========== gallery section end ===========  -->



      <!-- ========= floor plan section design ====================== -->

      <div class="floor_plan" id="floor_plan">

         <div class="container">
            <div class="col-lg-12 mb-5 text-center">
               <ul class="d-flex text-center  justify-content-center align-items-center">
                  <li>
                     <div class="line1"></div>
                  </li>

                  <li>
                     <h6 class="mx-1">Side & Floor Plan </h6>
                  </li>
                  <li>
                     <div class="line2"></div>
                  </li>
               </ul>

               <h2>Floor Plan</h2>
            </div>
            <div class="row justify-content-center align-items-center">


               <div class="col-lg-6 col-md-6">
                  <div data-aos="fade-up" class="aos-init aos-animate">
                     <div class="floor_plan_box mb-4">
                        <div class="floor_plan_img">
                           <img src="img/floor-plan-img1.png" width="100%" height="620" alt="floor_plan_img">

                           <div class="overlay">
                              <h5><b>Master Plan</b></h5>
                              <a class="btan btnOpenForm" href="#">View Plan<i
                                    class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>



               <div class="col-lg-4 col-md-6">
                  <div class="row">
                     <div class="col-lg-12">
                        <div data-aos="fade-up" class="aos-init aos-animate">
                           <div class="floor_plan_box">
                              <div class="floor_plan_img mb-4">
                                 <img src="img/floor-plan-img2.png" width="100%" height="300" alt="floor_plan_img">

                                 <div class="overlay">
                                    <h5><b>Office Space</b></h5>
                                    <a class="btan btnOpenForm" href="#">View Plan<i
                                          class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div data-aos="fade-up" class="aos-init aos-animate">
                           <div class="floor_plan_box">
                              <div class="floor_plan_img mb-4">
                                 <img src="img/floor-plan-img2 (1).png" width="100%" height="300" alt="floor_plan_img">

                                 <div class="overlay">
                                    <h5><b>Retail Space</b></h5>
                                    <a class="btan btnOpenForm" href="#">View Plan<i
                                          class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>

                  </div>

               </div>







            </div>
         </div>
      </div>

      <!-- ========= floor plan section design ====================== -->





      <!--============ highlight section design ============= -->
      <div class="highlight_bg">
         <div class="highlight">
            <div class="container">
               <div class="col-lg-12 mb-5 text-center">
                  <ul class="d-flex text-center  justify-content-center align-items-center">
                     <li>
                        <div class="line1"></div>
                     </li>

                     <li>
                        <h6 class="mx-1">Highlights </h6>
                     </li>
                     <li>
                        <div class="line2"></div>
                     </li>
                  </ul>
                  <h2>Project Highlights</h2>
               </div>
               <div class="row align-items-center">
    <?php
    include 'config.php';
    $result = $conn->query("SELECT * FROM text_entries ORDER BY id DESC");

    if ($result->num_rows > 0) {
        $counter = 0; // Initialize a counter to alternate columns
        while ($row = $result->fetch_assoc()) {
            if ($counter % 2 === 0) {
                // Left column
                echo "
                <div class='col-lg-6'>
                    <div class='highlight_text_high'>
                        <ul>
                            <li class='d-flex mb-3 ms-lg-4 align-items-center'>
                                <h4><i class='fa-solid fa-check-to-slot'></i></h4>
                                <p class='ms-3'>{$row['content']}</p>
                            </li>
                        </ul>
                    </div>
                </div>";
            } else {
                // Right column
                echo "
                <div class='col-lg-6'>
                    <div class='highlight_text_high'>
                        <ul>
                            <li class='d-flex mb-3 ms-lg-4 align-items-center'>
                                <h4><i class='fa-solid fa-check-to-slot'></i></h4>
                                <p class='ms-3'>{$row['content']}</p>
                            </li>
                        </ul>
                    </div>
                </div>";
            }
            $counter++; // Increment the counter
        }
    } else {
        echo "<p>No data available</p>";
    }
    ?>
</div>





            </div>
         </div>

      </div>


      <!--============ highlight section design ============= -->





      <div class="location_bg" id="location_jump">
         <div class="container">
            <div class="col-lg-12 mb-5">
               <ul class="d-flex align-items-center">
                  <li>
                     <div class="line1"></div>
                  </li>
                  <li>
                     <h6 class="mx-2">Overview </h6>
                  </li>
                  <li>
                     <div class="line2"></div>
                  </li>

               </ul>
               <h2 class="col-lg-6 mt-2">Exceptional Properties. Exceptional Clients.</h2>
            </div>
            <div class="row align-items-center">
               <div class="col-lg-5">
                  <div class="location_bg_text">
                     <?php include 'config.php'; ?>
                     <?php $result = $conn->query("SELECT * FROM exceptional "); ?>
                     <?php  if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "

                     <ul class=''>
                        <li class='d-flex align-items-center mb-3'>
                           <h4>{$row['number']}</h4>
                           <p class='ms-4'>{$row['content']}</p>
                        </li>
                        </ul>";
                        ?>
                        <?php }
                     }
                     ?>
                        <!-- <li class="d-flex align-items-center mb-3">
                           <h4>02</h4>
                           <p class="ms-4">Plot No. 1B, Sector 140A, Noida.
                           </p>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                           <h4>03</h4>
                           <p class="ms-4">Akshardham - 20 minutes Approximately.
                           </p>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                           <h4>04</h4>
                           <p class="ms-4">Sector 18 - 10 minutes Approximately.</p>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                           <h4>05</h4>
                           <p class="ms-4">20 min to Noida International Airport.</p>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                           <h4>06</h4>
                           <p class="ms-4">5 min away from Felix/Jaypee Hospital.</p>
                        </li>
                     </ul> -->
                  </div>
               </div>
               <div class="col-lg-7 mt-3 mt-lg-0">
                  <div class="location_img">
                     <a href="img/location_invest1.png" data-fancybox="group" data-caption="map">
                        <img src="img/location_invest1.png" width="100%">
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>








   </main>




   <footer>
      <div class="footer_bg" id="contectus">
         <div class="footer">
            <div class="container">
               <!-- <div class="col-lg-12 text-center mb-5"> <img src="img/logo1.png" width="150" alt=""> </div> -->
               <div class="row">
                  <div class="col-lg-7 col-md-6 mb-5">
                     <div class="footer_contant">
                        <?php include'config.php'; ?>
                        <?php $result = $conn->query("SELECT * FROM footer"); ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                          
                        <h3><?= htmlspecialchars($row['title']) ?></h3>
                        <p class="mb-3 mt-3 col-lg-10"><?= $row['description'] ?></p>

                        <div class="mt-4">
                           <!-- <img src="img/rera.png" width="90" alt=""> -->
                           <h4 style="font-size: 17px;" class="mt-2"><?= htmlspecialchars($row['subtitle']) ?></h4>
                        </div>
                        <?php endwhile; ?>
                        <div class="contact_us mt-5">
                           <ul class="d-flex align-items-center">
                              <li><a href="tel:+91-6364884022">
                                    <i class="fa-solid fa-phone-volume"></i></a></li>
                              <li class="ms-3">
                                 <p class="pb-1">Call Us Anytime</p> <a
                                    href="tel:+91-6364884022"><span>+91-6364884022</span></a>
                              </li>
                           </ul>

                        </div>

                        <!-- <img src="img/rera_img.png" width="90" height="90" alt="rera_img"> -->
                        <!-- <p class="mt-3" style="font-size: 14px;"> Project RERA No :-P52100030688| Agent Rera No
                           :
                           A51700000043 </p> -->
                     </div>
                  </div>



                  <div class="col-lg-5  col-md-6 mb-4">
                     <div class="contect-form">
                        <form method="post" action="" class="contact-form banner_form">
                           <div class="form_section">
                              <h3 class="form_title mb-5">Schedule A Site Visit</h3>

                              <div class="mb-4 position-relative">
                                 <input autocomplete="off" id="FIRSTNAME" name="name"
                                    class="form-control text_form"
                                    data-error="Name cannot contain digit or special character"
                                    placeholder="Your Full Name" pattern="[a-zA-Z ]{4,35}" required="">
                                 <span class="icon-inside"><i class="fas fa-user"></i></span>
                              </div>
                              <div class="mb-4 position-relative">
                                 <input autocomplete="off" id="EMAIL" name="email"
                                    class="form-control text_form email-address"
                                    data-error="Name cannot contain digit or special character"
                                    placeholder="Email Address" pattern="\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+"
                                    required="">
                                 <span class="icon-inside"><i class="fas fa-envelope"></i></span>
                              </div>
                              <div class="mb-4 position-relative">
                                 <input autocomplete="off" type="text" id="PHONE" name="phone"
                                    class="form-control text_form number-only" data-error="Phone is required"
                                    placeholder="Phone/Mobile" required=""
                                    pattern="[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}">
                                 <span class="icon-inside"><i class="fa-solid fa-phone"></i></span>
                              </div>
                              <input autocomplete="off" id="DOMAIN" name="DOMAIN" maxlength="200" type="hidden"
                                 value="">

                              <div class="col-lg-12 form-group">
                                 <div class="advanced-button">
                                    <button class="header_phone theme_button" id="SubmitQuerytop" type="submit" name="save">GET
                                       CALL BACK</button>
                                    <input autocomplete="off" id="PROJECT" name="PROJECT" maxlength="200" type="hidden"
                                       value="CRC The Flagship Noida">
                                    <input autocomplete=" off" id="LOCATION" name="LOCATION" maxlength="200"
                                       type="hidden" value="Noida ">
                                    <input autocomplete="off" id="TEAM" name="TEAM" maxlength="200" type="hidden"
                                       value="umikoindia">
                                    <div class="form-group b-user-message">
                                       <label class="control-label" for="USER_MESSAGE">&nbsp;</label>
                                       <input id="USER_MESSAGE" type="text" name="USER_MESSAGE" tabindex="-1" value=""
                                          autocomplete="off" />
                                        
                                    </div>
                                 </div>
                              </div>
                              <div class="form-response"></div>
                           </div>
                        </form>




                     </div>
                  </div>


               </div>
               <div class="footer_b mt-5">
                  <div class="col-sm-12 text-center box">
                     <p class="col-lg-11 information-web"><b> Disclaimer:</b> The content is for information purposes
                        only and does not constitute an offer to avail of any service. Prices mentioned are subject to
                        change without notice and properties mentioned are subject to availability. Images for
                        representation purposes only. This website is belong to authorized marketing partner Firstdoor
                        Realty LLP.
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="footer-bootom">
         <ul class="footermenu">
            <li>
               <p style="text-align: center;"><strong><a href="disclaimer.html" target="_blank"><span
                           style="color: #f8f8f8;">Privacy Policy</span></a>&nbsp;|&nbsp;<a href="disclaimer.html"
                        target="_blank"><span style="color: #f8f8f8;"></span></a> Digital Media Plann
                     by <a href="http://www.umikoweb.com/" target="_blank">Umiko Web</a> </strong> </p>
            </li>
         </ul>
      </div>
   </footer>



   <!-- ===============footer section start========================== -->





   <script src=" https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js "></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"
      integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"></script>


   <!-- <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script> -->
   <script src="main.js"></script>

   <script src="custom.js"></script>
   <script>
      function proprtyForm(titlehoem) {
         $('#prog550688').val(titlehoem);
         $('#enquireModalLabel').text(titlehoem);
         $('#enquireModal').modal('show');
      }


      $(document).ready(function () {
         setTimeout(() => {
            $('#newlaunchModal').modal('show')
         }, 1000);
      })
   </script>


</body>

</html>
