<?php
/*
 *  This file is part of IIIF Manifest Creator.
 *
 *  IIIF Manifest Creator is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  IIIF Manifest Creator is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with IIIF Manifest Creator.  If not, see <http://www.gnu.org/licenses/>.
 *
 *  @category IIIF\PresentationAPI
 *  @package  Resources
 *  @author   Harry Shyket <harry.shyket@yale.edu>
 *  @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 *
*/

namespace IIIF\PresentationAPI\Resources;

use IIIF\PresentationAPI\Parameters\Identifier;
use IIIF\PresentationAPI\Resources\Content;
use IIIF\PresentationAPI\Resources\ResourceAbstract;
use IIIF\Utils\ArrayCreator;

/**
 * Implementation of a Sequence resource:
 * http://iiif.io/api/presentation/2.1/#sequence
 */
class MediaSequence extends ResourceAbstract {

  private $startElement;

  private $elements = array();

  public $type = "ixif:MediaSequence";

    /**
     * Set the startCanvas.
     *
     * @param string
     */
    public function setStartElement($startElement)
    {
        $this->startElement = $startElement;
    }

    /**
     * Get the startCanvas.
     *
     * @return string
     */
    public function getStartElement()
    {
        return $this->startElement;
    }

    /**
     * Add a Element.
     *
     * @param \IIIF\PresentationAPI\Resources\Content $element
     */
    public function addElement($element)
    {
        array_push($this->elements, $element);
    }

    public function getElements()
    {
      return $this->elements;
    }


    public function toArray()
    {
        $item = array();

        /** Technical Properties **/
        if ($this->isTopLevel()) {
          ArrayCreator::addRequired($item, Identifier::CONTEXT, $this->getContexts(), "The context must be present in the Manifest");
        }
        ArrayCreator::addIfExists($item, Identifier::ID, $this->getID(), "The id must be present in the Manifest");
        ArrayCreator::addRequired($item, Identifier::TYPE, $this->getType(), "The type must be present in the Manifest");
        
        /** Descriptive Properties **/
        ArrayCreator::addIfExists($item, Identifier::LABEL, $this->getLabels());

        /** Resource Types **/
        ArrayCreator::addRequired($item, Identifier::ELEMENTS, $this->getElements(), "Elements must be present in a mediaSequence", false);

        return $item;
    }

}