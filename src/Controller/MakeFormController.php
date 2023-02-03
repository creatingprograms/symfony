<?php
// src/Controller/MakeFormController.php
namespace App\Controller;

use App\Entity\Cost;
use App\Form\Type\CostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MakeFormController extends AbstractController
{
    public function new(Request $request): Response
    {
        $cost = new Cost();
        $cost->setProduct('Choose a product');
		$cost->setTax('');
		$form = $this->createForm(CostType::class, $cost);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cost = $form->getData();
            $totalCost = $cost->getCost();
        if ($totalCost == 0) {
        return $this->render('cost/error.html.twig');
        } else {
		return $this->render('cost/result.html.twig', [
            'total_cost' => $totalCost,
        ]);
        }		
		}
		return $this->render('cost/cost.html.twig', [
            'form' => $form,
        ]);
	}
}
?>