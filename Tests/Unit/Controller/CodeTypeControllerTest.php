<?php
namespace Tricept\TmCoding\Tests\Unit\Controller;
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
 * Test case for class Tricept\TmCoding\Controller\CodeTypeController.
 *
 * @author Tobias Maxham <tobias.maxham@tricept.de>
 */
class CodeTypeControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Tricept\TmCoding\Controller\CodeTypeController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Tricept\\TmCoding\\Controller\\CodeTypeController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCodeTypesFromRepositoryAndAssignsThemToView() {

		$allCodeTypes = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$codeTypeRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$codeTypeRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCodeTypes));
		$this->inject($this->subject, 'codeTypeRepository', $codeTypeRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('codeTypes', $allCodeTypes);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCodeTypeToView() {
		$codeType = new \Tricept\TmCoding\Domain\Model\CodeType();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('codeType', $codeType);

		$this->subject->showAction($codeType);
	}
}
