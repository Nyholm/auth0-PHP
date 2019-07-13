<?php

namespace Auth0\SDK\API\Management;

use Auth0\SDK\API\BaseApi;
use Auth0\SDK\API\Helpers\ResponseMediator;

final class Roles extends BaseApi
{
    /**
     * @param null|string $nameFilter
     *
     * @return mixed
     */
    public function getAll($nameFilter = null)
    {
        $queryParams = [];
        if ($nameFilter !== null) {
            $queryParams['name_filter'] = $nameFilter;
        }

        $query = '';
        if (!empty($queryParams)) {
            $query = '?'.http_build_query($queryParams);
        }
        $response = $this->httpClient->get('/roles'.$query);

        if (200 === $response->getStatusCode()) {
            return ResponseMediator::getContent($response);
        }

        $this->handleExceptions($response);
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function get($id)
    {
        $response = $this->httpClient->get('/roles/'.$id);

        if (200 === $response->getStatusCode()) {
            return ResponseMediator::getContent($response);
        }

        $this->handleExceptions($response);
    }

    /**
     * @param string $name
     * @param string $description
     *
     * @return mixed
     */
    public function create($name, $description)
    {
        $response = $this->httpClient->post('/roles', [], json_encode([
            'name' => $name,
            'description' => $description,
        ]));

        if (200 === $response->getStatusCode()) {
            return ResponseMediator::getContent($response);
        }

        $this->handleExceptions($response);
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $response = $this->httpClient->delete(sprintf('/roles/%s', $id));

        if (200 === $response->getStatusCode()) {
            return ResponseMediator::getContent($response);
        }

        $this->handleExceptions($response);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @return mixed
     */
    public function update($id, array $data)
    {
        $response = $this->httpClient->patch('/roles/'.$id, [], json_encode($data));

        if (200 === $response->getStatusCode()) {
            return ResponseMediator::getContent($response);
        }

        $this->handleExceptions($response);
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function getUsers($id)
    {
        $response = $this->httpClient->get(sprintf('/roles/%s/users', $id));

        if (200 === $response->getStatusCode()) {
            return ResponseMediator::getContent($response);
        }

        $this->handleExceptions($response);
    }

    /**
     * @param string $id
     * @param array  $users String ids to users
     *
     * @return mixed
     */
    public function assignUsers($id, array $users)
    {
        $response = $this->httpClient->post(
            sprintf('/roles/%s/users', $id),
            [],
            json_encode(['users' => array_values($users)])
        );

        if (200 === $response->getStatusCode()) {
            return ResponseMediator::getContent($response);
        }

        $this->handleExceptions($response);
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function getPermissions($id)
    {
        $response = $this->httpClient->get(sprintf('/roles/%s/permissions', $id));

        if (200 === $response->getStatusCode()) {
            return ResponseMediator::getContent($response);
        }

        $this->handleExceptions($response);
    }

    /**
     * @param string $id
     * @param array $data
     *
     * @return mixed
     */
    public function removePermissions($id, array $data)
    {
        $response = $this->httpClient->delete(
            sprintf('/roles/%s/permissions', $id),
            [],
            json_encode($data)
        );

        if (200 === $response->getStatusCode()) {
            return ResponseMediator::getContent($response);
        }

        $this->handleExceptions($response);
    }

    /**
     * @param string $id
     * @param array $data
     *
     * @return mixed
     */
    public function addPermissions($id, array $data)
    {
        $response = $this->httpClient->post(
            sprintf('/roles/%s/permissions', $id),
            [],
            json_encode($data)
        );

        if (201 === $response->getStatusCode()) {
            return ResponseMediator::getContent($response);
        }

        $this->handleExceptions($response);
    }
}
