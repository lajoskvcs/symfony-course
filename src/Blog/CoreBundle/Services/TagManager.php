<?php

namespace Blog\CoreBundle\Services;

use Blog\ModelBundle\Entity\Comment;
use Blog\ModelBundle\Entity\Post;
use Blog\ModelBundle\Form\CommentType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PostManager
 */
class TagManager
{
    private $em;
    private $formFactory;

    /**
     * @param EntityManager        $em
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(EntityManager $em, FormFactoryInterface $formFactory)
    {
        $this->em = $em;
        $this->formFactory = $formFactory;
    }

    /**
     * Find all posts
     *
     * @return array
     */
    public function findAll()
    {
        $posts = $this->em->getRepository('ModelBundle:Tag')->findAllWithPost();

        return $posts;
    }

    /**
     * @param $id
     *
     * @return null|object
     */
    public function findById($id)
    {
        $tag = $this->em->getRepository('ModelBundle:Tag')->findOneBy(
            array(
                'id' => $id,
            )
        );

        if (null === $tag) {
            throw new NotFoundHttpException('Tag was not found');
        }

        return $tag;
    }
}