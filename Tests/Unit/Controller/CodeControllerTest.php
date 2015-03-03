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
 * Test case for class Tricept\TmCoding\Controller\CodeController.
 *
 * @author Tobias Maxham <tobias.maxham@tricept.de>
 */
class CodeControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Tricept\TmCoding\Controller\CodeController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Tricept\\TmCoding\\Controller\\CodeController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCodesFromRepositoryAndAssignsThemToView() {

		$allCodes = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$codeRepository = $this->getMock('Tricept\\TmCoding\\Domain\\Repository\\CodeRepository', array('findAll'), array(), '', FALSE);
		$codeRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCodes));
		$this->inject($this->subject, 'codeRepository', $codeRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('codes', $allCodes);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCodeToView() {
		$code = new \Tricept\TmCoding\Domain\Model\Code();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('code', $code);

		$this->subject->showAction($code);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenCodeToView() {
		$code = new \Tricept\TmCoding\Domain\Model\Code();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newCode', $code);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($code);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenCodeToCodeRepository() {
		$code = new \Tricept\TmCoding\Domain\Model\Code();

		$codeRepository = $this->getMock('Tricept\\TmCoding\\Domain\\Repository\\CodeRepository', array('add'), array(), '', FALSE);
		$codeRepository->expects($this->once())->method('add')->with($code);
		$this->inject($this->subject, 'codeRepository', $codeRepository);

		$this->subject->createAction($code);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenCodeToView() {
		$code = new \Tricept\TmCoding\Domain\Model\Code();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('code', $code);

		$this->subject->editAction($code);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenCodeInCodeRepository() {
		$code = new \Tricept\TmCoding\Domain\Model\Code();

		$codeRepository = $this->getMock('Tricept\\TmCoding\\Domain\\Repository\\CodeRepository', array('update'), array(), '', FALSE);
		$codeRepository->expects($this->once())->method('update')->with($code);
		$this->inject($this->subject, 'codeRepository', $codeRepository);

		$this->subject->updateAction($code);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenCodeFromCodeRepository() {
		$code = new \Tricept\TmCoding\Domain\Model\Code();

		$codeRepository = $this->getMock('Tricept\\TmCoding\\Domain\\Repository\\CodeRepository', array('remove'), array(), '', FALSE);
		$codeRepository->expects($this->once())->method('remove')->with($code);
		$this->inject($this->subject, 'codeRepository', $codeRepository);

		$this->subject->deleteAction($code);
	}
}
