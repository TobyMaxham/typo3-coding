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
 * Test case for class Tricept\TmCoding\Controller\CodeCommentController.
 *
 * @author Tobias Maxham <tobias.maxham@tricept.de>
 */
class CodeCommentControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Tricept\TmCoding\Controller\CodeCommentController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Tricept\\TmCoding\\Controller\\CodeCommentController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCodeCommentsFromRepositoryAndAssignsThemToView() {

		$allCodeComments = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$codeCommentRepository = $this->getMock('Tricept\\TmCoding\\Domain\\Repository\\CodeCommentRepository', array('findAll'), array(), '', FALSE);
		$codeCommentRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCodeComments));
		$this->inject($this->subject, 'codeCommentRepository', $codeCommentRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('codeComments', $allCodeComments);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCodeCommentToView() {
		$codeComment = new \Tricept\TmCoding\Domain\Model\CodeComment();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('codeComment', $codeComment);

		$this->subject->showAction($codeComment);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenCodeCommentToView() {
		$codeComment = new \Tricept\TmCoding\Domain\Model\CodeComment();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newCodeComment', $codeComment);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($codeComment);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenCodeCommentToCodeCommentRepository() {
		$codeComment = new \Tricept\TmCoding\Domain\Model\CodeComment();

		$codeCommentRepository = $this->getMock('Tricept\\TmCoding\\Domain\\Repository\\CodeCommentRepository', array('add'), array(), '', FALSE);
		$codeCommentRepository->expects($this->once())->method('add')->with($codeComment);
		$this->inject($this->subject, 'codeCommentRepository', $codeCommentRepository);

		$this->subject->createAction($codeComment);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenCodeCommentToView() {
		$codeComment = new \Tricept\TmCoding\Domain\Model\CodeComment();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('codeComment', $codeComment);

		$this->subject->editAction($codeComment);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenCodeCommentInCodeCommentRepository() {
		$codeComment = new \Tricept\TmCoding\Domain\Model\CodeComment();

		$codeCommentRepository = $this->getMock('Tricept\\TmCoding\\Domain\\Repository\\CodeCommentRepository', array('update'), array(), '', FALSE);
		$codeCommentRepository->expects($this->once())->method('update')->with($codeComment);
		$this->inject($this->subject, 'codeCommentRepository', $codeCommentRepository);

		$this->subject->updateAction($codeComment);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenCodeCommentFromCodeCommentRepository() {
		$codeComment = new \Tricept\TmCoding\Domain\Model\CodeComment();

		$codeCommentRepository = $this->getMock('Tricept\\TmCoding\\Domain\\Repository\\CodeCommentRepository', array('remove'), array(), '', FALSE);
		$codeCommentRepository->expects($this->once())->method('remove')->with($codeComment);
		$this->inject($this->subject, 'codeCommentRepository', $codeCommentRepository);

		$this->subject->deleteAction($codeComment);
	}
}
