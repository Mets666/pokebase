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
            foreach ($move['version_group_details'] as $move_details)
            {
                //var_dump($move['version_group_details']);
                if ($move_details['version_group']['name'] == 'emerald'){

                    if ($move_details['move_learn_method']['name'] == 'level-up'){
                        $move_method[str_replace("-"," ",$move['move']['name'])] = 'level '. $move_details['level_learned_at'];
                    }
                    else
                    {
                        $move_method[str_replace("-"," ",$move['move']['name'])] = $move_details['move_learn_method']['name'];
                    }
                    //var_dump($move_details['move_learn_method']['name']);
                }
            }
            //if ($move_details['version_group']['name'] = )

            //var_dump($move['version_group_details']);
        }

        foreach ($data['stats'] as $stat){
            $stats[$stat['stat']['name']] = $stat['base_stat'];
        }

        //var_dump($data['moves']);
        //var_dump($stats);

        return $this->render('pokemon/api.html.twig', array(
            'name' => $data['name'],
            'types' => $types,
            'stats' => $stats,
            'moves' => $moves,
            'move_method' => $move_method,
            'img' => $data['sprites']['front_default']
        ));
    }
}