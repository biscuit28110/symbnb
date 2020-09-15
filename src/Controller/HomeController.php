<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class  HomeController extends AbstractController 
{

    /**
     * @route("/hello/{prenom}/age/{age}" , name="hello")
     * @route("/hello", name="hello_base")
     * @route("/hello/{prenom}", name="hello_prenom")
     * 
     * montre la page qui dit bonjour
     *
     * @return void
     */
    public function hello($prenom = "anonyme", $age = 0)
    {
        return $this->render
        (
            'hello.html.twig',
            [
                'prenom' => $prenom,
                'age' => $age
            ]
            );
    }

    /**
     * @Route("/",name="homepage")
     */
    public function home()
    {
        $prenoms = ["zlatan" => 35 ,"lionel" => 30,"roni" => 40];
        return $this->render(
            'home.html.twig',
            [
                'title'=>"Aurevoir tout le monde",
                'age'=> 17,
                'tableau'=>$prenoms
            ]
        );
    }


}





?>