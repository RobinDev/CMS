<?php

namespace PiedWeb\CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PiedWeb\CMSBundle\Repository\PageRepository;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;

/**
 * @ORM\Entity(repositoryClass=PageRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Page implements TranslatableInterface
{
    use IdTrait, PageTrait, PageExtendedTrait, PageImageTrait, PageFaqTrait, TranslatableTrait;

    public function __construct()
    {
        $this->__construct_page();
        $this->__construct_extended();
        $this->__construct_image();
        $this->__construct_faq();
    }
}
