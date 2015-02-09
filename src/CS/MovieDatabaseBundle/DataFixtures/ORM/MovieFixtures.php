<?php
/**
 * Project of php-test-dev.loc.
 *
 * @author: Dmitriy Shuba <sda@sda.in.ua>
 * @link: http://granart-studio.com/ GranArt 
 * Date Time: 09.02.2015 12:30
 */

namespace CS\MovieDatabaseBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CS\MovieDatabaseBundle\Entity\Movie;
use CS\MovieDatabaseBundle\Entity\Rating;

class MovieFixtures implements FixtureInterface
{

	const positions_count = 500;
	const rating_min = 0;
	const rating_max = 10;

	const year_min = 1900;
	const year_max = 2015;

	const title_pattern = 'Movie #';
	const description_pattern = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed dictum massa. Vivamus euismod ex sed venenatis ultrices.';

	public function load(ObjectManager $manager)
	{
		for($i = 0; $i <= self::positions_count; $i++)
		{


			$movie = new Movie();
			$movie
				->setTitle(self::title_pattern . ($i + 1))
				->setDescription($movie->getTitle() . '. ' . self::description_pattern)
				->setYear(mt_rand(self::year_min, self::year_max))
			;
			$manager->persist($movie);

			$rating = new Rating();
			$rating
				->setMovie($movie)
				->setValue(mt_rand(self::rating_min, self::rating_max))
			;
			$manager->persist($rating);

		}

		$manager->flush();
	}

}