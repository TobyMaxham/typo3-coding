<?php

namespace Tricept\TmCoding\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Tobias Maxham <tobias.maxham@tricept.de>, Tricept Informationssysteme AG
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \Tricept\TmCoding\Domain\Model\CodeType.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Tobias Maxham <tobias.maxham@tricept.de>
 */
class CodeTypeTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Tricept\TmCoding\Domain\Model\CodeType
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Tricept\TmCoding\Domain\Model\CodeType();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getExtensionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getExtension()
		);
	}

	/**
	 * @test
	 */
	public function setExtensionForStringSetsExtension() {
		$this->subject->setExtension('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'extension',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAllowedReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getAllowed()
		);
	}

	/**
	 * @test
	 */
	public function setAllowedForBooleanSetsAllowed() {
		$this->subject->setAllowed(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'allowed',
			$this->subject
		);
	}
}
