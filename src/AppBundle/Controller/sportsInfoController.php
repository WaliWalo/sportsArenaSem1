<?php

namespace AppBundle\Controller;

use AppBundle\Entity\sportsInfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Sportsinfo controller.
 *
 * @Route("sportsinfo")
 */
class sportsInfoController extends Controller
{
    /**
     * Lists all sportsInfo entities.
     *
     * @Route("/", name="sportsinfo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sportsInfos = $em->getRepository('AppBundle:sportsInfo')->findAll();

        return $this->render('sportsinfo/index.html.twig', array(
            'sportsInfos' => $sportsInfos,
        ));
    }

    /**
     * Creates a new sportsInfo entity.
     *
     * @Route("/new", name="sportsinfo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sportsInfo = new Sportsinfo();
        $form = $this->createForm('AppBundle\Form\sportsInfoType', $sportsInfo);
        $form->handleRequest($request);
        $session = new Session();
        if ($form->isSubmitted() && $form->isValid()) {
            $sportsInfo->setSports($session->get('sportId'));
            $em = $this->getDoctrine()->getManager();
            $em->merge($sportsInfo);
            $em->flush();
            $session->set('sportsInfo', $sportsInfo);
            $session->get('sportsInfo');
            $session->getFlashBag()->add('notice', 'Profile updated');

            return $this->redirectToRoute('sportsdays_new');
        }

        return $this->render('sportsinfo/new.html.twig', array(
            'sportsInfo' => $sportsInfo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sportsInfo entity.
     *
     * @Route("/{id}", name="sportsinfo_show")
     * @Method("GET")
     */
    public function showAction(sportsInfo $sportsInfo)
    {
        $deleteForm = $this->createDeleteForm($sportsInfo);

        return $this->render('sportsinfo/show.html.twig', array(
            'sportsInfo' => $sportsInfo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sportsInfo entity.
     *
     * @Route("/{id}/edit", name="sportsinfo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, sportsInfo $sportsInfo)
    {
        $deleteForm = $this->createDeleteForm($sportsInfo);
        $editForm = $this->createForm('AppBundle\Form\sportsInfoType', $sportsInfo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sportsinfo_edit', array('id' => $sportsInfo->getId()));
        }

        return $this->render('sportsinfo/edit.html.twig', array(
            'sportsInfo' => $sportsInfo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sportsInfo entity.
     *
     * @Route("/{id}", name="sportsinfo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, sportsInfo $sportsInfo)
    {
        $form = $this->createDeleteForm($sportsInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sportsInfo);
            $em->flush();
        }

        return $this->redirectToRoute('sportsinfo_index');
    }

    /**
     * Creates a form to delete a sportsInfo entity.
     *
     * @param sportsInfo $sportsInfo The sportsInfo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(sportsInfo $sportsInfo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sportsinfo_delete', array('id' => $sportsInfo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
