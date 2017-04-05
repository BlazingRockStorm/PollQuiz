<?php
$conn=mysqli_connect("localhost","gryphon","123456","funquiz") or die("Failed to connect to MySQL: " . mysqli_connect_error());
if(isset($_POST['ok'])){
 $id=$_POST['answer'];
 $qid=$_GET['questionid'];
 $sql3="update answer set acount=acount + 1 where aid='".$id."'";
 mysqli_query($conn,$sql3);
 header("location: result.php?questionid=$qid");
 exit();
}
$sql="select * from question order by qid desc";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query) > 0){
 $row=mysqli_fetch_array($query);
 $qid=$row[qid];
 echo "<form action='poll.php?questionid=$qid' method='post' >";
 echo "<h2>$row[qtitle]</h2>";
 $sql2="select * from answer where qid='$qid' order by aid";
 $query2=mysqli_query($sql2);
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