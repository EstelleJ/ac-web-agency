<?php

declare(strict_types=1);


namespace App;


class Rental
{
	 // Reviews
	 /*
	 * Bonnes pratiques : Typer les données passées en paramètres, et les données de retour.
	  * + définir les propriétés en amont des méthodes
	  *
	  * Pour les tests unitaires, utiliser des valeurs de retour
	 */

    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getDaysRented(): int
    {
        return $this->daysRented;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    private Movie $movie;
    private int $daysRented;
}