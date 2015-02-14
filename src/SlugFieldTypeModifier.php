<?php namespace Anomaly\SlugFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Illuminate\Support\Str;

/**
 * Class SlugFieldTypeModifier
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SlugFieldType
 */
class SlugFieldTypeModifier extends FieldTypeModifier
{

    /**
     * The string utility.
     *
     * @var Str
     */
    protected $str;

    /**
     * Create a new SlugFieldTypeModifier instance.
     *
     * @param FieldType $type
     * @param Str       $str
     */
    public function __construct(FieldType $type, Str $str)
    {
        $this->str = $str;

        parent::__construct($type);
    }

    /**
     * Modify the value.
     *
     * @param $value
     * @return string
     */
    public function modify($value)
    {
        return $this->str->slug($value, array_get($this->type->getConfig(), 'separator', '-'));
    }
}