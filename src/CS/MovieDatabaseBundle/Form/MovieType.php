<?php
/**
 * Project of php-test-dev.loc.
 *
 * @author: Dmitriy Shuba <sda@sda.in.ua>
 * @link: http://granart-studio.com/ GranArt 
 * Date Time: 09.02.2015 15:40
 */

namespace CS\MovieDatabaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MovieType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$years = array();
		for($i = 1900; $i <= 2015; $i++)
		{
			$years[$i] = $i;
		}

		$builder
			->setMethod('post')
			->add('title', null, array())
			->add('year', 'choice', array('choices' => $years))
			->add('rating', 'text', array())
		;
	}

	public function getName()
	{
		return 'movies';
	}

}