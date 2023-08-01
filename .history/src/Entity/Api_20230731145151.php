<?php



class API {
    private $conn;
    private $product;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
        $this->product = new Product($this->conn);
    }

    public function handleRequest() {
        if (isset($_GET['idProduct']) && is_numeric($_GET['idProduct'])) {
            $idProduct = $_GET['idProduct'];
            $product = $this->product->getProductById($idProduct);
            if ($product) {
                header('Content-Type: application/json');
                echo json_encode($product);
            } else {
                header("HTTP/1.1 404 Not Found");
                echo json_encode(['error' => 'Produit non trouvé']);
            }
        } else {
            header("HTTP/1.1 400 Bad Request");
            echo json_encode(['error' => 'Id de produit invalide']);
        }
    }
}
