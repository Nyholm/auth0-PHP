<?php

namespace Auth0\SDK\Hydrator;

use Psr\Http\Message\ResponseInterface;

/**
 * Hydrate a PSR-7 response to something else.
 */
interface Hydrator
{
    /**
     * @param ResponseInterface $response
     *
     * @return mixed
     */
    public function hydrate(ResponseInterface $response);
}
