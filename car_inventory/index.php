<?php
    class Car {
        private static int $global_id = 0;
        private int $id;
        public string $make;
        public string $model;
        private int $price;
        public function __construct(string $make, string $model, int $price) {
            $this->make = $make;
            $this->model = $model;
            $this->price = $price;

            // Assign car id
            $this->id = self::getID();
        }

        /**
         * Returns the next available ID for this class
         * @return int
         */
        public static function getID() {
            return ++self::$global_id;
        }

        public function setPrice(int $newPrice) {
            // Only let the price change within 10% of the current price
            /* I know you used a switch statement with the examples, but I
             * want specialized messages depending on if the price was too low
             * or too high */
            if ($newPrice > 1.1 * $this->price) {
                print("Error: The new price must be below 110% of the current price.\n");
                return false;
            }
            else if ($newPrice < 0.9 * $this->price) {
                print("Error: The price must be able 90% of the current price.\n");
                return false;
            }
            // Price was good, let's allow the price to change
            $this->price = $newPrice;
            print("Car {$this->id} now costs \${$this->price}\n");
            return true; // True indicates the price was able to change.
        }
        public function getCar() {
            return [
                "id"=> $this->id,
                "make" => $this->make,
                "model"=> $this->model,
                "price"=> $this->price
            ];
        }
        public function __tostring() {
            return "I am a {$this->make} {$this->model} that costs \${$this->price}.\n";
        }
    }

    // Instantiate
    $car1 = new Car("Toyota", "Camry", 25000);
    $car2 = new Car("Honda", "Civic", 22000);

    // Store in array
    $cars = [$car1, $car2];

    // Detail with tostring
    foreach ($cars as $car) {
        print($car);
    }

    // Update cars
    $car1->setPrice(27000);
    $car2->setPrice(35000);

    // getCar
    print_r($car1->getCar());
    print_r($car2->getCar());

?>