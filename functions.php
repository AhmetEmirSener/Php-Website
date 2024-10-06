<?php


function ShowMessage($message){
    if(isset($message)){
        foreach($message as $message){
            echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
        }
    }
}

?>