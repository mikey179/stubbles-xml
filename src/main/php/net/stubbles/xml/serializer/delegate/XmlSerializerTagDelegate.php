<?php
/**
 * This file is part of stubbles.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package  net\stubbles\xml
 */
namespace net\stubbles\xml\serializer\delegate;
use net\stubbles\lang\BaseObject;
use net\stubbles\xml\XmlStreamWriter;
use net\stubbles\xml\serializer\XmlSerializer;
/**
 * Serializer delegate to serialize a value to a tag.
 *
 * @since  1.6.0
 */
class XmlSerializerTagDelegate extends BaseObject implements XmlSerializerDelegate
{
    /**
     * name of tag
     *
     * @type  string
     */
    protected $tagName;
    /**
     * recurring element tag name for lists
     *
     * @type  string
     */
    protected $elementTagName;

    /**
     * constructor
     *
     * @param  string  $tagName         name of tag
     * @param  string  $elementTagName  recurring element tag name for lists
     */
    public function  __construct($tagName, $elementTagName = null)
    {
        $this->tagName        = $tagName;
        $this->elementTagName = $elementTagName;
    }

    /**
     * serializes given value
     *
     * @param  mixed            $value
     * @param  XmlSerializer    $xmlSerializer  serializer in case $value is not just a scalar value
     * @param  XmlStreamWriter  $xmlWriter      xml writer to write serialized object into
     */
    public function serialize($value, XmlSerializer $xmlSerializer, XmlStreamWriter $xmlWriter)
    {
        $xmlSerializer->serialize($value, $xmlWriter, $this->tagName, $this->elementTagName);
    }
}
?>