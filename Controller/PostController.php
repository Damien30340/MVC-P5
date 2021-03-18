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
     *
     * @param  string, $idPage for pagination
     * @return object, list 
     */
    public function viewPosts($idPage)
    {
        $this->listPostsMbr($idPage);
        $this->view('listPosts');
    }

    /**
     * The method show view associate in post per id
     * 
     * @param  string, $id Post
     * @return object
     */
    public function viewPost($id)
    {
        $this->post($id);
        $obj = $this->profil->getListRole();
        $tab = json_decode(json_encode($obj), true);
        if (in_array("MBR", $tab[0])) {
            $this->view("post");
        } else {
            $this->view("postViewer");
        }
    }

    public function viewPostAdmin($id)
    {
        $this->countAdmin();
        $post = $this->PostManager->getByid($id);
        $this->addParam("post", $post);
        $this->view("../Admin/post");

    }

    /**
     * The method create a new Post
     * 
     * For Admin, the user members or visitors has not access 
     * Call the manager Post and the method create for integrate in bdd
     *
     * @param  string, $title   of post
     * @param  string, $content of post
     * @return void
     */
    public function create($title, $content)
    {
        $this->countAdmin();
        $textNewPost = "Nouvelle entrée dans la bdd enregistrée !";

        $this->listPostsAdm();
        $this->PostManager->create($title, $content);
        $this->addParam("textNewPost", $textNewPost);

        $this->view("../Admin/posts");
    }

    /**
     * The method delete a Post per id
     * 
     * For Admin, the user members of visitors has not access
     * Call the manager post and delete with condition where id
     * 
     * @param  string, $id post
     * @return void
     */
    public function delete($id)
    {
        $this->countAdmin();
        $post = $this->PostManager->getById($id);
        $this->PostManager->delete($post);
        $this->addParam("id", $id);
        $this->view("../Admin/deletepost");
    }

    /**
     * The method update Post
     * 
     * @param  string, $id => Post
     * @return void
     */
    public function update($postId, $title, $content)
    {
        
        $this->countAdmin();
        $this->PostManager->update($postId, $title, $content);
        $this->view("../Admin/updatePost");
    
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
     * The method initialize the post with id Post and comments associate
     * 
     * @param  string, $id Post
     * @return object, $listcomment and $post
     */
    public function Post($id)
    {
        $listComment = $this->CommentManager->getByIdPost($id);
        $post = $this->PostManager->getById($id);
        $idPost = $post->getId();
        $this->addParam("idPost", $idPost);
        $this->addParam("post", $post);
        $this->addParam("listComment", $listComment);
    }

    /**
     * The method return list post for members and visitors display
     * 
     * @param  string, $idPage
     * @return object, $list post
     */
    public function listPostsMbr($idPage)
    {
        $currentPage = $idPage;
        $result = $this->PostManager->getAllPage();
        // Recovery result for nbr of pages
        $postsPerPage = 5;
        $nbrPage = ceil(intval($result[0]) / $postsPerPage);

        $listPosts = $this->PostManager->getAllPostMbr($currentPage, $postsPerPage);
        $this->addParam("listPosts", $listPosts);
        $this->addParam("currentPage", $currentPage);
        $this->addParam("nbrPage", $nbrPage);
    }
    /**
     * The method initialize the data for admin view
     * 
     * @param  void
     * @return object, $list posts 
     */
    public function listPostsAdm()
    {
        $listPosts = $this->PostManager->getAllPostAdm();
        $this->addParam("listPosts", $listPosts);
    }

    /**
     * The method initialize the comments datas for post view
     * 
     * @param  void
     * @return object, $list comments
     */
    public function listComments()
    {
        $listComments = $this->PostManager->getAllComment();
        $this->addParam("listComments", $listComments);
    }

    /**
     * Count post for admin display
     * 
     * @param void
     * @param void
     */
    public function countPost()
    {
        $countPost = $this->PostManager->count();
        $this->addParam("countPost", $countPost);
    }

    /**
     * Count user for admin display
     * 
     * @param void
     * @param void
     */
    public function countUser()
    {
        $countUser = $this->UserManager->count();
        $this->addParam("countUser", $countUser);
    }
    /**
     * Count comment for admin display
     * 
     * @param void
     * @param void
     */
    public function countComment()
    {
        $countComment = $this->CommentManager->count();
        $this->addParam("countComment", $countComment);
    }
}
