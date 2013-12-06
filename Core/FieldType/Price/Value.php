<?php
/**
 * File containing the Float Value class
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace BrunoChirez\FieldTypeBundle\Core\FieldType\Price;

use eZ\Publish\Core\FieldType\Value as BaseValue;

/**
 * Value for Float field type
 */
class Value extends BaseValue
{
    /**
     * Float content
     *
     * @var float
     */
    public $value;
	
    /**
     * Float content
     *
     * @var float
     */
    public $vat_include;
	
    /**
     * Float content
     *
     * @var float
     */
    public $vat_id;

    /**
     * Construct a new Value object and initialize with $value
     *
     * @param float|null $value
     */
    public function __construct( $value = 0.00, $vat_include = null, $vat_id = null)
    {
        $this->value = $value;
		$this->vat_include = $vat_include;
		$this->vat_id = $vat_id;
    }

    /**
     * @see \eZ\Publish\Core\FieldType\Value
     */
    public function __toString()
    {
        return (string)$this->value . '|' . $this->vat_include . '|' . $this->vat_id;
    }
}
