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
*/

namespace IIIF\PresentationAPI\Resources;

use IIIF\PresentationAPI\Parameters\Identifier;
use IIIF\PresentationAPI\Resources\ResourceAbstract;
use IIIF\Utils\ArrayCreator;

/**
 * Implementation of a Content resource:
 * http://iiif.io/api/presentation/2.1/#image-resources
 */
class ContentAsText extends ResourceAbstract {

    private $chars;

    /**
     * Set the type.
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Set the Chars.
     *
     * @param string $chars
     */
    public function setChars($chars)
    {
        $this->chars = $chars;
    }
    
    /**
     * Get the width.
     *
     * @return string
     */
    public function getChars()
    {
        return $this->chars;
    }
    /**
     * {@inheritDoc}
     * @see \IIIF\PresentationAPI\Resources\ResourceAbstract::toArray()
     * @return array
     */
    public function toArray()
    {
        $item = array();

        /** Technical Properties **/
        ArrayCreator::addRequired($item, Identifier::ID, $this->getID(), "The id must be present in a Content resource");
        ArrayCreator::addRequired($item, Identifier::TYPE, $this->getType(), "The type must be present in a Content resource");
        ArrayCreator::addRequired($item, Identifier::CHARS, $this->getChars(), "The Chars must be present in a Content resource");


        return $item;
    }
}