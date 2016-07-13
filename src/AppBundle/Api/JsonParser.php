<?php
/**
 * Created by PhpStorm.
 * User: sadlom01
 * Date: 13/07/2016
 * Time: 09:42
 */

namespace AppBundle\Api;

class JsonParser
{

    public function parseJson($data){

        $parsed['name'] = $data['name'];
        $parsed['img'] = $data['sprites']['front_default'];

        foreach ($data['types'] as $type){
            $parsed['types'][] = $type['type']['name'];
        }

        foreach ($data['moves'] as $move){
            $parsed['moves'][] = str_replace("-"," ",$move['move']['name']);

        }

        foreach ($data['stats'] as $stat){
            $parsed['stats'][$stat['stat']['name']] = $stat['base_stat'];
        }

        return $parsed;

    }
}