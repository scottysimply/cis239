<?php

    class Car {
        public int $wheels;
        public string $name;
        private int $miles_driven;
        public function __construct(string $car_name, int $number_wheels) {
            $this->name = $car_name;
            $this->wheels = $number_wheels;
            $this->miles_driven = 0;
        }
        public function drive(int $miles) {
            printf("You drive for {$miles} miles.\n");
            if ($this->miles_driven + $miles > 5000 * $this->wheels) {
                printf("Your tires need replacing. Replaced {$this->wheels} tires.\n");
            }
            $this->miles_driven += $miles;
            printf("You've driven %s miles total.\n", $this->miles_driven);
        }
    }

    $myCar = new Car("Toyota", 4);
    $myCar->drive(300);
    $myCar->drive(200);
    $myCar->drive(1600);

?>