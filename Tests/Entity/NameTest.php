<?php
namespace Cannibal\Bundle\NameBundle\Tests;

use Cannibal\Bundle\NameBundle\Entity\Name;

use PHPUnit_Framework_Testcase;

/**
 * This class tests the name component
 */
class NameTest extends PHPUnit_Framework_TestCase
{
	private $object;

	public function setUp()
	{
		$this->object = new Name();
	}

	/**
	 * @return Name
	 */
	public function getObject()
	{
		return $this->object;
	}

	public function testConstructor()
	{
		$name = new Name("Mr", "given", "family", "lt", "4th");

		$this->assertEquals($name->getTitle(), "Mr");
		$this->assertEquals($name->getFamily(), "family");
		$this->assertEquals($name->getGiven(), "given");
		$this->assertEquals($name->getHonourific(), "lt");
		$this->assertEquals($name->getLineage(), "4th");
	}

	public function testSetAndGets()
	{
		$name = $this->getObject();
        $name->setTitle("Mr");
		$name->setFamily("family");
		$name->setGiven("given");
		$name->setHonourific("lt");
		$name->setLineage('4th');


		$this->assertEquals($name->getTitle(), "Mr");
		$this->assertEquals($name->getFamily(), "family");
		$this->assertEquals($name->getGiven(), "given");
		$this->assertEquals($name->getHonourific(), "lt");
		$this->assertEquals($name->getLineage(), "4th");

	}

    public function dataProviderUser()
    {
        return array(
            array(null, new Name('Mr','Jimbo', 'Jones', 'Bsc', '4th'))
        );
    }

    /**
     * This function tests that the render function works as expected
     *
     * @dataProvider dataProviderUser
     * @param $user
     */
    public function testRender($format, Name $name)
    {
        $this->assertEquals('Mr Jimbo Jones 4th Bsc', $name->render($format));
    }
}
