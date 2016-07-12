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
        $apiManager = $this->get('api.manager');

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Pokemon');

        $pokemon = $repository->findOneById($id);

        $selectForm = $this->createForm(EditPokemonType::class, $pokemon);

        $selectForm->handleRequest($request);

        if ($selectForm->isSubmitted() && $selectForm->isValid()) {
            $data = $selectForm->getData()->getName();
            $parameters = array('id' => $data->getId());
            //var_dump($parameters);
            //exit(1);
            return $this->redirectToRoute('edit_pokemon', $parameters);
        }
        
        $form = $this->createForm(AddPokemonType::class, $pokemon);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pokemon);
            $em->flush();
            return $this->redirectToRoute('edit_pokemon');
        }

        return $this->render('pokemon/edit.html.twig', array(
            'edit_form' => $form->createView(),
            'select_form' => $selectForm->createView()
        ));

        
    }

}