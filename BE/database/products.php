<?php

require_once("../classes/product.php");

$api = new Api();
$api->processRequest();


class Api {

    private $productService;

    public function __construct() {
        $this->productService = new ProductService();
    }

    public function processRequest() {        
        $method = $_SERVER['REQUEST_METHOD'];   // GET, POST, DELETE ?!
        switch ($method) {

            case "GET":
                $this->processGet();
                break;

            case "POST":
                $this->processPost();
                break;
            
            case "DELETE":
                $this->processDelete();
                break;

            default:
                // finally 
                $this->error(405, ["Allow: GET, POST, DELETE"], "Method not allowed");                
        }
    }

    private function processGet(){
        if(isset($_GET['products'])){
            $param = $_GET['products'];
            if(is_numeric($param)){
                // implemented get product by id
                $products = $this->productService->getProductById($param);
                $this->success(200, $products);
            } else {
                // implemented get all products
                $products = $this->productService->getAllProducts();
                $this->success(200, $products);
            }
        } else {
            $this->error(400, [], "Bad Request - invalid parameters " . http_build_query($_GET));
        }

    }

    private function processPost(){
        if(isset($_POST['products'])){
            $prod = $_POST['products'];
            $return = $this->productService->addProduct($prod);
            if($return==true){
                $this->success(200, []);
            } else {
                $this->error(503, [], "Product could not be created " . http_build_query($_GET));
            }
        } else {
            $this->error(400, [], "Bad Request - invalid parameters " . http_build_query($_GET));
        }
    }

    private function processDelete(){
        
    }

    private function success(int $code, $obj) {
        http_response_code($code);
        header('Content-Type: application/json');
        echo(json_encode($obj));
        exit;
    }

    private function error(int $code, array $headers, $msg) {
        http_response_code($code);
        foreach ($headers as $hdr) {
            header($hdr);
        }    
        echo ($msg);
        exit;
    }
}