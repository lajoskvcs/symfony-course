<?php
// src/AppBundle/Twig/AppExtension.php
namespace Blog\CoreBundle\Twig;

class AppExtension extends \Twig_Extension
{

    protected $param;

    public function __construct($param)
    {
        $this->param = $param;
    }

    public function getName(){}

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('decorate', array($this, 'decorateString')),
        );
    }

    public function decorateString($string)
    {
        $string = $this->param . $string . $this->param;

        return $string;
    }
}