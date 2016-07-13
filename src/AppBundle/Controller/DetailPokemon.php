<?php
/**
 * Created by PhpStorm.
 * User: Matej Sadloň
 * Date: 12.7.2016
 * Time: 22:10
 */

namespace AppBundle\Controller;

use AppBundle\Form\AddPokemonType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Pokemon;
use AppBundle\Form\EditPokemonType;

class DetailPokemon extends Controller
{

//    /**
//     * @Route("/detail")
//     * @return \Symfony\Component\HttpFoundation\Response
//     */
//    public function SelectFormAction(Request $request)
//    {
//
//        $repository = $this->getDoctrine()
//            ->getRepository('AppBundle:Pokemon');
//
//        $pokemon = $repository->findOneById('1');
//
//        $selectForm = $this->createForm(EditPokemonType::class, $pokemon);
//
//        $selectForm->handleRequest($request);
//
//        if ($selectForm->isSubmitted() && $selectForm->isValid()) {
//            $data = $selectForm->getData()->getName();
//            $parameters = array('id' => $data->getId());
//            //var_dump($parameters);
//            //exit(1);
//            return $this->redirectToRoute('edit_pokemon', $parameters);
//        }
//
//        return $this->render('pokemon/add.html.twig', array(
//            'select_form' => $selectForm->createView()
//        ));
//    }


    /**
     * @Route("/detail/{id}", defaults={"id" = 1}, name="edit_pokemon")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function EditFormAction(Request $request, $id)
    {
        //Connect db and select pokemon by id
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Pokemon');
        $pokemon = $repository->findOneById($id);

        //Create ApiManager
        $apiManager = $this->get('api.manager');

        //Request on REST api
        $response = $apiManager->sendRequest($pokemon->getRace());

        //Get data from api response
        $data = $apiManager->jsonDecode($response);

        //Parse json data from request
        $parsed = $this->get('api.json.parser')->parseJson($data);
        
        $statCalculator = $this->get('api.stat.calculator');

        $stats = $statCalculator->Calcul($parsed, $pokemon);

        //Select form handler
        $selectForm = $this->createForm(EditPokemonType::class, $pokemon);
        $selectForm->handleRequest($request);
        if ($selectForm->isSubmitted() && $selectForm->isValid()) {
            $data = $selectForm->getData()->getName();
            $parameters = array('id' => $data->getId());
            return $this->redirectToRoute('edit_pokemon', $parameters);
        }

        //Edit form handler
        $form = $this->createForm(AddPokemonType::class, $pokemon);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pokemon);
            $em->flush();
            return $this->redirectToRoute('edit_pokemon');
        }

        //Return data to view and render
        return $this->render('pokemon/edit.html.twig', array(
            'edit_form' => $form->createView(),
            'select_form' => $selectForm->createView(),
            'data' => $parsed,
            'stats' => $stats
        ));

        
    }

}