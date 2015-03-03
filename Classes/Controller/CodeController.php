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
 * CodeController
 */
class CodeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * codeRepository
	 *
	 * @var \Tricept\TmCoding\Domain\Repository\CodeRepository
	 * @inject
	 */
	protected $codeRepository = NULL;

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
		$codes = $this->codeRepository->findAll();
		$this->view->assign('codes', $codes);
	}

	/**
	 * action show
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\Code $code
	 * @return void
	 */
	public function showAction(\Tricept\TmCoding\Domain\Model\Code $code) {

		$codeComments = $this->codeCommentRepository->findbyPid($code->getPid());
		$this->view->assign('code', $code);
		$this->view->assign('codeComments', $codeComments);
	}

	/**
	 * action new
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\Code $newCode
	 * @ignorevalidation $newCode
	 * @return void
	 */
	public function newAction(\Tricept\TmCoding\Domain\Model\Code $newCode = NULL) {
		$this->view->assign('newCode', $newCode);
	}

	/**
	 * action create
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\Code $newCode
	 * @return void
	 */
	public function createAction(\Tricept\TmCoding\Domain\Model\Code $newCode) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->codeRepository->add($newCode);
		$this->redirect('list');
	}

	/**
	 * action edit
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\Code $code
	 * @ignorevalidation $code
	 * @return void
	 */
	public function editAction(\Tricept\TmCoding\Domain\Model\Code $code) {
		$this->view->assign('code', $code);
	}

	/**
	 * action update
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\Code $code
	 * @return void
	 */
	public function updateAction(\Tricept\TmCoding\Domain\Model\Code $code) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->codeRepository->update($code);
		$this->redirect('list');
	}

	/**
	 * action delete
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\Code $code
	 * @return void
	 */
	public function deleteAction(\Tricept\TmCoding\Domain\Model\Code $code) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->codeRepository->remove($code);
		$this->redirect('list');
	}

}