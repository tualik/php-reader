<?php
/**
 * PHP Reader Library
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *  - Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *  - Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 *  - Neither the name of the BEHR Software Systems nor the names of its
 *    contributors may be used to endorse or promote products derived from this
 *    software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    php-reader
 * @subpackage ASF
 * @copyright  Copyright (c) 2006, 2007 The Bearpaw Project Work Group
 * @copyright  Copyright (c) 2007, 2008 BEHR Software Systems
 * @license    http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version    $Id$
 */

/**#@+ @ignore */
require_once("Object.php");
/**#@-*/

/**
 * The <i>ASF_Content_Description_Object</i> object implementation. This object
 * contains five core attribute fields giving more information about the file:
 * title, author, description, copyright and rating.
 *
 * @package    php-reader
 * @subpackage ASF
 * @author     Sven Vollbehr <sven.vollbehr@behrss.eu>
 * @copyright  Copyright (c) 2006, 2007 The Bearpaw Project Work Group
 * @copyright  Copyright (c) 2007, 2008 BEHR Software Systems
 * @license    http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version    $Rev$
 */
final class ASF_ContentDescriptionObject extends ASF_Object
{
  /** @var string */
  private $_title;

  /** @var string */
  private $_author;

  /** @var string */
  private $_copyright;

  /** @var string */
  private $_description;

  /** @var string */
  private $_rating;

  /**
   * Constructs the class with given parameters and reads object related data
   * from the ASF file.
   *
   * @param Reader  $reader The reader object.
   * @param string  $id     The object GUID identifier.
   * @param integer $size   The object size.
   */
  public function __construct($reader, $id, $size)
  {
    parent::__construct($reader, $id, $size);

    $titleLen = $this->_reader->getUInt16LE();
    $authorLen = $this->_reader->getUInt16LE();
    $copyrightLen = $this->_reader->getUInt16LE();
    $descriptionLen = $this->_reader->getUInt16LE();
    $ratingLen = $this->_reader->getUInt16LE();

    $this->_title = $this->_reader->getString16LE($titleLen);
    $this->_author = $this->_reader->getString16LE($authorLen);
    $this->_copyright = $this->_reader->getString16LE($copyrightLen);
    $this->_description = $this->_reader->getString16LE($descriptionLen);
    $this->_rating = $this->_reader->getString16LE($ratingLen);
  }

  /**
   * Returns the title field.
   */
  public function getTitle() { return $this->_title; }

  /**
   * Returns the author field.
   *
   * @return string
   */
  public function getAuthor() { return $this->_author; }

  /**
   * Returns the copyright field.
   *
   * @return string
   */
  public function getCopyright() { return $this->_copyright; }

  /**
   * Returns the description field.
   *
   * @return string
   */
  public function getDescription() { return $this->_description; }

  /**
   * Returns the rating field.
   *
   * @return string
   */
  public function getRating() { return $this->_rating; }
}
