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

        $mail = htmlspecialchars($mail);
        $title = htmlspecialchars($title);
        $content = htmlspecialchars($content);

        // Create the email and send the message
        $to = 'contact@damiengobert.fr'; 
        $email_subject = "Contact Form damiengobert.fr : " .$mail;
        $email_body = "Vous avez reçu un nouveau message en provenance de votre formulaire.\n\n" . "Details :\n\nmail: ". $mail. "\n\nSujet : " .$title. "\n\nMessage:\n" .$content;
        $headers = "From: damiengobert.fr\n";
        $headers .= "Répondre à : " . $mail;
        mail($to, $email_subject, $email_body, $headers);
        return true;

        $this->addParam("title", $title);
        $this->addParam("content", $content);
        $this->view("sendMessage");
    }
}
