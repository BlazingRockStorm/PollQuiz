<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $conn=mysqli_connect("localhost","gryphon","123456","funquiz") or die("Failed to connect to MySQL: " . mysqli_connect_error());
        $sql="select * from question order by qid desc";
        $query=mysqli_query($conn,$sql);
        if(mysqli_num_rows($query) > 0){
         $row=mysqli_fetch_array($query);
         $qid=$row[qid];
         echo "<form action='poll.php?questionid=$qid' method='post' >";
         echo "<h2>$row[qtitle]</h2>";
         $sql2="select * from answer where qid='$qid' order by aid";
         $query2=mysqli_query($conn,$sql2);
         if(mysqli_num_rows($query2) > 0){
          while($row2=mysqli_fetch_array($query2)){
          echo "<input type=radio name=answer value=$row2[aid]>$row2[atitle]<br />";
          }
         }
         echo "<input type='submit' name='ok' value='Binh Chon'>";
         echo "<a href='result.php?questionid=$qid'>Xem Ket Qua</a>";
         echo "</form>";
        }
        ?>
    </body>
</html>
