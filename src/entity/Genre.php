<?php

namespace Entity;

abstract class Genre
{
    protected string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}