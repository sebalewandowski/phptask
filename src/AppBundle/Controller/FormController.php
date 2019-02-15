<?php

namespace AppBundle\Controller;

use AppBundle\Model\NumericalSequence;
use AppBundle\Form\Form;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FormController extends Controller
{
    /**
     * @var NumericalSequence
     */
    private $sequence;

    public function __construct(NumericalSequence $sequence)
    {
        $this->sequence = $sequence;
    }

    /**
     * @Route("/", name="send_action")
     */
    public function sendAction(Request $request)
    {
        $formData = null;
        $form = $this->createForm(Form::class);

        return $this->render("Form/index.html.twig", ["form" => $form->createView()]);
    }

    /**
     * @Route("/calculate", name="calculate_action")
     */
    public function indexAction(Request $request) {
        $output = [];

        $form = $this->createForm(Form::class);

        if ($request->isMethod("post")) {
            $form->handleRequest($request);

            //TODO validate form data
            $formData = $form->getData();

            //TODO move the logic into Model/Validator
            foreach ($formData as $number) {
                if (isset($number)) {
                    $numbers = $this->sequence->elementOfSequence($number);
                    $output[] = $this->sequence->maxFor($number);
                }
            }

            return $this->render("Result/result.html.twig", ["result" => $output]);
        }
    }
}