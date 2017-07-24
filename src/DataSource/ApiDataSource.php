<?php

namespace DataSource;

use Services\Cache;
use Services\Config;

class ApiDataSource
{
    const CACHE_PATTERN_LIST_KEY = 'list_%s';

    /**
     * Get data by API
     *
     * @param $page
     * @return mixed|null
     */
    public static function getList($page)
    {
        if (
            !($result = Cache::get()->get(sprintf(self::CACHE_PATTERN_LIST_KEY, $page)))
            || (!is_array($result))
        ) {
            $rawData = file_get_contents(sprintf(Config::get()->getSection('api')["url"], $page));

            if (!empty($rawData) && is_string($rawData) && is_array(json_decode($rawData,
                    true)) && (json_last_error() === JSON_ERROR_NONE)) {
                $result = json_decode($rawData, true);
                if (array_key_exists('results', $result) && !empty($result['results'])) {
                    Cache::get()->add(sprintf(self::CACHE_PATTERN_LIST_KEY, $page), $result);
                } else {
                    $result = null;
                }
            }

        }

        return $result;
    }
}