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
        if(isset($this->profil) && $this->profil->getId() != 999) {
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
        $msg = "E-mail: " . $mail . "<br>";
        $msg .= "Sujet: " . $title . "<br>";
        $msg .= "Content: " . $content . "<br>";

        $mailAdmin = "contact@damiengobert.fr";
        $subject = "Formulaire damiengobert.fr";

        $mailheaders = "FROM : Formulaire contact <br>";
        $mailheaders .= "Reply-To : " .$mail. "<br><br>";

        mail($mailAdmin, $subject, $msg, $mailheaders);

        $this->addParam("title", $title);
        $this->addParam("content", $content);
        $this->view("sendMessage");
    }
}
