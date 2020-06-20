<?php
   function conecta_bd()
   {
      $link=mysqli_connect("localhost","root","","escola");
      if ($link)
         return($link);
      return(FALSE);
   }
?>