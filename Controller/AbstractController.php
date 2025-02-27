<?php
abstract class AbstractController{
  


    protected function render(string $template_name, array $data =[]){
        
       extract($data);
       
        require_once "Vue/header.php";
        require_once "Vue/$template_name.php";
        require_once "Vue/footer.php";
    }
}