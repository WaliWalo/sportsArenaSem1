<?php

namespace AppBundle\Controller;

use AppBundle\Entity\userInfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\User;

/**
 * Userinfo controller.
 *
 * @Route("userinfo")
 */
class userInfoController extends Controller
{
    /**
     * Lists all userInfo entities.
     *
     * @Route("/", name="userinfo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userInfos = $em->getRepository('AppBundle:userInfo')->findAll();

        return $this->render('userinfo/index.html.twig', array(
            'userInfos' => $userInfos,
        ));
    }

    /**
     * Creates a new userInfo entity.
     *
     * @Route("/new", name="userinfo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $userInfo = new Userinfo();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        dump($user);
        $form = $this->createForm('AppBundle\Form\userInfoType', $userInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($user);
            $userInfo->setUserId($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($userInfo);
            $em->flush();

            return $this->redirectToRoute('userinfo_show', array('id' => $userInfo->getId()));
        }

        return $this->render('userinfo/new.html.twig', array(
            'userInfo' => $userInfo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a userInfo entity.
     *
     * @Route("/{id}", name="userinfo_show")
     * @Method("GET")
     */
    public function showAction(userInfo $userInfo)
    {
        $deleteForm = $this->createDeleteForm($userInfo);

        return $this->render('userinfo/show.html.twig', array(
            'userInfo' => $userInfo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing userInfo entity.
     *
     * @Route("/{id}/edit", name="userinfo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, userInfo $userInfo)
    {
        $deleteForm = $this->createDeleteForm($userInfo);
        $editForm = $this->createForm('AppBundle\Form\userInfoType', $userInfo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('userinfo_edit', array('id' => $userInfo->getId()));
        }

        return $this->render('userinfo/edit.html.twig', array(
            'userInfo' => $userInfo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a userInfo entity.
     *
     * @Route("/{id}", name="userinfo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, userInfo $userInfo)
    {
        $form = $this->createDeleteForm($userInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($userInfo);
            $em->flush();
        }

        return $this->redirectToRoute('userinfo_index');
    }

    /**
     * Creates a form to delete a userInfo entity.
     *
     * @param userInfo $userInfo The userInfo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(userInfo $userInfo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('userinfo_delete', array('id' => $userInfo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
