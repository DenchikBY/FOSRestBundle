<?php

/*
 * This file is part of the FOSRestBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\RestBundle\Controller\Annotations;

use Symfony\Component\Validator\Constraints;

/**
 * {@inheritdoc}
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 * @author Boris Guéry <guery.b@gmail.com>
 * @author Ener-Getick <egetick@gmail.com>
 */
abstract class AbstractParam implements ParamInterface
{
    public string $name;

    public string $key;

    /** @var mixed */
    public $default;

    public string $description;

    public bool $strict;

    public bool $nullable;

    public array $incompatibles;

    public function __construct(
        string $name = '',
        string $key = '',
        $default = null,
        string $description = '',
        bool $strict = false,
        bool $nullable = false,
        array $incompatibles = []
    ) {
        $this->name          = $name;
        $this->key           = $key;
        $this->default       = $default;
        $this->description   = $description;
        $this->strict        = $strict;
        $this->nullable      = $nullable;
        $this->incompatibles = $incompatibles;
    }

    /** {@inheritdoc} */
    public function getName(): string
    {
        return $this->name;
    }

    /** {@inheritdoc} */
    public function getDefault()
    {
        return $this->default;
    }

    /** {@inheritdoc} */
    public function getDescription(): string
    {
        return $this->description;
    }

    /** {@inheritdoc} */
    public function getIncompatibilities(): array
    {
        return $this->incompatibles;
    }

    /** {@inheritdoc} */
    public function getConstraints(): array
    {
        $constraints = [];
        if (!$this->nullable) {
            $constraints[] = new Constraints\NotNull();
        }

        return $constraints;
    }

    /** {@inheritdoc} */
    public function isStrict(): bool
    {
        return $this->strict;
    }

    /**
     * @return string
     */
    protected function getKey(): string
    {
        return $this->key ?: $this->name;
    }
}
