<?php
/**
 * Created by PhpStorm.
 * User: sadlom01
 * Date: 11/07/2016
 * Time: 15:09
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class PokeApiController extends Controller
{
    /**
     * @Route("/api/{pokeId}", defaults={"pokeId" = 1} )
     * @param $pokeId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formAction($pokeId)
    {
        $apiManager = $this->get('api.manager');

        $response = $apiManager->sendRequest($pokeId);

        $data = $apiManager->jsonDecode($response);
        
        foreach ($data['types'] as $type){
            $types[] = $type['type']['name'];
        }

        foreach ($data['moves'] as $move){
            $moves[] = str_replace("-"," ",$move['move']['name']);

            //var_dump($move['version_group_details']);
        }

        foreach ($data['stats'] as $stat){
            $stats[$stat['stat']['name']] = $stat['base_stat'];
        }

        //var_dump($data['moves']);
        //var_dump($stats);

        $level = 100;
        $ev = 252;
        $iv = 31;

        $hp = ((2 * $stats['hp'] + $iv + ($ev/4)) * $level /100) + $level + 10;

        return $this->render('pokemon/api.html.twig', array(
            'hp' => $hp,
            'name' => $data['name'],
            'types' => $types,
            'stats' => $stats,
            'moves' => $moves,
            'img' => $data['sprites']['front_default']
        ));
    }
}