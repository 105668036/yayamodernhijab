<?php require_once('Connections/myconnect.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_myconnect, $myconnect);
$query_showdata = "SELECT * FROM student";
$showdata = mysql_query($query_showdata, $myconnect) or die(mysql_error());
$row_showdata = mysql_fetch_assoc($showdata);
$totalRows_showdata = mysql_num_rows($showdata);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p><a href="insert.php">เพิ่มข้อมูลใหม่</a></p>
<table width="601" height="237" border="1" align="center">
  <tr>
    <td bgcolor="#00FF00">รหัส</td>
    <td bgcolor="#FF00FF">ชื่อ-สกุล</td>
    <td bgcolor="#FFFF00">อายุ</td>
    <td bgcolor="#FF3300">E-mail</td>
    <td bgcolor="#00FFFF">option</td>
    <td bgcolor="#9933CC">&nbsp;</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_showdata['id']; ?></td>
      <td><?php echo $row_showdata['name']; ?></td>
      <td><?php echo $row_showdata['age']; ?></td>
      <td><?php echo $row_showdata['email']; ?></td>
      <td><a href="delete.php?id=<?php echo $row_showdata['id']; ?>?id=<?php echo $row_showdata['id']; ?>?id=<?php echo $row_showdata['id']; ?>">ลบ</a></td>
      <td><a href="update.php?id=<?php echo $row_showdata['id']; ?>">แก้ไข</a></td>
    </tr>
    <?php } while ($row_showdata = mysql_fetch_assoc($showdata)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($showdata);
?>
