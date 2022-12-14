<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Helpers\Helper;

class Api extends Model
{
    use HasFactory;

     /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchAllNews()
    {
        $urlParams = 'everything?q=news';
        $response = (new Helper)->makeApiCalls($urlParams);

        return Arr::get($response,'articles');

    }

    /**
     * @param $newsSource
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchNewsFromSource($newsSource)
    {
        $urlParams = 'top-headlines?sources=' . $newsSource;
        $response = (new Helper)->makeApiCalls($urlParams);
        return Arr::get($response,'articles');
    }
    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAllSources()
    {
        $urlParams = 'sources?';
        $response = (new Helper)->makeApiCalls($urlParams);
        
        return Arr::get($response,'sources');
    }
}
