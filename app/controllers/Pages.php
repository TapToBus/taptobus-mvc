<?php


// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Pages extends Controller{
    public function __construct(){
        //
    }


    // landing page
    public function index(){
        $this->view('pages/index');
    }


    // terms & conditions page
    public function terms_conditions(){
        $this->view('pages/terms_conditions');
    }

    
    // contact us page
    public function contact_us(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             // initialize data
             $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'mobileNo' => $_POST['mobileNo'],
                'subject' => $_POST['subject'],
                'message' => $_POST['message'],
                'name_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'subject_err' => '',
                'message_err' => '' 
            ];

            
            // validate data
            
            // validate name
            if(! preg_match("/^[A-Za-z]+( [A-Za-z]+)*$/", $data['name']) || strlen($data['name']) < 3){
                $data['name_err'] = "A valid name is required";
            }

            // validate email
            if(! filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['email_err'] = "A valid email is required";
            }

            // validate mobile no
            if(! preg_match('/^[0-9]{10}+$/', $data['mobileNo'])){
                $data['mobileNo_err'] = 'A valid mobile no is required';
            }

            // validate subject
            if($data['subject'] == 'default'){
                $data['subject_err'] = 'Subject is required';
            }

            // validate message
            if(empty($data['message'])){
                $data['message_err'] = 'Message is required';
            }elseif(strlen($data['message']) < 10){
                $data['message_err'] = 'Message is too short';
            }


             // make sure errors are empty
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['mobileNo_err']) && empty($data['subject_err']) &&  empty($data['message_err'])){


                // start phpmailer -------------------------------

                //Load Composer's autoloader
                require APPROOT . '/phpmailer/vendor/autoload.php';

                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;              //Enable verbose debug output
                //$mail->SMTPDebug = 2;
                $mail->isSMTP();                                    //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';               //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                           //Enable SMTP authentication
                $mail->Username   = 'customer.taptobus@gmail.com';  //SMTP username
                $mail->Password   = 'osilodwfmkfjpouj';             //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    //Enable implicit TLS encryption
                //$mail->SMTPSecure = 'tls';
                $mail->Port       = 465;                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                //$mail->Port       = 587;

                //Recipients
                $mail->setFrom('customer.taptobus@gmail.com', $data['name']);
                $mail->addAddress('taptobus001@gmail.com', 'TapToBus Company');     //Add a recipient
                /*$mail->addAddress('ellen@example.com');                           //Name is optional
                $mail->addReplyTo('info@example.com', 'Information');
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');*/

                //Attachments
                /*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/    //Optional name

                //Content
                $mail->isHTML(true);                                    //Set email format to HTML
                $mail->Subject = 'TapToBus Contact us form: ' . $data['subject'];
                $mail->Body = '<p>' . $data['message'] . '</p><br><p>' . $data['name'] . '<br>' . $data['mobileNo'] . '<br>' . $data['email'] . '</p>' ;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if ($mail->send()) {
                    die('Message has been sent');
                } else {
                    die('Message could not be sent');
                }

                // end phpmailer ---------------------------------

            }else{
                // load view with errors
                $this->view('pages/contact_us', $data);
            }
        }else{
            // initialize default values
            $data = [
                'name' => '',
                'email' => '',
                'mobileNo' => '',
                'subject' => '',
                'message' => '',
                'name_err' => '',
                'email_err' => '',
                'mobileNo_err' => '',
                'subject_err' => '',
                'message_err' => ''
            ];

            // load the view with the default data
            $this->view('pages/contact_us', $data);
        }
    }
}