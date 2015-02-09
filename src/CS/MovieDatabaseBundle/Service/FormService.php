<?php
/**
 *
 *
 * @author: Dmitriy Shuba <sda@sda.in.ua>
 * @link: http://granart-studio.com/ GranArt 
 * Date Time: 04.02.2015 17:05
 */

namespace CS\MovieDatabaseBundle\Service;

use Symfony\Component\Form\Form;

class FormService
{
	public function getErrorMessages(Form $form)
	{
		$errors = array();
		foreach ($form->getErrors() as $key => $error) {
			if ($form->isRoot()) {
				$errors['#'][] = $error->getMessage();
			} else {
				$errors[] = $error->getMessage();
			}
		}

		foreach ($form->all() as $child) {
			if (!$child->isValid()) {
				$errors[$child->getName()] = $this->getErrorMessages($child);
			}
		}

		return $errors;
	}

}