<?php

/**
 * Class of application : CommentController extends BaseController
 *
 * CommentController extends BaseController of Framework
 * He puts in relation the manager and the view in associate with comments for the part of blog
 * The method with countPost, countUser and countComment are method of the admin
 *
 * @category Controller
 * @package  Framework
 * @author   Damien Gobert <contact@damiengobert.fr>
 */
class CommentController extends BaseController
{
    public function viewComments($vue = "comment")
    {

        $this->listComments();
        $this->view($vue);
    }

    /**
     * The method create a new Post
     * 
     * Call the manager Post and the method create for integrate in bdd
     *
     * @param  string, $idPost      of post
     * @param  string, $mail        of user
     * @param  string, $author      of comment
     * @param  string, $description of comment
     * @return void
     */
    public function create($idPost, $mail, $author, $description)
    {
        $author = htmlspecialchars($author);
        $description = htmlspecialchars($description);
        if (isset($this->profil)) {
            if(!empty($author) && !empty($description)) {
                $this->CommentManager->create($idPost, $mail, $author, $description);
                $this->view("sendComment");
            } else {
                $this->view("errorComment");
            }
        } else {
            $noLogin = "Merci de vous connecter pour enregistrer votre commentaire";
            $this->addParam("noLogin", $noLogin);
            $this->view("../User/Login");
        }
    }

    /**
     * The method delete a post select from admin page
     * 
     * @param  string, $id => Post
     * @return void
     */
    public function delete($id)
    {
        $this->countAdmin();
        $comment = $this->CommentManager->getById($id);
        $this->addParam("comment", $comment);
        $this->CommentManager->delete($comment);
        $this->view("../Admin/deleteComment");
    }

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
     * The method update Comment
     * 
     * @param  string, $id => Comment
     * @return void
     */
    public function update($id)
    {
        $this->countAdmin();
        $this->CommentManager->update($id);
        $comment = $this->CommentManager->getById($id);
        $this->addParam("comment", $comment);
        $this->view("../Admin/updateComment");
    }

    /**
     * The method initialize array with a list of the comments
     * 
     * @param  void
     * @return array, $listComment
     */
    public function listComments()
    {

        $listComment = $this->CommentManager->getAll();
        $this->addParam("listComment", $listComment);
    }
}
