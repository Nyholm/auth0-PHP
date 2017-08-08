<?php

namespace Auth0\SDK\Model\Management\Blacklist;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
final class BlacklistIndex
{
    private $data;

    private function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getBlacklists()
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}
