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

use Symfony\Component\Routing\Annotation\Route as BaseRoute;

/**
 * Route annotation class.
 *
 * @Annotation
 */
#[\Attribute(\Attribute::IS_REPEATABLE | \Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD)]
class Route extends BaseRoute
{
    public function __construct(
        $data = [],
        $path = null,
        string $name = null,
        array $requirements = [],
        array $options = [],
        array $defaults = [],
        string $host = null,
        array $methods = [],
        array $schemes = [],
        string $condition = null,
        int $priority = null,
        string $locale = null,
        string $format = null,
        bool $utf8 = null,
        bool $stateless = null
    ) {
        parent::__construct($data, $path, $name, $requirements, $options, $defaults, $host, $methods, $schemes,
            $condition, $priority, $locale, $format, $utf8, $stateless);

        if (!$this->getMethods()) {
            $this->setMethods((array) $this->getMethod());
        }
    }

    public function getMethod(): ?string
    {
        return null;
    }
}
