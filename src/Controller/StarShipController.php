<?php

namespace Controller;

use DataSource\ApiDataSource;
use Services\Config;
use Services\TemplateEngine;

class StarShipController
{

    /**
     * Display list of elements
     *
     * @param int $page
     */
    public function listAction($page)
    {
        $list = ApiDataSource::getList(!empty($page) ? $page : 1);

        if (!empty($list)) {
            try {
                echo TemplateEngine::get()->render(
                    'index.html.twig',
                    array(
                        "shipList" => !empty($list['results']) ? $list['results'] : null,
                        "currentPage" => $page,
                        "totalPages" => !empty($list['results']) && !empty($list['count']) ? ceil($list['count'] / Config::get()->getSection('api')['perPage']) : 0
                    )
                );
            } catch (\Exception $e) {
                Logger::get()->error($e->getMessage());
                header('HTTP/1.0 500 Internal server error');
            }
        } else {
            header('HTTP/1.0 404 Not Found');
        }
    }
}