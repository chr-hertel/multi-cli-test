<?php

/*
 * Quentic Platform
 * Copyright(c) Quentic GmbH
 * contact.de@quentic.com
 *
 * https://www.quentic.com/
 */

declare(strict_types=1);

namespace App\Controller;

use App\TenantFileLoader;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route('', name: 'files')]
final readonly class FileController
{
    public function __invoke(TenantFileLoader $fileLoader): JsonResponse
    {
        return new JsonResponse(
            $fileLoader->load()
        );
    }
}
