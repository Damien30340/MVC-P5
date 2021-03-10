<?php

class UserController extends BaseController
{

    public function viewLogin()
    {
        if (isset($_SESSION['user'])) {
            $this->view("loginOpen");
        } else {
            $this->view("login");
        }
    }

    public function viewRegister()
    {
        $this->view("register");
    }

    public function viewErrorLogin()
    {
        $this->view("errorLogin");
    }

    public function viewAdminDashboard()
    {
        $this->listCommentsNoValid();
        $this->listUsers();
        $this->listPosts();
        $this->view("../Admin/dashboard");
    }

    public function viewAdminPosts()
    {
        $this->listPosts();
        $this->view("../Admin/posts");
    }

    public function viewAdminUsers()
    {
        $this->listUsers();
        $this->view("../Admin/users");
    }

    public function viewAdminComments()
    {
        $this->listComments();
        $this->view("../Admin/comment");
    }

    public function register($mail, $password, $password2)
    {

        if (empty($mail) || empty($password)) {
            $this->viewErrorLogin();
        } elseif($password == $password2) {
            $userMail = htmlspecialchars($mail);
            $userPassword = htmlspecialchars($password);

            $hash = password_hash($userPassword, PASSWORD_DEFAULT);
            $this->UserManager->create($userMail, $hash);
            header("refresh:2; url=Login");
        } else {
            $this->view('register');
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
     * @param void
     * @return void
     */
    public function login($mail, $password)
    {
        // $this->addCss("user.css"); exemple d'intégration d'un fichier css
        // $this->addJs("user.js"); exemple d'intégration d'un fichier js
        if (empty($mail) || empty($password)) {
            $this->viewErrorLogin();
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
        $this->viewErrorLogin();
    }

    public function listPosts()
    {
        $listPosts = $this->PostManager->getAllPost();
        $this->addParam("listPosts", $listPosts);
    }

    public function listUsers()
    {
        $listUsers = $this->UserManager->getAll();
        $this->addParam("listUsers", $listUsers);
    }

    public function listComments()
    {
        $listComments = $this->CommentManager->getAll();
        $this->addParam("listComments", $listComments);
    }

    public function listCommentsNoValid()
    {
        $listCommentsNoValid = $this->CommentManager->getByValid();
        $this->addParam("listCommentsNoValid", $listCommentsNoValid);
    }

    public function countPost()
    {
        $countPost = $this->PostManager->count();
        $this->addParam("countPost", $countPost);
    }

    public function countUser()
    {
        $countUser = $this->UserManager->count();
        $this->addParam("countUser", $countUser);
    }

    public function countComment()
    {
        $countComment = $this->CommentManager->count();
        $this->addParam("countComment", $countComment);
    }

    public function disconnect()
    {
        session_destroy();
        $this->view("disconnect");
    }
}
