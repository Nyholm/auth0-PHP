<?php

namespace Auth0\SDK\API\Management;

use Auth0\SDK\API\BaseApi;
use Auth0\SDK\Exception\ApiException;
use Auth0\SDK\Model\EmptyResponse;
use Auth0\SDK\Model\Management\Blacklist\BlacklistIndex;

final class Blacklists extends BaseApi
{
    /**
     * @link https://auth0.com/docs/api/management/v2#!/Blacklists/get_tokens
     * @param string $aud
     *
     * @return BlacklistIndex
     *
     * @throws ApiException On invalid responses
     */
    public function getAll($aud)
    {
        return new BlacklistIndex(
            $this->arrayHydrator->hydrate(
                $this->validResponse(
                    $this->httpClient->get(
                        sprintf('/blacklists/tokens?%s', http_build_query(['aud' => $aud]))
                    ),
                    200
                )
            )
        );
    }

    /**
     * @link https://auth0.com/docs/api/management/v2#!/Blacklists/post_tokens
     *
     * @param string $aud
     * @param string $jti
     *
     * @return void
     *
     * @throws ApiException On invalid responses
     */
    public function blacklist($aud, $jti)
    {
        $this->validResponse(
            $this->httpClient->post('/blacklists/tokens', [], json_encode([
                'aud' => $aud,
                'jti' => $jti,
            ])),
            204
        );
    }
}
