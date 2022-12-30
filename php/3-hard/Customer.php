<?php

declare(strict_types=1);


namespace App;


class Customer
{
		// Reviews
		/*
		 * Bonnes pratiques : Typer les données passées en paramètres, et les données de retour.
		 * + définir les propriétés en amont des méthodes
		 */


    public function __construct(String $name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental)
    {
        return $this->rentals[] = $rental;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function statement(): string {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";

				// Reviews
	      /*
	       * Lisibilité et maintenabilité : mettre cette partie ci-dessous dans une autre méthode
	       * + Ajouter des commentaires
	       *
	       * Bonnes pratiques : Pour les tests unitaires, utiliser des valeurs de retour
	       */
        foreach ($this->rentals as $each){
           $thisAmount = 0.0;

           /* @var $each Rental */
           // determines the amount for each line
           switch($each->getMovie()->getPriceCode()) {
               case Movie::REGULAR:
                   $thisAmount += 2;
                   if($each->getDaysRented() > 2)
                       $thisAmount += ($each->getDaysRented() - 2) * 1.5;
                   break;
               case Movie::NEW_RELEASE:
                   $thisAmount += $each->getDaysRented() * 3;
                   break;
               case Movie::CHILDREN:
                   $thisAmount += 1.5;
                   if($each->getDaysRented() > 3) {
                       $thisAmount += ($each->getDaysRented() - 3) * 1.5;
                   }
                   break;
           }

           $frequentRenterPoints++;

           if($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE
                && $each->getDaysRented() > 1)
               $frequentRenterPoints++;

            $result .= "\t" . $each->getMovie()->getTitle() . "\t"
                . number_format($thisAmount, 1) . "\n";
            $totalAmount += $thisAmount;

        }

        $result .= "You owed " . number_format($totalAmount, 1)  . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

        return $result;
    }

    private string $name;
    private array $rentals = [];
}