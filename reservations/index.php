<?php
    class Reservation {
        // Properties (or fields?)
        private DateTimeImmutable $reservationDate;
        private string $reservationOwner;
        private int $amountOwed;
        // ctor
        public function __construct(string $owner, string $date) {
            $this->reservationOwner = $owner;
            $this->reservationDate = new DateTimeImmutable($date);
            $this->amountOwed = 0;
        }
        // Functions
        // Determines if reservation started, returns true or false
        public function hasReservationTakenPlace(DateTimeImmutable $testDate) {
            $diff = $this->reservationDate->diff($testDate);
            // The date was absolutely after the current date
            if ($diff->invert) {
                printf("The reservation happened %s year(s), %s month(s), and %s day(s) ago.\n", $diff->y, $diff->m, $diff->d);
                return true;
            }
            // Reservation has not happened yet
            printf("The reservation will happen in %s year(s), %s month(s), and %s day(s).\n", $diff->y, $diff->m, $diff->d);
            return false;
        }
        // Determine if the customer will have to pay the bill
        public function calculateBill(DateTimeImmutable $testDate) {
            // If reservation has happened
            if ($this->hasReservationTakenPlace($testDate)) {
                $this->amountOwed = 300.00;
            }
            // Return amount to pay.
            return $this->amountOwed;
        }
        // Pay off some of the bill. Returns the current balance. Negative values indicate credit.
        public function payBill(int $amountToPay) {
            // Subtract the amount from the bill and return
            $this->amountOwed -= $amountToPay;
            echo("You paid {$amountToPay} and now owe {$this->amountOwed}.\n");
            return $this->amountOwed;
        }
    }
    // I want a reservation!
    $myReservation = new Reservation("Scotty", "2024-09-25");
    // Let's see how much I owe. oh, 300!
    echo("I will end up owing $" . $myReservation->calculateBill(new DateTimeImmutable("2024-09-18")) . "\n");
    // I can pay 125 / month. Let's do that!
    $stillOwing = true;
    do {
        // Pay off 125
        $balance = $myReservation->payBill(125);
        if ($balance <= 0) {
            // Done paying bill
            $stillOwing = false;
        }
    } while ($stillOwing);
    // I paid it off!

?>