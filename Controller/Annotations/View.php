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

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * View annotation class.
 *
 * @Annotation
 * @Target({"METHOD","CLASS"})
 */
#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD)]
class View extends Template
{
    protected ?int $statusCode;

    protected ?array $serializerGroups;

    protected ?bool $serializerEnableMaxDepthChecks;

    public function __construct(
        ?string $template = null,
        array $vars = [],
        bool $streamable = false,
        array $owner = [],
        ?int $statusCode = null,
        ?array $serializerGroups = null,
        ?bool $serializerEnableMaxDepthChecks = null
    ) {
        parent::__construct(compact($template, $vars, $streamable, $owner));

        $this->statusCode                     = $statusCode;
        $this->serializerGroups               = $serializerGroups;
        $this->serializerEnableMaxDepthChecks = $serializerEnableMaxDepthChecks;
    }

    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setSerializerGroups(array $serializerGroups): void
    {
        $this->serializerGroups = $serializerGroups;
    }

    public function getSerializerGroups(): array
    {
        return $this->serializerGroups;
    }

    public function setSerializerEnableMaxDepthChecks(bool $serializerEnableMaxDepthChecks): void
    {
        $this->serializerEnableMaxDepthChecks = $serializerEnableMaxDepthChecks;
    }

    public function getSerializerEnableMaxDepthChecks(): bool
    {
        return $this->serializerEnableMaxDepthChecks;
    }
}
