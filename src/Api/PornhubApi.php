<?php

namespace Noxyra\Api;

use Noxyra\Parameters\PornhubApiParameters;

class PornhubApi
{
    const ENDPOINT = "http://www.pornhub.com/webmasters/";

    public function searchVideos(
        string $catagory = PornhubApiParameters::_PARAM_CATEGORY_DEFAULT,
        int $page = PornhubApiParameters::_PARAM_PAGE_DEFAULT,
        string $search = PornhubApiParameters::_PARAM_SEARCH_DEFAULT,
        string $ordering = PornhubApiParameters::_PARAM_ORDERING_DEFAULT,
        string $period = PornhubApiParameters::_PARAM_PERIOD_DEFAULT,
        string $thumbsize = PornhubApiParameters::_PARAM_THUMBSIZE_DEFAULT,
        array $stars = PornhubApiParameters::_PARAM_STARS_DEFAULT,
        array $tags = PornhubApiParameters::_PARAM_TAGS_DEFAULT
    )
    {
        return $this->getResults('search', [
            'category' => $catagory,
            'page' => $page,
            'search' => $search,
            'ordering' => $ordering,
            'period' => $period,
            'thumbsize' => $thumbsize,
            'stars' => $stars,
            'tags' => $tags
        ]);
    }

    public function getVideoById()
    {

    }

    public function getVideoEmbedCode()
    {

    }

    public function getDeletedVideos()
    {

    }

    public function isVideoActive()
    {

    }

    public function getCategoriesList()
    {

    }

    public function getTagsList()
    {

    }

    public function getStarList()
    {

    }

    public function getStarDetailedList()
    {

    }

    // -- PRIVATE --

    /**
     * @param string $method
     * @param array $params
     * @return mixed
     */
    private function getResults($method = '', $params = [])
    {
        return json_decode(file_get_contents(self::ENDPOINT . $method  ));
    }

    /**
     * @param array $params
     * @return string
     */
    private function buildGetParams(array $params) {
        $i = 0;
        $s = '';
        foreach ($params as $key => $value) {
            $s .= ($i === 0) ? '?' : '&';
            $s .= $key . '=' . $value;
            $i++;
        }

        return (string) $s;
    }
}