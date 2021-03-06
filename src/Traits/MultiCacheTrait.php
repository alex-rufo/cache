<?php

namespace Cmp\Cache\Traits;

/**
 * Interface MultiCacheTrait
 *
 * Apply to a non multi cache backend to convert it
 *
 * @package Cmp\Cache
 */
trait MultiCacheTrait
{
    /**
     * {@inheritdoc}
     */
    abstract public function set($key, $item, $timeToLive = null);

    /**
     * {@inheritdoc}
     */
    abstract public function get($key, $default = null);

    /**
     * {@inheritdoc}
     */
    abstract public function delete($key);

    
    /**
     * {@inheritdoc}
     */
    public function setItems(array $items, $timeToLive = null)
    {
        $success = true;
        foreach ($items as $key => $item) {
            $success = $success && $this->set($key, $item, $timeToLive);
        }

        return $success;
    }

    /**
     * {@inheritdoc}
     */
    public function getItems(array $keys)
    {
        $items = [];
        foreach ($keys as $key) {
            $items[$key] = $this->get($key);
        }

        return $items;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteItems(array $keys)
    {
        $success = true;
        foreach ($keys as $key) {
            $success = $success && $this->delete($key);
        }

        return $success;
    }
}
