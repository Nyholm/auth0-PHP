<?php

namespace Auth0\SDK\Hydrator;

use Psr\Http\Message\ResponseInterface;

/**
 * Do not hydrate to any object at all.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
final class NoopHydrator implements Hydrator
{
    /**
     * @param ResponseInterface $response
     *
     * @throws \LogicException
     */
    public function hydrate(ResponseInterface $response)
    {
        throw new \LogicException('The NoopHydrator should never be called');
    }
}
