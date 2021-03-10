<?php

/**
 * Class of application : PostController extends BaseController
 *
 * PostController extends BaseController of Framework
 * He puts in relation the manager and the view in associate with posts for the part of blog
 *
 * @category Controller
 * @package  Framework
 * @author   Damien Gobert <contact@damiengobert.fr>
 */
class PostController extends BaseController
{


    /**
     * The method show view associate
     * 
     * Recovery the datas in a list of posts, add the datas with method addParam of BaseController.
     * Call the method view with param name of view for show the datas and the view.
     * @param void
     * @return void
     */
    public function viewPosts($vue = "listPosts")
    {

        $this->listPosts();
        $this->listComments();
        $this->view($vue);
    }

    public function viewPost($id){

        $this->post($id);
        $this->view("post");
    }

    /**
     * The method create a new Post
     * 
     * Call the manager Post and the method create for integrate in bdd
     * @param string, $title of post
     * @param string, $content of post
     * @return void
     */
    public function create($title, $content)
    {
        $textNewPost = "Nouvelle entrée dans la bdd enregistrée !";

        $this->listPosts();
        $this->PostManager->create($title, $content);
        $this->addParam("textNewPost", $textNewPost);

        $this->viewPosts("../Admin/posts");    
    }

    public function delete($id)
    {
        
       
        $post = $this->PostManager->getById($id);
        $this->PostManager->delete($post);
        $this->addParam("id", $id);
        $this->view("../Admin/deletepost");
    }

    public function Post($id){

        $listComment = $this->CommentManager->getByIdPost($id);
        $post = $this->PostManager->getById($id);
        $idPost = $post->getId();
        $this->addParam("idPost", $idPost);
        $this->addParam("post", $post);
        $this->addParam("listComment", $listComment);
    }

    public function listPosts()
    {
        $listPosts = $this->PostManager->getAllPost();
        $this->addParam("listPosts", $listPosts);
    }

    public function listComments(){
        $listComments = $this->PostManager->getAllComment();
        $this->addParam("listComments", $listComments);
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
}
