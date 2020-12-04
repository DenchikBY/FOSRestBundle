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

/**
 * Represents a parameter that must be present in POST data.
 *
 * @Annotation
 * @Target("METHOD")
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 * @author Boris Guéry    <guery.b@gmail.com>
 */
#[\Attribute(\Attribute::TARGET_METHOD)]
class RequestParam extends AbstractScalarParam
{
    public function __construct(
        string $name = '',
        string $key = '',
        $default = null,
        string $description = '',
        bool $strict = true,
        bool $nullable = false,
        array $incompatibles = [],
        $requirements = null,
        bool $map = false,
        bool $allowBlank = true
    ) {
        parent::__construct($name, $key, $default, $description, $strict, $nullable, $incompatibles, $requirements,
            $map, $allowBlank);
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(Request $request, $default = null)
    {
        return $request->request->all()[$this->getKey()] ?? $default;
    }
}
