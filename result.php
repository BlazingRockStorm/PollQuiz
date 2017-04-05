<?php
$conn=mysqli_connect("localhost","gryphon","123456","funquiz") or die("Failed to connect to MySQL: " . mysqli_connect_error());
if(isset($_GET['questionid'])){
 $qid=$_GET['questionid'];
 $sql="select * from question where qid='".$qid."'";
 $query=mysqli_query($conn,$sql);
 $row=mysqli_fetch_array($query);
 echo "<h2>$row[qtitle]</h2>";
 $sql2="select qid, SUM(acount) as total from answer group by qid having qid='".$qid."'";
 $query2=mysqli_query($conn,$sql2);
 $row2=mysqli_fetch_array($query2);
 $total=$row2['total'];
 $sql3="select * from answer where qid='".$qid."' order by aid";
 $query3=mysqli_query($conn,$sql3);
 if(mysqli_num_rows($query3) > 0){
  while($row3=mysqli_fetch_array($query3)){
  $percent=round(($row3['acount']/$total)*100,2);
  echo "<h4 style='color:red; font:12px verdana; '>$row3[atitle] : $row3[acount] ($percent %)</h4>";
  }
 }
}
?>