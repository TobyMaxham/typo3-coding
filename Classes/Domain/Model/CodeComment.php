<?php
namespace Tricept\TmCoding\Domain\Model;


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
 * CodeComment
 */
class CodeComment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * text
	 * 
	 * @var string
	 */
	protected $text = '';

	/**
	 * code
	 * 
	 * @var \Tricept\TmCoding\Domain\Model\Code
	 */
	protected $code = NULL;

	/**
	 * Returns the text
	 * 
	 * @return string $text
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * Sets the text
	 * 
	 * @param string $text
	 * @return void
	 */
	public function setText($text) {
		$this->text = $text;
	}

	/**
	 * Returns the code
	 * 
	 * @return \Tricept\TmCoding\Domain\Model\Code $code
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * Sets the code
	 * 
	 * @param \Tricept\TmCoding\Domain\Model\Code $code
	 * @return void
	 */
	public function setCode(\Tricept\TmCoding\Domain\Model\Code $code) {
		$this->code = $code;
	}

	/**
	 * Gets the name of the author
	 *
	 * @return string $author
	 */
	public function getAuthor()
	{
		if($this->getUid() == 0) return 'Anonymous';
		return 'Toby';
	}

	/**
	 * Gets the Icon Source
	 *
	 * @return string $icon
	 */
	public function getIcon()
	{
		if($this->getUid() == 0) return 'http://placehold.it/64x64';
	}

}