<?php
namespace Tricept\TmCoding\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Tobias Maxham <tobias.maxham@tricept.de>, Tricept Informationssysteme AG
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * CodeCommentController
 */
class CodeCommentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * codeCommentRepository
	 * 
	 * @var \Tricept\TmCoding\Domain\Repository\CodeCommentRepository
	 * @inject
	 */
	protected $codeCommentRepository = NULL;

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$codeComments = $this->codeCommentRepository->findAll();
		$this->view->assign('codeComments', $codeComments);
	}

	/**
	 * action show
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\CodeComment $codeComment
	 * @return void
	 */
	public function showAction(\Tricept\TmCoding\Domain\Model\CodeComment $codeComment) {
		$this->view->assign('codeComment', $codeComment);
	}

	/**
	 * action new
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\CodeComment $newCodeComment
	 * @ignorevalidation $newCodeComment
	 * @return void
	 */
	public function newAction(\Tricept\TmCoding\Domain\Model\CodeComment $newCodeComment = NULL) {
		$this->view->assign('newCodeComment', $newCodeComment);
	}

	/**
	 * action create
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\CodeComment $newCodeComment
	 * @return void
	 */
	public function createAction(\Tricept\TmCoding\Domain\Model\CodeComment $newCodeComment) {
		$this->addFlashMessage('Your Comment was created.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->codeCommentRepository->add($newCodeComment);
		$this->redirect('show', 'Code', NULL, ['code' => $this->request->getArgument('code')]);
	}

	/**
	 * action edit
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\CodeComment $codeComment
	 * @ignorevalidation $codeComment
	 * @return void
	 */
	public function editAction(\Tricept\TmCoding\Domain\Model\CodeComment $codeComment) {
		$this->view->assign('codeComment', $codeComment);
	}

	/**
	 * action update
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\CodeComment $codeComment
	 * @return void
	 */
	public function updateAction(\Tricept\TmCoding\Domain\Model\CodeComment $codeComment) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->codeCommentRepository->update($codeComment);
		$this->redirect('list');
	}

	/**
	 * action delete
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\CodeComment $codeComment
	 * @return void
	 */
	public function deleteAction(\Tricept\TmCoding\Domain\Model\CodeComment $codeComment) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->codeCommentRepository->remove($codeComment);
		$this->redirect('list');
	}

}