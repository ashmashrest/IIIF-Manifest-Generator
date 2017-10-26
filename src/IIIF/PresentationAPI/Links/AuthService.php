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
 *  @package  Links
 *  @author   Harry Shyket <harry.shyket@yale.edu>
 *  @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 */

namespace IIIF\PresentationAPI\Links;

/**
 * Implemenation for Service property
 * http://iiif.io/api/presentation/2.1/#linking-properties
 *
 */
use IIIF\PresentationAPI\Parameters\Identifier;
use IIIF\Utils\ArrayCreator;
use IIIF\PresentationAPI\Links\Service;

class AuthService extends Service {

    private $context = "http://iiif.io/api/auth/1/context.json";
    private $profile;
    private $label;
    private $header;
    private $description;
    private $confirmLabel;
    private $failureHeader;
    private $failureDescription;
    protected $services = array();
    /*
     * Set the header
     * 
     * @param string $header
     */

    public function setHeader($header) {
        $this->header = $header;
    }

    /*
     * Get the header
     * 
     * @return string
     */

    public function getHeader() {
        return $this->header;
    }

    /*
     * Set the description
     * 
     * @param string $description
     */

    public function setDescription($description) {
        $this->description = $description;
    }

    /*
     * Get the description
     * 
     * @return string
     */

    public function getDescription() {
        return $this->description;
    }
    /*
     * Set the confirmLabel
     * 
     * @param string $confirmLabel
     */

    public function setConfirmLabel($confirmLabel) {
        $this->confirmLabel = $confirmLabel;
    }

    /*
     * Get the confirmLabel
     * 
     * @return string
     */

    public function getConfirmLabel() {
        return $this->confirmLabel;
    }

    /*
     * Set the failureHeader
     * 
     * @param string $failureHeader
     */

    public function setFailureHeader($failureHeader) {
        $this->failureHeader = $failureHeader;
    }

    /*
     * Get the failureHeader
     * 
     * @return string
     */

    public function getFailureHeader() {
        return $this->failureHeader;
    }
    
    /*
     * Set the failureDescription
     * 
     * @param string $failureDescription
     */

    public function setFailureDescription($failureDescription) {
        $this->failureDescription = $failureDescription;
    }

    /*
     * Get the failureDescription
     * 
     * @return string
     */

    public function getFailureDescription() {
        return $this->failureDescription;
    }

    /**
     * {@inheritDoc}
     * @see \IIIF\PresentationAPI\Resources\ResourceInterface::addService()
     * @param \IIIF\PresentationAPI\Links\Service
     */
    public function addService(Service $service) {
        array_push($this->services, $service);
    }

    /**
     * {@inheritDoc}
     * @see \IIIF\PresentationAPI\Resources\ResourceInterface::getAttributions()
     * @return array
     */
    public function getServices() {
        return $this->services;
    }

    /**
     * {@inheritDoc}
     * @see \IIIF\PresentationAPI\Links\LinkAbstract::toArray()
     */
    public function toArray() {
        $item = array();

        ArrayCreator::addRequired($item, Identifier::CONTEXT, $this->getContext(), "The context must be present in a service");
        ArrayCreator::addRequired($item, Identifier::ID, $this->getID(), "The id must be present in a service");
        ArrayCreator::addRequired($item, Identifier::PROFILE, $this->getProfile(), "The profile must be present in a service");
        ArrayCreator::addIfExists($item, Identifier::LABEL, $this->getLabel());
        ArrayCreator::addIfExists($item, Identifier::HEADER, $this->getHeader());
        ArrayCreator::addIfExists($item, Identifier::DESCRIPTION, $this->getDescription());
        ArrayCreator::addIfExists($item, Identifier::CONFIRMLABEL, $this->getConfirmLabel());
        ArrayCreator::addIfExists($item, Identifier::FAILUREHEADER, $this->getFailureHeader());
        ArrayCreator::addIfExists($item, Identifier::FAILUREDESCRIPTION, $this->getFailureDescription());
        ArrayCreator::addIfExists($item, Identifier::SERVICE, $this->getServices());

        return $item;
    }

}
