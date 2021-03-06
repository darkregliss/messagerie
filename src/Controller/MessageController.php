<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Groupe;

class MessageController extends AbstractController
{
    /**
     * @Route("/message/{id}", name="message")
     */
    public function message($id)
    {
        $repoG = $this -> getDoctrine() -> getRepository(Groupe::class);

        $groupe = $repoG -> find($id);
        return $this->render('message/message.html.twig', [
           "users" => $groupe -> getUsers(),
           "groupe" => $groupe,
           "messages" => $groupe -> getMessages(),
           "groupes" => $this -> getUser() -> getGroupes()
            
        ]);
    }

    /**
     * @Route("/message_groupe/", name="message_groupe")
     */
    public function messageGroupe()
    {
       
    	$groupes = $this -> getUser() -> getGroupes();
    	$groupe = $groupes[0];

        return $this->render('message/message.html.twig', [
           "users" => $groupe -> getUsers(),
           "groupe" => $groupe,
           "messages" => $groupe -> getMessages(),
           "groupes" => $this -> getUser() -> getGroupes()
            
        ]);
    }
}