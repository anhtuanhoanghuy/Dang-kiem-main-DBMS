<?php
require_once "./vendor/autoload.php";

class MongoDB {
    public $client;
    public $quanlydangkiemdb;

    public function __construct() {
        $this->client = new MongoDB\Client("mongodb://localhost:27017");
        $this->quanlydangkiemdb = $this->client->quanlydangkiem;
    }
}

// Sử dụng lớp MongoDB
$mongoDB = new MongoDB();
// Bây giờ bạn có thể sử dụng $mongoDB->quanlydangkiemdb để truy vấn MongoDB
?>