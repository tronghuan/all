<?php
$conn = mysql_connect('localhost', 'root', 'consistency');
$db = mysql_select_db('qlbansua');

if(!isset($_GET['page'])){
	$_GET['page'] = 1;
}

$vitri = ($_GET['page']-1)*2;
$result = mysql_query('select * from sua limit '.$vitri.', 2');

echo '<table border="1">';
echo '<tr>
		<th width="50">Ma</th>
		<th width="150">Ten</th>
		<th width="200">Mo ta</th>
	</tr>';
while($row=mysql_fetch_assoc($result)){
	echo '<tr>
		<td>'. $row['ma'] . '</td>
		<td>'. $row['ten'] . '</td>
		<td>' .$row['mota'] . '</td>
		</tr>';
}
echo '</table>';

$re=mysql_query('select*from sua');
$n=mysql_num_rows($re);
$tong_so_trang=floor($n/2) + 1;
echo 'Tong so trang la: '.$tong_so_trang;

if ($_GET['page'] > 1) { echo '<a href="index.php?page='.($_GET['page']-1).'">back</a> ';}
for ($i=1 ; $i<=$tong_so_trang ; $i++) {
  if ($i == $_GET['page']) {
       echo '[Trang'.$i.'] ';
  } else {
      echo '<a href="index.php?page='.$i.'">Trang'.$i.'</a> ';
   }
 }

if ($_GET['page'] < $tong_so_trang) { echo '<a href="index.php?page='.($_GET['page']+1).'">next</a>';}
?>
