<?php

namespace Auth0\SDK\Hydrator;

use Auth0\SDK\Exception\HydrationException;
use Auth0\SDK\Model\CreatableFromArray;
use Psr\Http\Message\ResponseInterface;

/**
 * Hydrate an HTTP response to domain object.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
final class ModelHydrator implements Hydrator
{
    private $arrayHydrator;
    private $creatableFromArray;

    public function __construct(ArrayHydrator $arrayHydrator, CreatableFromArray $creatableFromArray)
    {
        $this->arrayHydrator = $arrayHydrator;
        $this->creatableFromArray = $creatableFromArray;
    }
    /**
     * @param ResponseInterface $response
     *
     * @return mixed
     */
    public function hydrate(ResponseInterface $response)
    {
        return $this->creatableFromArray->createFromArray(
            $this->arrayHydrator->hydrate($response)
        );
    }
}
