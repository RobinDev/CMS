<?php

namespace PiedWeb\CMSBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Translatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Sonata\TranslationBundle\Model\Gedmo\TranslatableInterface;
use Sonata\TranslationBundle\Model\Gedmo\AbstractPersonalTranslatable;

/**
 * Page extended: // I may cut this in multiple traits
 * - meta no-index
 * - Rich Content (subtitle, excrept, parentPage, h1, name [to do short link] )
 * - RelatedPages
 * - author (link)
 * - template
 */
trait PageExtendedTrait
{
    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subTitle;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $excrept;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $metaRobots;

    /**
     * @ORM\ManyToOne(targetEntity="PiedWeb\CMSBundle\Entity\Page", inversedBy="childrenPages")
     */
    private $parentPage;

    /**
     * @ORM\OneToMany(targetEntity="PiedWeb\CMSBundle\Entity\Page", mappedBy="parentPage")
     */
    private $childrenPages;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $h1;

    /**
     * @Gedmo\Translatable
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="PiedWeb\CMSBundle\Entity\User")
     */
    private $author;

    /**
     * @ORM\ManyToMany(targetEntity="PiedWeb\CMSBundle\Entity\Page")
     */
    private $relatedPages;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $template;

    public function __construct_extended()
    {
        $this->relatedPages = new ArrayCollection();
    }

    public function getSubTitle(): ?string
    {
        return $this->subTitle;
    }

    public function setSubTitle(?string $subTitle): self
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    public function getExcrept(): ?string
    {
        return $this->excrept;
    }

    public function setExcrept(?string $excrept): self
    {
        $this->excrept = $excrept;

        return $this;
    }

    public function getMetaRobots(): ?bool
    {
        return $this->metaRobots;
    }

    public function setMetaRobots(?bool $metaRobots): self
    {
        $this->metaRobots = $metaRobots;

        return $this;
    }

    public function getParentPage(): ?self
    {
        return $this->parentPage;
    }

    public function setParentPage(?self $parentPage): self
    {
        $this->parentPage = $parentPage;

        return $this;
    }

    public function getChildrenPage()
    {
        return $this->childrenPages;
    }

    public function getH1(): ?string
    {
        return $this->h1;
    }

    public function setH1(?string $h1): self
    {
        $this->h1 = $h1;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection|Page[]
     */
    public function getRelatedPages(): Collection
    {
        return $this->relatedPages;
    }

    public function addRelatedPage(Page $relatedPage): self
    {
        if (!$this->relatedPages->contains($relatedPage)) {
            $this->relatedPages[] = $relatedPage;
        }

        return $this;
    }

    public function removeRelatedPage(Page $relatedPage): self
    {
        if ($this->relatedPages->contains($relatedPage)) {
            $this->relatedPages->removeElement($relatedPage);
        }

        return $this;
    }

    public function getTemplate(): ?string
    {
        return $this->template;
    }

    public function setTemplate(?string $template): self
    {
        $this->template = $template;

        return $this;
    }
}
