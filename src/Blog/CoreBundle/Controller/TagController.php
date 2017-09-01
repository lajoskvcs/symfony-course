<?php

namespace Blog\CoreBundle\Controller;

use Blog\CoreBundle\Services\PostManager;
use Blog\ModelBundle\Entity\Comment;
use Blog\ModelBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class TagController
 *
 * @Route("/{_locale}/tag", requirements={"_locale"="en|es"}, defaults={"_locale"="en"})
 */
class TagController extends Controller
{
    /**
     * Show the posts index
     *
     * @return array
     *
     * @Route("/all")
     * @Template()
     */
    public function indexAction()
    {
        $tags = $this->getTagManager()->findAll();

        return array(
            'tags' => $tags
        );
    }

    /**
     *
     *
     * @return array
     *
     * @Route("/{id}")
     * @Template()
     */
    public function showAction($id)
    {
        $tag = $this->getTagManager()->findById($id);
        $posts = $tag->getPosts();

        return array(
            'tag' => $tag,
            'posts' => $posts
        );
    }

    private function getTagManager()
    {
        return $this->get('tagManager');
    }
}
