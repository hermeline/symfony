<?php

namespace H\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    public function indexAction()
    {
      $content = $this
        ->get('templating')
        ->render('HPlatformBundle:Event:index.html.twig', array('nom' => 'Cloclo')
      );
      return new Response($content);
    }

    // On injecte la requête dans les arguments de la méthode
    public function viewAction($id, Request $request)
    {
      // On récupère notre paramètre tag
      $tag = $request->query->get('tag');
      // On utilise le raccourci : il crée un objet Response
      // Et lui donne comme contenu le contenu du template
      return $this->render(
        'HPlatformBundle:Event:view.html.twig',
        array('id'  => $id, 'tag' => $tag)
      );
    }

    // On récupère tous les paramètres en arguments de la méthode
    public function viewSlugAction($slug, $year, $format)
    {
        return new Response(
            "On pourrait afficher l'Event correspondant au
            slug '".$slug."', créé en ".$year." et au format ".$format."."
        );
    }
}
