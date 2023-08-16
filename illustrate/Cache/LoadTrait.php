<?php
/* ===========================================================================
 * Copyright 2018 Zindex Software
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================================ */

namespace illustrate\Cache;

trait LoadTrait
{
    /**
     * @param string $key
     * @param callable $loader
     * @param int $ttl
     * @return mixed
     */
    public function load(string $key, callable $loader, int $ttl = 0)
    {
        /** @var CacheInterface $cache */
        $cache = $this;

        if (!$cache->has($key)) {
            $cache->write($key, $loader($key), $ttl);
        }

        return $cache->read($key);
    }
}