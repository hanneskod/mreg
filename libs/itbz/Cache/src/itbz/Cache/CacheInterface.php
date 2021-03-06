<?php
/**
 * This file is part of the Cache package
 *
 * Copyright (c) 2012 Hannes Forsgård
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Hannes Forsgård <hannes.forsgard@gmail.com>
 * @package Cache
 */

namespace itbz\Cache;

/**
 * Main interface
 *
 * @package Cache
 */
interface CacheInterface
{
    /**
     * Clear cache
     *
     * @return void
     */
    public function clear();

    /**
     * Check if cache contains $key
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function has($key);

    /**
     * Get a stored variable from cache.
     *
     * If key is not in cache get() is undefinied
     *
     * @param mixed $key
     *
     * @return mixed
     */
    public function get($key);

    /**
     * Remove $key from cache
     *
     * @param mixed $key
     *
     * @return void
     */
    public function remove($key);

    /**
     * Set variable to cache
     *
     * @param mixed $key
     * @param mixed $value
     * @param int $ttl Time to live in seconds
     *
     * @return void
     */
    public function set($key, $value, $ttl = 0);
}
