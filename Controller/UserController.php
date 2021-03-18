<?php

/**
 * Class of application : UserController extends BaseController
 *
 * UserController extends BaseController of Framework
 * He puts in relation the manager and the view in associate with users
 *
 * @category Controller
 * @package  Framework
 * @author   Damien Gobert <contact@damiengobert.fr>
 */
class UserController extends BaseController
{

    /**
     * The method show view Login
     * 
     * With condition if session exists and are not session visitor
     *
     * @param  void
     * @return void
     */
    public function viewLogin()
    {
        if ($_SESSION['user']->getId() != 999) {
            $this->view("loginOpen");
        } else {
            $this->view("login");
        }
    }

    /**
     * The method show view register
     * 
     * @param  void
     * @return void
     */
    public function viewRegister()
    {
        $this->view("register");
    }

    /**
     * The method show view Admin dashboard
     * 
     * Call the method countAdmin for display
     * view => ../Admin/dashboard for exit folder User and open Admin folder
     * If users add new comment, they are show in view
     *
     * @param  void
     * @return void
     */
    public function viewAdminDashboard()
    {
        $this->countAdmin();

        $this->listCommentsNoValid();
        $this->listUsers();
        $this->listPosts();
        $this->view("../Admin/dashboard");
    }
    /**
     * The method show view Admin list posts
     * 
     * Call the method countAdmin for display
     * view => ../Admin/posts for exit folder User and open Admin folder
     *
     * @param  void
     * @return void
     */
    public function viewAdminPosts()
    {
        $this->countAdmin();

        $this->listPosts();
        $this->view("../Admin/posts");
    }
    /**
     * The method show view Admin list users
     * 
     * Call the method countAdmin for display
     * view => ../Admin/users for exit folder User and open Admin folder
     *
     * @param  void
     * @return void
     */
    public function viewAdminUsers()
    {
        $this->countAdmin();

        $this->listUsers();
        $this->view("../Admin/users");
    }
    /**
     * The method show view Admin list comments
     * 
     * Call the method countAdmin for display
     * view => ../Admin/comments for exit folder User and open Admin folder
     *
     * @param  void
     * @return void
     */
    public function viewAdminComments()
    {
        $this->countAdmin();

        $this->listComments();
        $this->view("../Admin/comment");
    }
    /**
     * The method save the new user and show view associate
     * 
     * Call the method countAdmin for display
     * view => ../Admin/posts for exit folder User and open Admin folder
     * password hash with the method password_hash and control datas with htmlspecialchars
     *
     * @param  string, $mail, $password, $password2
     * @return void
     */
    public function register($mail, $password, $password2)
    {
        if (!empty($mail) && !empty($password)) {
            if ($password == $password2) {
                $userMail = htmlspecialchars($mail);
                $userPassword = htmlspecialchars($password);

                $hash = password_hash($userPassword, PASSWORD_DEFAULT);
                $this->UserManager->create($userMail, $hash);
                header("refresh:2; url=Login");
            } else {
                $this->view('errorRegister');
            }
        } else {
            $this->view('errorRegister');
        }
    }

    /**
     * The method checked if it valid informations login
     * 
     * If variables post[mail] or post[password] are empty => show view errorLogin
     * If not empty, initialization of the variables userMail and userPassword, integrate into the method addParam this object
     * Initialization of the variable listUser for recovery all User and integrate into the same method object
     * 
     * Boucle foreach for read the array, compare the datas UserMail and userPassword for find correspondance. 
     * If the object user is an admin => show view Admin.
     * If not correspondance with bdd => show errorLogin
     *  
     * @param  string, $mail, $password
     * @return object, $user => $_SESSION['user']
     */
    public function login($mail, $password)
    {
        if (empty($mail) || empty($password)) {
            $this->view('errorLogin');
        } else {
            $userMail = htmlspecialchars($mail);
            $userPassword = htmlspecialchars($password);

            $user = $this->UserManager->login($userMail);

            if (!empty($user)) {
                if (password_verify($userPassword, $user->getPassword())) {
                    $_SESSION['user'] = $user;
                    if (in_array('2', $user->getListRole())) {
                        header("refresh:2; url=Admin");
                        $this->view("loadingAdmin");
                        exit;
                    } else {
                        $this->view("authenticate");
                        exit;
                    }
                }
            }
        }
        $this->view('errorLogin');
    }

    /**
     * The method list the posts
     * 
     * @param  void 
     * @return object, $list posts for admin display = no pagination
     */
    public function listPosts()
    {
        $listPosts = $this->PostManager->getAllPostAdm();
        $this->addParam("listPosts", $listPosts);
    }

    /**
     * The method list users
     * 
     * @param  void
     * @return object, $list users for admin display
     */
    public function listUsers()
    {
        $listUsers = $this->UserManager->getAll();
        $this->addParam("listUsers", $listUsers);
    }
    /**
     * The method list comments
     * 
     * @param  void
     * @return object, $list comments for admin display
     */
    public function listComments()
    {
        $listComments = $this->CommentManager->getAll();
        $this->addParam("listComments", $listComments);
    }

    /**
     * The method list comments no valide
     * 
     * @param  void
     * @return object, $list comments no valid for admin display
     */
    public function listCommentsNoValid()
    {
        $noComment = "Aucun commentaire en attente de validation";
        $listCommentsNoValid = $this->CommentManager->getByValid();
        $this->addParam("listCommentsNoValid", $listCommentsNoValid);
        $this->addParam("noComment", $noComment);
    }

    /**
     * The method call 3 methods for count users, posts and comments.
     * 
     * It's for the admin display (LayoutAdmin)
     *
     * @param  void
     * @return void
     */
    public function countAdmin()
    {
        $countComment = $this->CommentManager->count();
        $this->addParam("countComment", $countComment);

        $countUser = $this->UserManager->count();
        $this->addParam("countUser", $countUser);

        $countPost = $this->PostManager->count();
        $this->addParam("countPost", $countPost);
    }

    /**
     * The method disconnect the users
     * destroy session
     * 
     * @param  void
     * @return void
     */
    public function disconnect()
    {
        session_destroy();
        $this->view("disconnect");
    }
}
