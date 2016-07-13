<?php
/**
 * Created by PhpStorm.
 * User: sadlom01
 * Date: 11/07/2016
 * Time: 13:54
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Pokemon;
use AppBundle\Form\AddPokemonType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddPokemonController extends Controller
{
    /**
     * @Route("/add", name="add_pokemon")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function formAction(Request $request)
    {
        $pokemon = new Pokemon();
        $form = $this->createForm(AddPokemonType::class, $pokemon);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $parameters = array('id' => $data->getId());
            //dump($data);
            //exit(1);

            $em = $this->getDoctrine()->getManager();
            $em->persist($pokemon);
            $em->flush();


            return $this->redirectToRoute('edit_pokemon', $parameters);
        }


        return $this->render('pokemon/add.html.twig', array(
            'add_form' => $form->createView()
        ));
    }
}