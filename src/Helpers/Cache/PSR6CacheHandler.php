<?php

namespace Auth0\SDK\Helpers\Cache;

use Psr\Cache\CacheItemPoolInterface;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class PSR6CacheHandler implements CacheHandler
{
    /**
     * @var CacheItemPoolInterface
     */
    private $cachePool;

    /**
     * @param CacheItemPoolInterface $cachePool
     */
    public function __construct(CacheItemPoolInterface $cachePool)
    {
        $this->cachePool = $cachePool;
    }

    /**
     * @param string $key
     */
    public function get($key)
    {
        return $this->cachePool->getItem($this->cleanKey($key))->get();
    }

    /**
     * @param string $key
     */
    public function delete($key)
    {
        $this->cachePool->deleteItem($this->cleanKey($key));
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value)
    {
        $item = $this->cachePool->getItem($this->cleanKey($key));
        $item->set($value);
        $this->cachePool->save($item);
    }

    private function cleanKey($key)
    {
        return preg_replace('|[^A-Za-z0-9_\.]|', '', $key);
    }
}
