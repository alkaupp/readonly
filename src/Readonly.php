<?php
declare(strict_types=1);

namespace Alkaupp\Readonly;

trait Readonly
{
    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        if (!property_exists($this, $name)) {
            return;
        }
        if ($this->$name !== null) {
            $this->$name = $value;
        }
        throw new ReassignmentError('Reassignment of properties is not allowed.');
    }
}
