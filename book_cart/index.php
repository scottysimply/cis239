<?php
    class Book {
        public int $id;
        public string $title;
        public float $price;
        public function __construct(int $id, string $title, float $price) {
            $this->id = $id;
            $this->title = $title;
            $this->price = $price;
        }
    }
    $bookList = [new Book(1, "Scythe", 6.19), new Book(2, "The Perks of Being a Wallflower", 4.29), new Book(3, "Looking For Alaska", 4.79)];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Book List</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th></th>
        </tr>
        <?php foreach ($book as $bookList) {?>
            <tr>
                <td><?=$book->title?></td>
                <td><?=$book->price?></td>
                <td><form><input type="submit" value="Check Out"></form></td>
            </tr>    
        <?php}?>
    </table>
</body>
</html>