<?php 
echo '<pre>';
print_r($_POST);
echo '</pre>';
if($_POST){
    foreach($_POST as $key => $value){
        echo "$key: $value<br>";
    }
}
?>