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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraint;

/**
 * Represents a parameter that can be present in the request attributes.
 *
 * @author Ener-Getick <egetick@gmail.com>
 */
interface ParamInterface
{
    /**
     * Get param name.
     */
    public function getName(): string;

    /**
     * @return mixed
     */
    public function getDefault();

    public function getDescription(): string;

    /**
     * Get incompatibles parameters.
     */
    public function getIncompatibilities(): array;

    /**
     * @return Constraint[]
     */
    public function getConstraints(): array;

    /**
     * @return bool
     */
    public function isStrict(): bool;

    /**
     * Get param value in function of the current request.
     *
     * @return mixed
     */
    public function getValue(Request $request, $default);
}
