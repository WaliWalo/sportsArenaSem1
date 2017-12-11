<?php

namespace AppBundle\Controller;

use AppBundle\Entity\sportsDays;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sportsday controller.
 *
 * @Route("sportsdays")
 */
class sportsDaysController extends Controller
{
    /**
     * Lists all sportsDay entities.
     *
     * @Route("/", name="sportsdays_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sportsDays = $em->getRepository('AppBundle:sportsDays')->findAll();

        return $this->render('sportsdays/index.html.twig', array(
            'sportsDays' => $sportsDays,
        ));
    }

    /**
     * Creates a new sportsDay entity.
     *
     * @Route("/new", name="sportsdays_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sportsDay = new Sportsday();
        $form = $this->createForm('AppBundle\Form\sportsDaysType', $sportsDay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sportsDay);
            $em->flush();

            return $this->redirectToRoute('sportsdays_show', array('id' => $sportsDay->getId()));
        }

        return $this->render('sportsdays/new.html.twig', array(
            'sportsDay' => $sportsDay,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sportsDay entity.
     *
     * @Route("/{id}", name="sportsdays_show")
     * @Method("GET")
     */
    public function showAction(sportsDays $sportsDay)
    {
        $deleteForm = $this->createDeleteForm($sportsDay);

        return $this->render('sportsdays/show.html.twig', array(
            'sportsDay' => $sportsDay,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sportsDay entity.
     *
     * @Route("/{id}/edit", name="sportsdays_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, sportsDays $sportsDay)
    {
        $deleteForm = $this->createDeleteForm($sportsDay);
        $editForm = $this->createForm('AppBundle\Form\sportsDaysType', $sportsDay);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sportsdays_edit', array('id' => $sportsDay->getId()));
        }

        return $this->render('sportsdays/edit.html.twig', array(
            'sportsDay' => $sportsDay,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sportsDay entity.
     *
     * @Route("/{id}", name="sportsdays_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, sportsDays $sportsDay)
    {
        $form = $this->createDeleteForm($sportsDay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sportsDay);
            $em->flush();
        }

        return $this->redirectToRoute('sportsdays_index');
    }

    /**
     * Creates a form to delete a sportsDay entity.
     *
     * @param sportsDays $sportsDay The sportsDay entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(sportsDays $sportsDay)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sportsdays_delete', array('id' => $sportsDay->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
