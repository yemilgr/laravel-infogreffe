<?php


namespace Yemilgr\Infogreffe\Entity;

/**
 * Class AbstractEntity
 * @package Yemilgr\Infogreffe\Entity
 */
class AbstractEntity
{
    protected array $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }
}