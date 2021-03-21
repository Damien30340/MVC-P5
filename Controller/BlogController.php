<?php

/**
 * Class of application : HomeController extends BaseController.
 *
 * HomeController extends BaseController of Framework.
 * He puts in relation the manager and the view in associate with home page.
 *
 * @category Controller
 * @package  Framework
 * @author   Damien Gobert <contact@damiengobert.fr>
 */
class BlogController extends BaseController
{

    /**
     * The method show the view of Blog page.
     * 
     * @param  void
     * @return void
     */
    public function blog()
    {
        $this->view("blog");
    }

    public function contact()
    {
        $captcha = new Recaptcha('6LcvbYgaAAAAAN86QRv2hvTSN2Q1fynlTLKBIPux', '6LcvbYgaAAAAABPH50fMR0RRsPplxUJyfPUjv9tp');
        $this->addParam("captcha", $captcha);
        if (isset($this->profil) && $this->profil->getId() != 999) {
            $this->view("contact");
        } else {
            $this->view("contactOther");
        }
    }

    /**
     * The method sendMessage from contact page
     * 
     * @param  string $mail, $title, $content
     * @return void
     */
    public function sendMessage($mail, $title, $content)
    {
        $captcha = new Recaptcha('6LcvbYgaAAAAAN86QRv2hvTSN2Q1fynlTLKBIPux', '6LcvbYgaAAAAABPH50fMR0RRsPplxUJyfPUjv9tp');
        $this->addParam("captcha", $captcha);

        if (!isset($_POST['g-recaptcha-response']) || $captcha->isValid(filter_input_array($_POST['g-recaptcha-response']), filter_input_array($_SERVER['REMOTE_ADDR'])) === false) {
            $this->view("errorMessage");
        } else {
            $mail = htmlspecialchars($mail);
            $title = htmlspecialchars($title);
            $content = htmlspecialchars($content);

            // Create the email and send the message
            $to = 'contact@damiengobert.fr';
            $email_subject = "Contact Form damiengobert.fr : " . $mail;
            $email_body = "Vous avez reçu un nouveau message en provenance de votre formulaire.\n\n" . "Details :\n\nmail: " . $mail . "\n\nSujet : " . $title . "\n\nMessage:\n" . $content;
            $headers = "From: damiengobert.fr\n";
            $headers .= "Répondre à : " . $mail;
            mail($to, $email_subject, $email_body, $headers); 

            $this->addParam("title", $title);
            $this->addParam("content", $content);
            $this->view("sendMessage");
        }
    }
}
