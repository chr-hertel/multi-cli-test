<?php

/*
 * Quentic Platform
 * Copyright(c) Quentic GmbH
 * contact.de@quentic.com
 *
 * https://www.quentic.com/
 */

declare(strict_types=1);

namespace App;

use Symfony\Component\Finder\Finder;

final readonly class TenantFileLoader
{
    public function __construct(private string $tenantDirectory)
    {
    }

    public function load(): array
    {
        $files = (new Finder())
            ->in($this->tenantDirectory)
            ->files();

        return iterator_to_array($files);
    }
}
