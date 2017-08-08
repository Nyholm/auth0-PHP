<?php

namespace Auth0\SDK\Model\Management\Users;

class User
{
    private $data;

    private function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->data['email'];
    }

    /**
     * @return bool
     */
    public function isEmailVerified()
    {
        return $this->data['emailVerified'];
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->data['username'];
    }

    // ...

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}
