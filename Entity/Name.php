<?php

namespace Cannibal\Bundle\NameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Serializable;

/**
 * Cannibal\Bundle\NameBundle\Entity\Name
 */
class Name implements NameInterface, Serializable
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $given
     */
    private $given;

    /**
     * @var string $family
     */
    private $family;

    /**
     * @var string $honourific
     */
    private $honourific;

    /**
     * @var string $lineage
     */
    private $lineage;

	public function __construct($title = null, $given = null, $family = null, $honourific = null, $lineage = null)
	{
        $this->title = $title;
		$this->family = $family;
		$this->given = $given;
		$this->honourific = $honourific;
		$this->lineage = $lineage;
	}

    /**
     * This function gets the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * This function sets the title
     *
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set given
     *
     * @param string $given
     */
    public function setGiven($given)
    {
        $this->given = $given;
    }

    /**
     * Get given
     *
     * @return string 
     */
    public function getGiven()
    {
        return $this->given;
    }

    /**
     * Set family
     *
     * @param string $family
     */
    public function setFamily($family)
    {
        $this->family = $family;
    }

    /**
     * Get family
     *
     * @return string 
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Set honourific
     *
     * @param string $honourific
     */
    public function setHonourific($honourific)
    {
        $this->honourific = $honourific;
    }

    /**
     * Get honourific
     *
     * @return string 
     */
    public function getHonourific()
    {
        return $this->honourific;
    }

    /**
     * Set lineage
     *
     * @param string $lineage
     */
    public function setLineage($lineage)
    {
        $this->lineage = $lineage;
    }

    /**
     * Get lineage
     *
     * @return string 
     */
    public function getLineage()
    {
        return $this->lineage;
    }

    public function render($format = null)
    {
        $out = isset($format) ? $format : '{TITLE} {GIVEN} {FAMILY} {LINEAGE} {HONOURIFIC}';
        foreach(array('title','given', 'family', 'honourific', 'lineage') as $field){
            $value = isset($this->$field) ? $this->$field : '';
            $out = str_replace(sprintf('{%s}', strtoupper($field)), $value, $out);
        }
        $out = trim($out);
        return $out;
    }

    public function serialize()
    {
        return serialize(array($this->id, $this->title, $this->family, $this->honourific, $this->given, $this->lineage));
    }


    public function unserialize($data)
    {
        list($this->id, $this->title, $this->family, $this->honourific, $this->given, $this->lineage) = unserialize($data);
    }
}