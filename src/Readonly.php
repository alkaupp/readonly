<?php
declare(strict_types=1);

namespace Alkaupp\Readonly;

trait Readonly
{
    public function __get($name)
    {
        return $this->$name;
    }
}
