<?php
/**
 * Created by PhpStorm.
 * User: sadlom01
 * Date: 12/07/2016
 * Time: 13:50
 */

namespace AppBundle\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiManager extends Controller
{
    protected $client;
    protected $url;

    public function __construct($url, $client)
    {
        $this->client = $client;
        $this->url = $url;
    }

    public function sendRequest($request)
    {
        return $this->client->request('GET', $this->url . $request);
    }
}