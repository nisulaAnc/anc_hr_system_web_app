<?php 
  // require_once('../Library/config.php'); 
  require_once('db_connect.php');
?>
<?php
/*$con = mysqli_connect($dbhost,$dbuser,$dbpass);
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['MM_Username'])){
header("Location:../index.php");
}
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}*/
?>
<?php 
  //require_once('../Library/timeconfig.php'); 
?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = is_string($theValue) ? addslashes($theValue) : $theValue;
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$date = date('Y-m-d');

if  ((isset($_POST["update_religion"])) && ($_POST["update_religion"] == "update_religion")){
	
  $updateSQL = sprintf("UPDATE `v_hr_staff` SET `race`=%s, `religion`=%s WHERE `eid`='%s'",
					   GetSQLValueString($_POST['race'], "text"),
					   GetSQLValueString($_POST['religion'], "text"),
					   GetSQLValueString($_POST['eid'], "int"));
					   
  mysqli_select_db($con, $dbname);
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  $updateGoTo = "staff.php?a=2";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update21"])) && ($_POST["MM_update21"] == "form21")) {
  $updateSQL = sprintf("UPDATE v_hr_staff SET `salutation`=%s, `full_name`=%s, `calling_name`=%s, `dob`=%s, `nic_pp`=%s, `gender`=%s, `marital_status`=%s, `race`=%s, `religion`=%s, `address`=%s, `mobile`=%s, `academic_qualification`=%s, `prof_qualification`=%s, `updated_by`=%s, `updated_on`=%s, `home_phone`=%s, `personal_email`=%s , `personal_mobile`=%s WHERE eid=%s",
                       GetSQLValueString($_POST['salutation'], "text"),
                       GetSQLValueString($_POST['full_name'], "text"),
                       GetSQLValueString($_POST['calling_name'], "text"),
                       GetSQLValueString($_POST['dob'], "text"),
                       GetSQLValueString($_POST['nic_pp'], "text"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($_POST['marital_status'], "text"),
                       GetSQLValueString($_POST['race'], "text"),
                       GetSQLValueString($_POST['religion'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['academic_qualification'], "text"),
                       GetSQLValueString($_POST['prof_qualification'], "text"),
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
                       GetSQLValueString($date, "text"), 
                       // new added
                       GetSQLValueString($_POST['home_phone'], "text"),
                       GetSQLValueString($_POST['personal_email'], "text"),
                       GetSQLValueString($_POST['personal_mobile'], "text"),
                       GetSQLValueString($_POST['eid'], "int"));
  mysqli_select_db($con, $dbname);
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  $updateGoTo = "staff.php?&z=".$_POST['eid'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update22"])) && ($_POST["MM_update22"] == "form22")) {
  $updateSQL = sprintf("UPDATE v_hr_staff SET `job_status`=%s, `branch`=%s, `department`=%s, `current_designation`=%s, `internal_designation`=%s, `product_type`=%s, `product`=%s, `location`=%s, `seating_location`=%s, `category_type`=%s, `category`=%s, `emp_type`=%s, `emp_subtype`=%s, `new_replace`=%s, `epf`=%s, `ext`=%s, `updated_by`=%s, `updated_on`=%s WHERE eid=%s",
                       GetSQLValueString($_POST['job_status'], "text"),
                       GetSQLValueString($_POST['branch'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString($_POST['current_designation'], "text"),
                       GetSQLValueString($_POST['internal_designation'], "text"),
                       GetSQLValueString($_POST['product_type'], "text"),
                       GetSQLValueString($_POST['product'], "text"),
                       GetSQLValueString($_POST['location'], "text"),
                       GetSQLValueString($_POST['seating_location'], "text"),
                       GetSQLValueString($_POST['category_type'], "text"),
                       GetSQLValueString($_POST['category'], "text"),
                       GetSQLValueString($_POST['emp_type'], "text"),
                       GetSQLValueString($_POST['emp_subtype'], "text"),
                       GetSQLValueString($_POST['new_replace'], "text"),
                       GetSQLValueString($_POST['epf'], "text"),
                       GetSQLValueString($_POST['ext'], "text"),
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
                       GetSQLValueString($date, "text"),
                       GetSQLValueString($_POST['eid'], "int"));
  mysqli_select_db($con, $dbname);
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  $updateGoTo = "staff.php?&z=".$_POST['eid'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update23"])) && ($_POST["MM_update23"] == "form23")) {
  // Only save doj if join_status is Yes
  $doj_value = ($_POST['join_status'] === 'Yes' && !empty($_POST['doj'])) ? $_POST['doj'] : '';
  // Updated line
  $updateSQL = sprintf("UPDATE v_hr_staff SET `join_status`=%s, `doj`=%s, `joined_designation`=%s, `promotion`=%s, `date_promotion`=%s, `resignation`=%s, `last_promo_year`=%s, `updated_by`=%s, `updated_on`=%s WHERE eid=%s",
                      // new added
                       GetSQLValueString($_POST['join_status'], "text"),
                      //
                       GetSQLValueString($doj_value, "date"),
                       GetSQLValueString($_POST['joined_designation'], "text"),
                       GetSQLValueString($_POST['promotion'], "text"),
                       GetSQLValueString($_POST['date_promotion'], "text"),
                       GetSQLValueString($_POST['resignation'], "text"),
                       GetSQLValueString($_POST['last_promo_year'], "text"),
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
                       GetSQLValueString($date, "text"),
                       GetSQLValueString($_POST['eid'], "int"));
  mysqli_select_db($con, $dbname);
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  $updateGoTo = "staff.php?&z=".$_POST['eid'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update24"])) && ($_POST["MM_update24"] == "form24")) {
  $updateSQL = sprintf("UPDATE v_hr_staff SET `jd`=%s, `bcard`=%s, `phone`=%s, `cdma`=%s, `laptop`=%s, `camera`=%s, `id_card`=%s, `dongle`=%s, `nc_clause`=%s, `insurance`=%s, `sscard`=%s, `updated_by`=%s, `updated_on`=%s WHERE eid=%s",
                       GetSQLValueString($_POST['jd'], "text"),
                       GetSQLValueString($_POST['bcard'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['cdma'], "text"),
                       GetSQLValueString($_POST['laptop'], "text"),
                       GetSQLValueString($_POST['camera'], "text"),
                       GetSQLValueString($_POST['id_card'], "text"),
                       GetSQLValueString($_POST['dongle'], "text"),
                       GetSQLValueString($_POST['nc_clause'], "text"),
                       GetSQLValueString($_POST['insurance'], "text"),
                       GetSQLValueString($_POST['sscard'], "text"),
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
                       GetSQLValueString($date, "text"),
                       GetSQLValueString($_POST['eid'], "int"));
					   
 mysqli_select_db($con, $dbname);
 $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

 $updateGoTo = "staff.php?&z=".$_POST['eid'];
 if (isset($_SERVER['QUERY_STRING'])) {
  $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
  $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
 header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update25"])) && ($_POST["MM_update25"] == "form25")) {
  $updateSQL = sprintf("UPDATE v_hr_staff SET `emp_typeduration`=%s, `retirement`=%s, `confirmation`=%s, `confirm_renewal`=%s, `other`=%s, `comments`=%s, `updated_by`=%s, `updated_on`=%s WHERE eid=%s",
                       GetSQLValueString($_POST['emp_typeduration'], "text"),
                       GetSQLValueString($_POST['retirement'], "text"),
                       GetSQLValueString($_POST['confirmation'], "text"),
                       GetSQLValueString($_POST['confirm_renewal'], "text"),
                       GetSQLValueString($_POST['other'], "text"),
                       GetSQLValueString($_POST['comments'], "text"),
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
                       GetSQLValueString($date, "text"),
                       GetSQLValueString($_POST['eid'], "int"));
					   
  mysqli_select_db($con, $dbname);
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  $updateGoTo = "staff.php?&z=".$_POST['eid'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update26"])) && ($_POST["MM_update26"] == "form26")) {
  $updateSQL = sprintf("UPDATE v_hr_staff SET `sal_grid_designation`=%s, `sal_grid_grade`=%s, `basic_after_increment`=%s, `allowances`=%s, `prof_fees`=%s, `updated_by`=%s, `updated_on`=%s WHERE eid=%s",
                       GetSQLValueString($_POST['sal_grid_designation'], "text"),
                       GetSQLValueString($_POST['sal_grid_grade'], "text"),
                       GetSQLValueString($_POST['basic_after_increment'], "text"),
                       GetSQLValueString($_POST['allowances'], "text"),
                       GetSQLValueString($_POST['prof_fees'], "text"),
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
                       GetSQLValueString($date, "text"),
                       GetSQLValueString($_POST['eid'], "int"));
					   
  mysqli_select_db($con, $dbname);
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  $updateGoTo = "staff.php?&z=".$_POST['eid'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update27"])) && ($_POST["MM_update27"] == "form27")) {
  $updateSQL = sprintf("UPDATE v_hr_staff SET `2018_april_evaluation`=%s, `2018_april_kpi`=%s, `2018_april_competency`=%s, `annual`=%s, `casual`=%s, `sick`=%s, `updated_by`=%s, `updated_on`=%s WHERE eid=%s",
                       GetSQLValueString($_POST['2018_april_evaluation'], "text"),
                       GetSQLValueString($_POST['2018_april_kpi'], "text"),
                       GetSQLValueString($_POST['2018_april_competency'], "text"),
                       GetSQLValueString($_POST['annual'], "text"),
                       GetSQLValueString($_POST['casual'], "text"),
                       GetSQLValueString($_POST['sick'], "text"),
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
                       GetSQLValueString($date, "text"),
                       GetSQLValueString($_POST['eid'], "int"));
					   
  mysqli_select_db($con, $dbname);
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  $updateGoTo = "staff.php?&z=".$_POST['eid'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update47"])) && ($_POST["MM_update47"] == "form47")) {
  $updateSQL = sprintf("UPDATE v_hr_staff SET `email`=%s, `reporting_to_name`=%s, `reporting_epf`=%s, `dir_type`=%s, `hod`=%s, `hod_status`=%s, `updated_by`=%s, `updated_on`=%s WHERE eid=%s",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['reporting_to_name'], "text"),
                       GetSQLValueString($_POST['reporting_epf'], "text"),
                       GetSQLValueString($_POST['dir_type'], "text"),
                       GetSQLValueString($_POST['hod'], "text"),
                       GetSQLValueString($_POST['hod_status'], "text"),
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
                       GetSQLValueString($date, "text"),
                       GetSQLValueString($_POST['eid'], "int"));
					   
  mysqli_select_db($con, $dbname);
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
  $updateGoTo = "staff.php?&z=".$_POST['eid'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update28"])) && ($_POST["MM_update28"] == "form28")) {
  $updateSQL = sprintf("UPDATE v_hr_staff SET `2019_overall_kpi`=%s, `2019_overall_criteria`=%s, `updated_by`=%s, `updated_on`=%s WHERE eid=%s",
                       GetSQLValueString($_POST['2019_overall_kpi'], "text"),
                       GetSQLValueString($_POST['2019_overall_criteria'], "text"),
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
                       GetSQLValueString($date, "text"),
                       GetSQLValueString($_POST['eid'], "int"));
					   
  mysqli_select_db($con, $dbname);
  $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  $updateGoTo = "staff.php?&z=".$_POST['eid'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  // Only save date_join if join_status is Yes
  $date_join_value = ($_POST['join_status'] === 'Yes' && !empty($_POST['date_join'])) ? $_POST['date_join'] : '';
  $insertSQL = sprintf("INSERT INTO v_hr_staff (category, job_status, department, epf, salutation, full_name, calling_name, dob, nic_pp, gender, doj, join_status, current_designation, emp_type, office_sim, ext, comments, created_by, created_on, updated_by, updated_on) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['category'], "text"),
                       GetSQLValueString("Active", "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString($_POST['epf'], "text"),
                       GetSQLValueString($_POST['salutation'], "text"),
                       GetSQLValueString($_POST['full_name'], "text"),
                       GetSQLValueString($_POST['calling_name'], "text"),
                       GetSQLValueString($_POST['dob'], "text"),
                       GetSQLValueString($_POST['nic_pp'], "text"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($date_join_value, "date"),
                       GetSQLValueString($_POST['join_status'], "text"),
                       GetSQLValueString($_POST['current_designation'], "text"),
                       GetSQLValueString($_POST['emp_type'], "text"),
                       GetSQLValueString($_POST['office_sim'], "text"),
                       GetSQLValueString($_POST['ext'], "text"),
                       GetSQLValueString($_POST['comments'], "text"),
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
                       GetSQLValueString($date, "text"),
                       GetSQLValueString($_SESSION['MM_Username'], "text"),
                       GetSQLValueString($date, "text"));
					   
  mysqli_select_db($con, $dbname);
  $Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));
  

  $updateGoTo = "staff.php?a=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$a = @$_SESSION['MM_Username'];

mysqli_select_db($con, $dbname);
$query_Recordset2 = "SELECT * FROM users WHERE username='$a'";
$Recordset2 = mysqli_query($con, $query_Recordset2) or die(mysqli_error($con));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

// If no session, default to 'admin' so ALL sections show
if (!is_array($row_Recordset2)) {
    $row_Recordset2 = [
        'id'           => 0,
        'firstname'    => 'Guest',
        'lastname'     => '',
        'username'     => '',
        'access_level' => 'admin',
        'user_level'   => 'admin',
        'branch'       => '',
        'department'   => '',
        'eid'          => 0,
    ];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: ANC HR SYSTEM ::</title>
<?php //require_once('../styles.css'); ?>
<script type="text/javascript">
  // For Add Staff form 
function toggleJoinDateField() {
    var statusEl = document.getElementById('join_status_add');
    var dateField = document.getElementById('date_join_add');
    if (!statusEl || !dateField) return;
    if (statusEl.value === 'Yes') {
        dateField.disabled = false;
        dateField.style.backgroundColor = "#FFFFFF";
    } else {
        dateField.disabled = true;
        dateField.value = "";
        dateField.style.backgroundColor = "#EBEBE4";
    }
}

// For Historical edit form 
function toggleDojField() {
    var statusEl = document.getElementById('join_status_edit');
    var dateField = document.getElementById('doj_edit');
    if (!statusEl || !dateField) return;
    if (statusEl.value === 'Yes') {
        dateField.disabled = false;
        dateField.style.backgroundColor = "#FFFFFF";
    } else {
        dateField.disabled = true;
        dateField.style.backgroundColor = "#EBEBE4";
    }
}

window.addEventListener('load', function() {
    toggleJoinDateField();
    toggleDojField();
});
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th height="60" bgcolor="#438EB8"><img src="../images/logo.png" align="left" width="25%"/></th>
    <th height="60" colspan="2" bgcolor="#438EB8" class="style1">ANC - HR System</th>
  </tr>
  <tr>
    <th height="500" width="200" bgcolor="#E2E2E2" valign="top" scope="row">
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <th height="35" bgcolor="#10232E" align="left"><span class="style2"><strong>Welcome, <?php echo $row_Recordset2['firstname']."!";?></strong></span></th>
      </tr>
      <tr>
        <th height="40" bgcolor="#F8F8F8" align="left"><span class="style2"><a href="../default.php">Dashboard</a></span></th>
      </tr>
      <tr>
        <th height="40" bgcolor="#F8F8F8" align="left"><span class="style2">Change Password</span></th>
      </tr>
      <tr>
        <th height="40" bgcolor="#F8F8F8" align="left"><span class="style2"><a href="<?php echo $logoutAction ?>">Logout</a></span></th>
      </tr>
    </table></th>
    <td width="5" valign="top" bgcolor="#438EB8">&nbsp;</td>
    <td valign="top" bgcolor="#C7D3E9">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr valign="middle" bgcolor="#58BDED">
    <td height="35" width="10%">
    <form id="form1" name="form1" method="post" action="staff.php">
         <button class="button button2">Add Staff Member</button>
        <input type="hidden" name="add_staff" value="add"/>
          </form>
          </td>
    <td>
        <form id="form2" name="form2" method="post" action="staff.php">
            <button class="button button2">All Staff Members</button>
            <input type="hidden" name="view_staff" value="view"/>
        </form>
        <form id="form2" name="form2" method="post" action="staff new.php">
            <button class="button button2">Staff New Page</button>
            <input type="hidden" name="view_staff" value="view"/>
        </form>
    </td>
    </tr>
    </table>
    <?php  if (isset($_POST['add_staff'])){?> <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr>
    <td valign="top">
      <table width="100%" align="center" cellpadding="0" cellspacing="1">
        <tr valign="center">
          <td height="30" colspan="7" align="center" nowrap="nowrap" bgcolor="#EEF2F9">&nbsp;&nbsp;&nbsp;<span class="style4"><strong>Add New Staff Member:</strong></span></td>
          </tr>
        <tr valign="middle">
          <td height="18" colspan="7" bgcolor="#EEF2F9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr bgcolor="#C7D3E9">
        <td width="75%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td width="2%" bgcolor="#EEF2F9"><span class="style14">1.</span></td>
            <td width="20%" bgcolor="#EEF2F9" class="style14">&nbsp;Category:</td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <select name="category" class="style291" required="required">
                <option value="Manager & Above">Manager & Above</option>
                <option value="Assist. Manager & Below">Assist. Manager & Below</option>
                <option value="Faculty">Faculty</option>
                <option value="ANC Omega">ANC Omega</option>
              </select>
            </span></td>
          </tr>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">2.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;Department:</td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <select name="department" class="style291">
                    <?php 
		 		    mysqli_select_db($con, $dbname);
				    $query1 = "SELECT department FROM v_hr_departments"; 
	                $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
				    while($row1 = mysqli_fetch_array($result1)){ ?>
					  	<option value="<?php echo $row1['department']; ?>"><?php echo $row1['department']; ?></option><?php } ?>
                </select>
            </span></td>
          </tr>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">3.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;EPF No.:</td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <input type="text" name="epf" class="style291" value="" size="5" />
            </span></td>
          </tr>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">4.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;Name:</td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <!-- <select name="salutaion2" class="style291"> -->
              <select name="salutaion" class="style291">
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Ms.">Ms.</option>
              </select>
              <input type="text" name="full_name" class="style291" value="" size="60" required="required"/>
            </span></td>
          </tr>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">5.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;Calling Name:</td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <input type="text" name="calling_name" class="style291" value="" size="15" />
            </span></td>
          </tr>
          <!-- req 71 -->
           <?php if (!($row_Recordset2['access_level']=='admin')){ ?>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">6.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;Date of Birth:</td>
            <td bgcolor="#EEF2F9"><input type="date" name="dob" value="" class="style291"/></td>
          </tr>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">7.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;NIC/Passport No.:</td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <input type="text" name="nic_pp" class="style291" value="" size="10" />
            </span></td>
          </tr>
          <?php } ?> 
          <!-- req 71 -->
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">8.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;Sex:</td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <select name="gender" class="style291">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </span></td>
          </tr>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">9.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;Date Joined:</td>
            <td bgcolor="#EEF2F9"><input type="date" name="doj" value="" class="style291"/></td>
          </tr>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">10.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;Current Designation:</td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <input type="text" name="current_designation" class="style291" value="" size="40" />
            </span></td>
          </tr>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">11.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;Employment Type:</td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <select name="emp_type" class="style291">
                <option value="Permanent">Permanent</option>
                <option value="Contract">Contract</option>
                <option value="Probation">Probation</option>
                <option value="Consultant">Consultant</option>
                <option value="Freelancer">Freelancer</option>
                <option value="Independent Service Provider">Independent Service Provider</option>
              </select>
            </span></td>
          </tr>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">12.</span></td>
            <td bgcolor="#EEF2F9" class="style14"> &nbsp;SIM:</td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <input type="text" name="office_sim" class="style291" value="" size="10" />
            </span></td>
          </tr>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">13.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;Extension:</td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <input type="text" name="ext" class="style291" value="" size="5" />
            </span></td>
          </tr>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">14.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;
              <p>Comments:</p>
              <p>(Maximum Characters - 200)</p></td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <textarea name="comments" cols="50" rows="6" class="style291"></textarea>
            </span></td>
          </tr>
          <!-- Added join status and date joined -->
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">15.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;Join Status:</td>
            <td bgcolor="#EEF2F9">
              <select name="join_status" id="join_status_add" class="style291" onchange="toggleJoinDateField()">
                <option value="No" selected="selected">No</option>
                <option value="Yes">Yes</option>
              </select>
            </td>
          </tr>
          <tr>
            <td bgcolor="#EEF2F9"><span class="style14">16.</span></td>
            <td bgcolor="#EEF2F9" class="style14">&nbsp;Date Joined:</td>
            <td bgcolor="#EEF2F9">
              <input type="date" name="date_join" id="date_join_add" class="style291" disabled="disabled" style="background-color:#EBEBE4;" />
              <span class="style14">&nbsp;(Enabled only when Join Status = Yes)</span>
            </td>
          </tr>
        </table></td>
        <td width="25%">&nbsp;</td>
      </tr>
    </table></td>
        </tr>
        <tr valign="baseline">
          <td height="81" colspan="7" align="left" valign="middle" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">
            <input type="submit" value="Add Record" class="style29"/>
            <br />
          </span></td>
          </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1" />
      <input type="hidden" name="job_status" value="Pending" />
      <input type="hidden" name="emp_id" value="<?php echo $row_Recordset2['id']; ?>" /></td>
    </tr></table>
    </form>
  <?php }?>
    <?php  if (isset($_POST['eid']) || isset($_GET['z'])){
      $maxRows_DetailRS1 = 20;
          $pageNum_DetailRS1 = 0;
          if (isset($_GET['pageNum_DetailRS1'])) {
              $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
          }
          $startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;
          mysqli_select_db($con, $dbname);
          if (@$_POST['eid']) { $recID = $_POST['eid']; }
          if (@$_GET['z'])    { $recID = $_GET['z']; }
          $query_DetailRS1 = "SELECT * FROM v_hr_staff WHERE eid = $recID";
          $query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
          $DetailRS1 = mysqli_query($con, $query_limit_DetailRS1) or die(mysqli_error($con));
          $row_DetailRS1 = mysqli_fetch_assoc($DetailRS1);

  ?>
  <table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr valign="middle">
                <td height="30" colspan="2" align="left" bgcolor="#C7D3E9">
                    <!-- Req 71 -->
                      <?php //if (!($row_Recordset2['access_level']=='member'))
                      if ($row_Recordset2['access_level']=='admin' || $row_Recordset2['access_level']=='member'){ ?>
                	  <form id="form2" name="form2" method="post" action="../kpi/kpi.php">
                      <button class="button button2">2020 KPI's</button>
                      <input type="hidden" name="view_kpi" value="view"/>
                  		<input type="hidden" name="eid" value="<?php echo $row_DetailRS1['eid']; ?>"/>
                    </form>
                      <!-- Req 71 -->
                    <?php } ?>
                  </td>
              </tr>
    </table>
    
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr>
    <td valign="top">
      <table width="100%" align="center" cellpadding="0" cellspacing="1">
        <tr valign="center">
          <td height="30" colspan="7" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style4"><strong>Employee Profile </strong>- </span><span class="style291">Last Update By: &nbsp;<?php echo $row_DetailRS1['updated_by']; ?>, on <?php echo $row_DetailRS1['updated_on']; ?>
          </span></td>
          </tr>
          <tr>
            <td height="5" colspan="7" bgcolor="#438EB8"></td>
            </tr>
        <tr valign="middle">
          <td height="18" colspan="7" bgcolor="#C7D3E9">	
      <form action="<?php echo $editFormAction; ?>" method="post" name="form21" id="form21">					 			
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr valign="middle">
            <td height="30" colspan="2" align="left" bgcolor="#C7D3E9">&nbsp;<span class="style4"><strong>Personal Info</strong></span></td>
            </tr>
          <tr valign="middle">
            <td width="20%" align="center" bgcolor="#EEF2F9" class="style291"><img src="../images/logo.png" /></td>
            <td bgcolor="#C7D3E9">
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr height="30" valign="middle">
            <td width="20%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Full Name</span></td>
            <td bgcolor="#EEF2F9"><span class="style14">
              <select name="salutation" class="style291">
                <option value="<?php echo $row_DetailRS1['salutation'];?>"><?php echo $row_DetailRS1['salutation'];?></option>
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Ms.">Ms.</option>
              </select>
              <input type="text" name="full_name" class="style291" value="<?php echo $row_DetailRS1['full_name'];?>" size="60" />
            </span></td>
          </tr>
          <tr height="30" valign="middle">
            <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Calling Name</span></td>
            <td bgcolor="#EEF2F9"><input type="text" name="calling_name" class="style291" value="<?php echo $row_DetailRS1['calling_name'];?>" size="15" /></td>
          </tr>
          <!-- Req 71 -->
            <?php //if (!($row_Recordset2['access_level']=='member'))
              if ($row_Recordset2['access_level']=='admin' || $row_Recordset2['access_level']=='member'){ ?>
          <tr height="30" valign="middle">
            <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Date of Birth</span></td>
            <td bgcolor="#EEF2F9"><input type="date" name="dob" value="<?php echo $row_DetailRS1['dob'];?>" class="style291"/>
              <span class="style14">(MM/DD/YYYY)</span></td>
          </tr>
          <tr height="30">
            <td bgcolor="#EEF2F9"><span class="style14">&nbsp;NIC/ Passport</span></td>
            <td bgcolor="#EEF2F9"><input type="text" name="nic_pp" class="style291" value="<?php echo $row_DetailRS1['nic_pp'];?>" size="10" /></td>
          </tr>
           <!--  req 71 editofmalith 2021-12-10 create new user level with member role type -->
          <?php } ?>
          <tr height="30">
            <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Gender</span></td>
            <td bgcolor="#EEF2F9"><select name="gender" class="style291">
                <option value="<?php echo $row_DetailRS1['gender'];?>"><?php echo $row_DetailRS1['gender'];?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select></td>
          </tr>
          <tr height="30">
            <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Marital Status</span></td>
            <td bgcolor="#EEF2F9"><select name="marital_status" class="style291">
                <option value="<?php echo $row_DetailRS1['marital_status'];?>"><?php echo $row_DetailRS1['marital_status'];?></option>
                <option value="Married">Married</option>
                <option value="Single">Single</option>
                </select></td>
          </tr>
          <tr height="30">
            <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Religion/ Race</span></td>
            <td bgcolor="#EEF2F9"><select name="religion" class="style291">
                <option value="<?php echo $row_DetailRS1['religion'];?>"><?php echo $row_DetailRS1['religion'];?></option>
                        <option value="Buddhist">Buddhist</option>
                        <option value="Catholic">Catholic</option>
                        <option value="Christian">Christian</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Islamic">Islamic</option>
                </select>&nbsp;/
                <select name="race" class="style291">
                        <option value="<?php echo $row_DetailRS1['race'];?>"><?php echo $row_DetailRS1['race'];?></option>
                        <option value="Sinhala">Sinhala</option>
                        <option value="Tamil">Tamil</option>
                        <option value="Muslim">Muslim</option>
                        <option value="Burger">Burger</option>
                        <option value="Indian">Indian</option>
                        </select></td>
          </tr>
          <tr height="30">
            <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Address</span></td>
            <td bgcolor="#EEF2F9"><input type="text" name="address" value="<?php echo $row_DetailRS1['address'];?>" class="style291" size="75"/></td>
          </tr>
          <tr height="30">
            <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Office Mobile</span></td>
            <td bgcolor="#EEF2F9"><input type="text" name="mobile" value="<?php echo $row_DetailRS1['mobile'];?>" class="style291" size="15"/></td>
          </tr>
           <tr height="30">
            <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Personal Mobile</span></td>
            <td bgcolor="#EEF2F9"><input type="text" name="personal_mobile" value="<?php echo $row_DetailRS1['personal_mobile'];?>" class="style291" size="15"/></td>
          </tr>
          <tr height="30">
            <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Home Phone</span></td>
            <td bgcolor="#EEF2F9"><input type="text" name="home_phone" value="<?php echo $row_DetailRS1['home_phone'];?>" class="style291" size="15"/></td>
          </tr>
          <tr height="30">
            <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Personal Email</span></td>
            <td bgcolor="#EEF2F9"><input type="text" name="personal_email" value="<?php echo $row_DetailRS1['personal_email'];?>" class="style291" size="15"/></td>
          </tr>
          <!-- req 71 -->
          <?php //if (!($row_Recordset2['access_level']=='member'))
          if ($row_Recordset2['access_level']=='admin' || $row_Recordset2['access_level']=='member'){ ?>
          <tr height="30">
            <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Academic Qualifications</span></td>
            <td bgcolor="#EEF2F9"><textarea name="academic_qualification" cols="50" rows="6" class="style291"><?php echo $row_DetailRS1['academic_qualification'];?></textarea></td>
          </tr>
          <tr height="30">
          <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Professional Qualifications</span></td>
          <td bgcolor="#EEF2F9"><textarea name="prof_qualification" cols="50" rows="6" class="style291"><?php echo $row_DetailRS1['prof_qualification'];?></textarea></td>
          </tr>
          <?php } ?>
          <!-- req 71 -->
          <tr height="30">
            <td bgcolor="#EEF2F9">&nbsp;</td>
            <td bgcolor="#EEF2F9" align="right">
              <input type="submit" value="Update Personal Info" class="style29"/>
      <input type="hidden" name="MM_update21" value="form21" />
      <input type="hidden" name="eid" value="<?php echo $row_DetailRS1['eid']; ?>"/></td>
          </tr>
     		</table></td>
          </tr>
          <tr>
            <td height="5" colspan="2" bgcolor="#438EB8"></td>
            </tr>
     		</table></form>
     		<!-- leave system access enabling 2024-05-15 -->
     		<?php 
     		if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']);}
     		if($row_DetailRS1['eid']>0){ $eid= $row_DetailRS1['eid']; }else{ $eid= -1 ;  }
            $query_Recordset4 = "SELECT * FROM users WHERE eid='$eid'";
            $Recordset4 = mysqli_query($con, $query_Recordset4) or die(mysqli_error($con));
            $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
            $totalRows_Recordset4 = mysqli_num_rows($Recordset4); 
            if($totalRows_Recordset4 ==1){ ?>
                <form action="eid_update.php" method="post" name="form2" id="form2">
                <table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                        <td valign="top">
                          <table width="100%" align="center" cellpadding="0" cellspacing="1">
                            <tr valign="center">
                              <td height="30" colspan="7" align="center" nowrap="nowrap" bgcolor="#C7D3E9">&nbsp;&nbsp;&nbsp;<span class="style4"><strong>Update User Details:</strong></span></td>
                              </tr>
                            <tr valign="middle" height="22">
                              <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">1.</span></td>
                              <td width="202" align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;First Name:</span></td>
                              <td width="390" colspan="5" bgcolor="#EEF2F9"><span class="style14">&nbsp;<input type="text" name="firstname" value="<?php echo $row_Recordset4['firstname'];?>" class="style29" required="required" />
                    		  <?php $eid=$row_Recordset4['eid'];
                    				 mysqli_select_db($con, $dbname);
                    				 $query1 = "SELECT full_name FROM v_hr_staff WHERE eid='$eid'"; 
                    	              $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                    				  while($row1 = mysqli_fetch_array($result1)){
                    					  echo $row1['full_name'];}?></span></td>
                              </tr>
                            <tr valign="middle" height="22">
                              <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">2.</span></td>
                              <td width="202" align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;Last Name:</span></td>
                              <td width="390" colspan="5" bgcolor="#EEF2F9"><span class="style14">&nbsp;<input type="text" name="lastname" value="<?php echo $row_Recordset4['lastname'];?>" class="style29" required="required" />
                              </span></td>
                              </tr>
                            <tr valign="middle" height="22">
                                <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">3.</span></td>
                                <td width="202" align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;Branch:</span></td>
                                <td width="390" colspan="5" bgcolor="#EEF2F9"><span class="style14">&nbsp;<select name="branch" class="style29">
                                    <option value="<?php echo $row_Recordset4['branch'];?>"><?php echo $row_Recordset4['branch'];?></option>
                                    <?php 
                    				 mysqli_select_db($con, $dbname);
                    				 $query1 = "SELECT branch FROM crm_products GROUP BY branch ORDER BY pid"; 
                    	             $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                    				 while($row1 = mysqli_fetch_array($result1)){?>
                                        <option value="<?php echo $row1['branch'];?>"><?php echo $row1['branch'];}?></option>
                              </select>
                                  <?php $eid=$row_Recordset4['eid'];
                    				  mysqli_select_db($con, $dbname);
                    				  $query1 = "SELECT branch FROM v_hr_staff WHERE eid='$eid'"; 
                    	              $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                    				  while($row1 = mysqli_fetch_array($result1)){
                    					  echo $row1['branch']; } ?>
                              </span></td>
                              </tr>
                            <tr valign="middle" height="22">
                              <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">4.</span></td>
                              <td width="202" align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;Division:</span></td>
                              <td width="390" colspan="5" bgcolor="#EEF2F9"><span class="style14">&nbsp;<input type="text" name="division" value="<?php echo $row_Recordset4['division'];?>" class="style29" required="required" />
                                <?php $eid=$row_Recordset4['eid'];
                    				 mysqli_select_db($con, $dbname);
                    				 $query1 = "SELECT department FROM v_hr_staff WHERE eid='$eid'"; 
                    	              $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                    				  while($row1 = mysqli_fetch_array($result1)){
                    					  echo $row1['department'];}?>
                              </span></td>
                              </tr>
                            <tr valign="middle" height="22">
                              <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">5.</span></td>
                              <td width="202" align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;Active Status:</span></td>
                              <td width="390" colspan="5" bgcolor="#EEF2F9"><span class="style14">&nbsp;<select name="active_status" class="style29">
                                  <option value="<?php echo $row_Recordset4['active_status'];?>"><?php echo $row_Recordset4['active_status'];?></option>
                                  <option value="Active">Active</option>
                                  <option value="Inactive">Inactive</option>
                                </select>
                              </span></td>
                              </tr>
                              <tr valign="middle" height="22">
                              <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">6.</span></td>
                              <td width="202" align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;Username:</span></td>
                              <td width="390" colspan="5" bgcolor="#EEF2F9"><span class="style14">&nbsp;<input type="text" readonly name="username" value="<?php echo $row_Recordset4['username'];?>" class="style29" required="required" />
                              </span></td>
                              </tr>	
                            <tr valign="middle" height="22">
                              <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">7.</span></td>
                              <td width="202" align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14"></span></td>
                              <td width="390" colspan="5" bgcolor="#EEF2F9"><span class="style14">&nbsp;
                              <!--<input type="text" name="user_code" value="<?php //echo $row_Recordset4['user_code'];?>" class="style29" required="required" />
                              -->
                              </span></td>
                              </tr>
                              <tr valign="middle" height="22">
                              <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">8.</span></td>
                              <td align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;Director Type:</span></td>
                              <td width="390" colspan="5" bgcolor="#EEF2F9"><span class="style14">&nbsp;
                              <select name="dir_type" class="style29" required="required">
                                    <option value="COO">COO</option>   
                              </select>
                              </span></td>
                              </tr>	
                            <tr valign="middle" height="22">
                              <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">9.</span></td>
                              <td align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;Program Type:</span></td>
                              <td width="390" colspan="5" bgcolor="#EEF2F9"><span class="style14">&nbsp;<select name="program_type" class="style29">
                                      <option value="<?php echo $row_Recordset4['program_type'];?>"><?php echo $row_Recordset4['program_type'];?></option>
                              </select>
                              </span></td>
                              </tr>
                            <tr valign="middle" height="22">
                              <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">10.</span></td>
                              <td align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;User Level:</span></td>
                              <td width="390" colspan="5" bgcolor="#EEF2F9"><span class="style14">&nbsp;<select name="user_level" class="style29" required="required">
                                      <option value="<?php echo $row_Recordset4['user_level'];?>"><?php echo $row_Recordset4['user_level'];?></option>
                                    
                              </select>
                              </span></td>
                              </tr>
                              <tr valign="middle">
                              <td align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">11.</span></td>
                              <td align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;System Type:</span></td>
                              <td height="18" colspan="5" bgcolor="#EEF2F9"><span class="style14">&nbsp;<select name="mini_crm" class="style29" required="required">
                                      <option value="<?php echo $row_Recordset4['mini_crm'];?>"><?php echo $row_Recordset4['mini_crm'];?></option>
                                      <option value="">Please select</option>
                                      <option value="ccm">ccm</option>
                                      <option value="other">other</option>
                              </select>
                              </span></td>
                              </tr> 
                              <tr valign="middle">
                              <td align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">12.</span></td>
                              <td align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;EID:</span></td>
                              <td height="18" colspan="5" bgcolor="#EEF2F9"><span class="style14">&nbsp;<input type="text" readonly name="eid" class="style29"value="<?php echo $row_Recordset4['eid']; ?>" size="5" required/>
                              </span></td>
                              </tr> 
                              <tr valign="baseline">
                              <td height="81" colspan="7" align="left" valign="middle" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">Last Update By: &nbsp;<?php echo $row_Recordset4['updated_by']; ?>,<br />
                                on <?php echo $row_Recordset4['updated_on']; ?><br />
                                <br />
                                <input type="submit" value="Update Record" class="style29"/>
                                <br />
                              </span></td>
                              </tr>
                          </table>
                          <input type="hidden" name="MM_update" value="form2" />
                          <input type="hidden" name="id" value="<?php echo $row_Recordset4['id']; ?>"/>
                        </td>
                    </tr>
                </table>
            </form>
            <?php }else{ echo 'Please update eid in system !!!';?>
                <form action="eid_update.php" method="post" name="form1" id="form1">
                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <td valign="top">
                              <table width="100%" align="center" cellpadding="0" cellspacing="1">
                                <tr valign="center">
                                  <td height="30" colspan="7" align="center" nowrap="nowrap" bgcolor="#EEF2F9">&nbsp;&nbsp;&nbsp;<span class="style4"><strong>Add User Details:</strong></span></td>
                                  </tr>
                                <tr valign="middle" height="22">
                                  <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">1.</span></td>
                                  <td width="202" align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;First Name:</span></td>
                                  <td width="734" colspan="5" bgcolor="#EEF2F9"><span class="style14">
                                    <input type="text" name="first_name" class="style29"value="" size="20" required/>
                                  </span></td>
                                  </tr>
                                  <tr valign="middle" height="22">
                                    <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">2.</span></td>
                                  <td width="202" align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;Last Name:</span></td>
                                  <td width="734" colspan="5" bgcolor="#EEF2F9"><input type="text" name="last_name" class="style29"value="" size="20" /></td>
                                  </tr>
                                  <tr valign="middle" height="22">
                                    <td width="32" align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">3.</span></td>
                                  <td width="202" align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;Branch:</span></td>
                                  <td width="734" colspan="5" bgcolor="#EEF2F9">
                                        <select name="branch" class="style29" required="required">
                                          <option value="">Please select</option>
                                          <?php 
                        				 mysqli_select_db($con, $dbname);
                        				 $query1 = "SELECT branch FROM crm_products GROUP BY branch ORDER BY pid"; 
                        	              $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                        				  while($row1 = mysqli_fetch_array($result1)){ ?>
                                          <option value="<?php echo $row1['branch']; ?>"><?php echo $row1['branch'];} ?></option>
                                  </select></td>
                                  </tr>
                                  <tr valign="middle">
                                    <td align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">4.</span></td>
                                    <td align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;Division:</span></td>
                                    <td height="18" colspan="5" bgcolor="#EEF2F9"><span class="style14">
                                        <select name="division" class="style29" required="required">
                                          <option value="">Please select</option>
                                          <?php 
                        				 mysqli_select_db($con, $dbname);
                        				 $query1 = "SELECT division FROM users GROUP BY division"; 
                        	              $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                        				  while($row1 = mysqli_fetch_array($result1)){ ?>
                                          <option value="<?php echo $row1['division']; ?>"><?php echo $row1['division']; }?></option>
                                  </select>
                                    </span></td>
                                  </tr>
                                  <tr valign="middle">
                                  <td align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">5.</span></td>
                                  <td align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;Unique Name:</span></td>
                                  <td height="18" colspan="5" bgcolor="#EEF2F9"><span class="style14">
                                  <input type="text" name="uname" class="style29"value="" size="20" />
                                  (Maximum Characters - 10)</span></td>
                                  </tr>
                                  <tr valign="middle">
                                  <td align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">6.</span></td>
                                  <td align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;Director Type:</span></td>
                                  <td height="18" colspan="5" bgcolor="#EEF2F9"><span class="style14">
                                  <select name="dir_type" class="style29" required="required">
                                         
                                          <option selected value="COO">COO</option>
                                         
                                  </select></span></td>
                                  </tr>
                                  <tr valign="middle">
                                  <td align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">8.</span></td>
                                  <td align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;System Type:</span></td>
                                  <td height="18" colspan="5" bgcolor="#EEF2F9"><span class="style14">
                                  <select name="mini_crm" class="style29" required="required">
                                          <option value="">Please select</option>
                                          <option value="ccm">ccm</option>
                                          <option value="other">other</option>
                                  </select>
                                  </span></td>
                                  </tr> 
                                  <tr valign="middle">
                                  <td align="center" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">9.</span></td>
                                  <td align="left" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">&nbsp;EID:</span></td>
                                  <td height="18" colspan="5" bgcolor="#EEF2F9"><span class="style14">
                                  <input type="text" name="eid" class="style29"value="" size="5" required/>
                                  </span></td>
                                  </tr> 
                                <tr valign="baseline">
                                  <td height="81" colspan="7" align="left" valign="middle" nowrap="nowrap" bgcolor="#EEF2F9"><span class="style14">
                                  <input type="submit" value="Add User" class="style29"/>
                                    <br />
                                  </span></td>
                                  </tr>
                              </table>
                              <input type="hidden" name="MM_insert" value="form1" /></td>
                        </tr>
                    </table>
                </form>
            <?php }?>
     	    <!-- leave system access enabling 2024-05-15 -->
     		<!-- req 71 -->
     		  <?php //if (!($row_Recordset2['access_level']=='member'))
          if ($row_Recordset2['access_level']=='admin' || $row_Recordset2['access_level']=='member'){ ?>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form25" id="form25">	
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr valign="middle">
                <td height="30" colspan="2" align="left" bgcolor="#C7D3E9">&nbsp;<span class="style4"><strong>Office  Information - Reminders</strong></span></td>
              </tr>
              <tr valign="middle">
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Employee Type Duration</span></td>
                    <td bgcolor="#EEF2F9"><input type="date" name="emp_typeduration" value="<?php echo $row_DetailRS1['emp_typeduration'];?>" class="style291"/>
                    <span class="style14">(MM/DD/YYYY)</span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Retirement</span></td>
                    <td bgcolor="#EEF2F9"><input type="date" name="retirement" value="<?php echo $row_DetailRS1['retirement'];?>" class="style291"/>
                    <span class="style14">(MM/DD/YYYY)</span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Confirmation</span></td>
                    <td bgcolor="#EEF2F9"><input type="date" name="confirmation" value="<?php echo $row_DetailRS1['confirmation'];?>" class="style291"/>
                      <span class="style14">(MM/DD/YYYY)</span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Confirmation Renewal</span></td>
                    <td bgcolor="#EEF2F9"><input type="date" name="confirm_renewal" value="<?php echo $row_DetailRS1['confirm_renewal'];?>" class="style291"/>
                    <span class="style14">(MM/DD/YYYY)</span></td>
                  </tr>
                </table></td>
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Other</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="other" value="<?php echo $row_DetailRS1['other'];?>" class="style291" size="25"/></td>
                  </tr>
                  <tr height="92" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Comments</span><span class="style14">&nbsp;</span></td>
                    <td bgcolor="#EEF2F9"><textarea name="comments" cols="45" rows="5" class="style291"><?php echo $row_DetailRS1['comments'];?></textarea></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
                <td height="30" colspan="2" bgcolor="#EEF2F9" align="right">
                    <input type="submit" value="Update Office Information - Historical" class="style29"/>
                    <input type="hidden" name="MM_update25" value="form25" />
                    <input type="hidden" name="eid" value="<?php echo $row_DetailRS1['eid']; ?>"/>
                </td>
            </tr>
            <tr>
                <td height="5" colspan="2" bgcolor="#438EB8"></td>
            </tr>
            </table>
        </form>	
        <?php } // 220321 ?>
        <form action="<?php echo $editFormAction; ?>" method="post" name="form22" id="form22">	
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr valign="middle">
                <td height="30" colspan="2" align="left" bgcolor="#C7D3E9">&nbsp;<span class="style4"><strong>Office  Information - Current</strong></span></td>
              </tr>
              <tr valign="middle">
                  <!-- 220321 -->
                   <?php //if (!($row_Recordset2['access_level']=='member'))
                   if ($row_Recordset2['access_level']=='admin' || $row_Recordset2['access_level']=='member'){ ?>
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Job Status</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="job_status" class="style291">
                        <option value="<?php echo $row_DetailRS1['job_status'];?>"><?php echo $row_DetailRS1['job_status'];?></option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                      </select>
                    </span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Branch/ Head Office</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="branch" class="style291">
                        <option value="<?php echo $row_DetailRS1['branch'];?>"><?php echo $row_DetailRS1['branch'];?></option>                        <?php 
		 		 mysqli_select_db($con, $dbname);
				 $query1 = "SELECT branch FROM users GROUP BY branch"; 
	              $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
				  while($row1 = mysqli_fetch_array($result1)){?>
                        <option value="<?php echo $row1['branch']; ?>"><?php echo $row1['branch']; ?></option>
                        <?php }?>
                        <option value="Jaffna Branch">Jaffna Branch</option>
                        <?php 
		 		 mysqli_select_db($con, $dbname);
				 $query1 = "SELECT branch FROM v_hr_staff WHERE job_status='Active' GROUP BY branch"; 
	              $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
				  while($row1 = mysqli_fetch_array($result1)){?>
                        <option value="<?php echo $row1['branch']; ?>"><?php echo $row1['branch']; ?></option>
                        <?php }?>
                        <option value="Malabe Branch">Malabe Branch</option>
                      </select>
                    </span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Department</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="department" class="style291">
                        <option value="<?php echo $row_DetailRS1['department']; ?>"><?php echo $row_DetailRS1['department']; ?></option>
                        <option value="MMI">MMI</option>
                        <option value="Admissions">Admissions</option>
                        <?php 
		 		 mysqli_select_db($con, $dbname);
				 $query1 = "SELECT department FROM v_hr_departments WHERE department!='NULL' AND record_status='1' GROUP BY department ORDER BY department asc"; 
	              $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
				  while($row1 = mysqli_fetch_array($result1)){?>
                        <option value="<?php echo $row1['department']; ?>"><?php echo $row1['department']; ?></option>
                        <?php }?>
                      </select>
                    </span></td>
                  </tr>
                  <tr height="30">
                    <td valign="middle" bgcolor="#EEF2F9"><span class="style14">&nbsp;Current Designation</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="current_designation" class="style291" value="<?php echo $row_DetailRS1['current_designation'];?>" size="45" /></td>
                  </tr>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Internal Designation</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="internal_designation" class="style291" value="<?php echo $row_DetailRS1['internal_designation'];?>" size="45" /></td>
                  </tr>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Product Type</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="product_type" class="style291" value="<?php echo $row_DetailRS1['product_type'];?>" size="25" /></td>
                  </tr>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Product</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="product" value="<?php echo $row_DetailRS1['product'];?>" class="style291" size="5"/></td>
                  </tr>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Location/ Seating Location</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="location" value="<?php echo $row_DetailRS1['location'];?>" class="style291" size="15"/>&nbsp;<input type="text" name="seating_location" value="<?php echo $row_DetailRS1['seating_location'];?>" class="style291" size="15"/></td>
                  </tr>
                </table></td>
                <td bgcolor="#C7D3E9" valign="top" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Category Type</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="category_type" class="style291">
                        <option value="<?php echo $row_DetailRS1['category_type']; ?>"><?php echo $row_DetailRS1['category_type']; ?></option>
                        <option value="Sales">Sales</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                        <option value="Internal Marketing">Internal Marketing</option>
                        <option value="Tele Marketing">Tele Marketing</option>
                        <option value="Creative">Creative</option>
                        <option value="Events">Events</option>
                        <option value="Databases">Databases</option>
                        <option value="Events/ Databases">Events/ Databases</option>
                        <?php 
		 		 mysqli_select_db($con, $dbname);
				 $query1 = "SELECT category_type FROM v_hr_staff WHERE job_status='Active' GROUP BY category_type"; 
	              $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
				  while($row1 = mysqli_fetch_array($result1)){?>
                        <option value="<?php echo $row1['category_type']; ?>"><?php echo $row1['category_type']; ?></option>
                        <?php }?>
                      </select>
                    </span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Category</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="category" class="style291">
                        <option value="<?php echo $row_DetailRS1['category']; ?>"><?php echo $row_DetailRS1['category']; ?></option>
                        <?php 
		 		 mysqli_select_db($con, $dbname);
				 $query1 = "SELECT category FROM v_hr_staff WHERE job_status='Active' GROUP BY category"; 
	              $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
				  while($row1 = mysqli_fetch_array($result1)){?>
                        <option value="<?php echo $row1['category']; ?>"><?php echo $row1['category']; ?></option>
                        <?php }?>
                      </select>
                    </span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Employee Type</span></td>
                    <td bgcolor="#EEF2F9"><select name="emp_type" class="style291">
                        <option value="<?php echo $row_DetailRS1['emp_type']; ?>"><?php echo $row_DetailRS1['emp_type']; ?></option>
                        <?php 
		 		 mysqli_select_db($con, $dbname);
				 $query1 = "SELECT emp_type FROM v_hr_staff GROUP BY emp_type"; 
	              $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
				  while($row1 = mysqli_fetch_array($result1)){?>
                        <option value="<?php echo $row1['emp_type']; ?>"><?php echo $row1['emp_type']; ?></option>
                        <?php }?>
                      </select></td>
                  </tr>
                  <tr height="30">
                    <!-- <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Employee Syb Type</span></td> -->
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Employee Sub Type</span></td>
                    <td bgcolor="#EEF2F9"><select name="emp_subtype" class="style291">
                        <option value="<?php echo $row_DetailRS1['emp_subtype']; ?>"><?php echo $row_DetailRS1['emp_subtype']; ?></option>
                        <?php 
		 		 mysqli_select_db($con, $dbname);
				 $query1 = "SELECT emp_subtype FROM v_hr_staff WHERE job_status='Active' GROUP BY emp_subtype"; 
	              $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
				  while($row1 = mysqli_fetch_array($result1)){?>
                        <option value="<?php echo $row1['emp_subtype']; ?>"><?php echo $row1['emp_subtype']; ?></option>
                        <?php }?>
                      </select></td>
                  </tr>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;New/ Replacement</span></td>
                    <td bgcolor="#EEF2F9"><select name="new_replace" class="style291">
                        <option value="<?php echo $row_DetailRS1['new_replace']; ?>"><?php echo $row_DetailRS1['new_replace']; ?></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select></td>
                  </tr>
                  <?php } ?>
                  <!-- 220321 -->
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;EPF Number</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="epf" value="<?php echo $row_DetailRS1['epf'];?>" class="style291" size="3"/></td>
                  </tr>
                  <!-- v2 220321 -->
                  <?php //if (!($row_Recordset2['access_level']=='member'))
                  if ($row_Recordset2['access_level']=='admin' || $row_Recordset2['access_level']=='member'){ ?>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Extension</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="ext" value="<?php echo $row_DetailRS1['ext'];?>" class="style291" size="5"/></td>
                  </tr>
                  <?php } ?>
                   <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Eid</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" readonly name="eid" value="<?php if($row_DetailRS1['eid']>0){ echo $row_DetailRS1['eid']; }else{ echo ''; }?>" class="style291" size="5"/></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="30" colspan="2" bgcolor="#EEF2F9" align="right">
              <input type="submit" value="Update Office Information - Current" class="style29"/>
      <input type="hidden" name="MM_update22" value="form22" />
      <input type="hidden" name="eid" value="<?php echo $row_DetailRS1['eid']; ?>"/></td>
              </tr>
              <tr>
                <td height="5" colspan="2" bgcolor="#438EB8"></td>
              </tr>
            </table></form>
            <!-- req 71 v2 220321 -->
          <?php if (!($row_Recordset2['access_level']=='admin')){ ?>
            <form action="<?php echo $editFormAction; ?>" method="post" name="form23" id="form23">	
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr valign="middle">
                <td height="30" colspan="2" align="left" bgcolor="#C7D3E9">&nbsp;<span class="style4"><strong>Office  Information - Historical</strong></span></td>
              </tr>
              <!-- New addded join status -->
              <tr height="30">
                <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Join Status</span></td>
                <td bgcolor="#EEF2F9">
                  <select name="join_status" id="join_status_edit" class="style291" onchange="toggleDojField()">
                    <option value="No" <?php if ($row_DetailRS1['join_status'] !== 'Yes') echo 'selected="selected"'; ?>>No</option>
                    <option value="Yes" <?php if ($row_DetailRS1['join_status'] === 'Yes') echo 'selected="selected"'; ?>>Yes</option>
                  </select>
                </td>
              </tr>
              <!-- <tr valign="middle">
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Date Joined</span></td>
                    <td bgcolor="#EEF2F9"><input type="date" name="doj" value="<?php echo $row_DetailRS1['doj'];?>" class="style291"/>
                    <span class="style14">(MM/DD/YYYY)</span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Joined Designation</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="joined_designation" class="style291" value="<?php echo $row_DetailRS1['joined_designation'];?>" size="45" /></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Resignation</span></td>
                    <td bgcolor="#EEF2F9"><input type="date" name="resignation" value="<?php echo $row_DetailRS1['resignation'];?>" class="style291"/>
                      <span class="style14">(MM/DD/YYYY)</span></td>
                  </tr>
                </table></td>
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Promotion</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="promotion" value="<?php echo $row_DetailRS1['promotion'];?>" class="style291" size="25"/></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Date of Promotion</span></td>
                    <td bgcolor="#EEF2F9"><input type="date" name="date_promotion" value="<?php echo $row_DetailRS1['date_promotion'];?>" class="style291"/>
                    <span class="style14">(MM/DD/YYYY)</span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Last Promotion Year</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="last_promo_year" value="<?php echo $row_DetailRS1['last_promo_year'];?>" class="style291" size="3"/>
                    </td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="30" colspan="2" bgcolor="#EEF2F9" align="right">
              <input type="submit" value="Update Office Information - Historical" class="style29"/>
      <input type="hidden" name="MM_update23" value="form23" />
      <input type="hidden" name="eid" value="<?php echo $row_DetailRS1['eid']; ?>"/></td>
              </tr>
              <tr>
                <td height="5" colspan="2" bgcolor="#438EB8"></td>
              </tr>
            </table></form> -->
            
            <!-- Updated - enabled only when join status = Yes -->
            <tr height="30" valign="middle">
                <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Date Joined</span></td>
                <td bgcolor="#EEF2F9">
                  <input type="date" name="doj" id="doj_edit"
                    value="<?php echo ($row_DetailRS1['doj'] && $row_DetailRS1['doj'] != '0000-00-00') ? $row_DetailRS1['doj'] : ''; ?>"
                    class="style291"
                    <?php echo ($row_DetailRS1['join_status'] === 'Yes') ? '' : 'disabled="disabled" style="background-color:#EBEBE4;"'; ?>
                  />
                  <span class="style14">(YYYY-MM-DD &mdash; enabled only when Join Status = Yes)</span>
                </td>
            </tr>
            <tr height="30" valign="middle">
              <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Joined Designation</span></td>
              <td bgcolor="#EEF2F9"><input type="text" name="joined_designation" class="style291" value="<?php echo $row_DetailRS1['joined_designation'];?>" size="45" /></td>
            </tr>
            <tr height="30" valign="middle">
              <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Resignation</span></td>
              <td bgcolor="#EEF2F9"><input type="date" name="resignation" value="<?php echo $row_DetailRS1['resignation'];?>" class="style291"/><span class="style14">(MM/DD/YYYY)</span></td>
            </tr>
            <tr height="30" valign="middle">
              <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Promotion</span></td>
              <td bgcolor="#EEF2F9"><input type="text" name="promotion" value="<?php echo $row_DetailRS1['promotion'];?>" class="style291" size="25"/></td>
            </tr>
            <tr height="30" valign="middle">
              <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Date of Promotion</span></td>
              <td bgcolor="#EEF2F9"><input type="date" name="date_promotion" value="<?php echo $row_DetailRS1['date_promotion'];?>" class="style291"/><span class="style14">(MM/DD/YYYY)</span></td>
            </tr>
            <tr height="30" valign="middle">
              <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Last Promotion Year</span></td>
              <td bgcolor="#EEF2F9"><input type="text" name="last_promo_year" value="<?php echo $row_DetailRS1['last_promo_year'];?>" class="style291" size="3"/></td>
            </tr>
            <tr>
              <td height="30" colspan="2" bgcolor="#EEF2F9" align="right">
                <input type="submit" value="Update Office Information - Historical" class="style29"/>
                <input type="hidden" name="MM_update23" value="form23" />
                <input type="hidden" name="eid" value="<?php echo $row_DetailRS1['eid']; ?>"/>
              </td>
            </tr>
            <tr><td height="5" colspan="2" bgcolor="#438EB8"></td></tr>
          </table></form>

            <form action="<?php echo $editFormAction; ?>" method="post" name="form24" id="form24">	
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr valign="middle">
                <td height="30" colspan="2" align="left" bgcolor="#C7D3E9">&nbsp;<span class="style4"><strong>Office  Information - Inventory</strong></span></td>
              </tr>
              <tr valign="middle">
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Job Description:</span></td>
                    <td bgcolor="#EEF2F9">
                      <input type="date" name="jd" value="<?php echo $row_DetailRS1['jd'];?>" class="style291"/>
                      <span class="style14"> (MM/DD/YYYY)
                    </span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;B Card</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="bcard" class="style291">
                        <option value="<?php echo $row_DetailRS1['bcard'];?>"><?php echo $row_DetailRS1['bcard'];?></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                      </span></td>
                  </tr>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Insurance</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="insurance" class="style291" value="<?php echo $row_DetailRS1['insurance'];?>" size="25" /></td>
                  </tr>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Suwa Sampatha No.</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="sscard" class="style291" value="<?php echo $row_DetailRS1['sscard'];?>" size="5" /></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Phone</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="phone" class="style291">
                        <option value="<?php echo $row_DetailRS1['phone'];?>"><?php echo $row_DetailRS1['phone'];?></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                      </span></td>
                  </tr>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Mobile Number</span></td>
                    <td bgcolor="#EEF2F9"><span class="style291"><?php 
										 $meid=$row_DetailRS1['eid'];
										 mysqli_select_db($con, $dbname);
										 $query1 = "SELECT mobile_no FROM v_hr_mobile_numbers WHERE eid='$meid'"; 
										  $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
										  while($row1 = mysqli_fetch_array($result1)){
											 echo $row1['mobile_no']."/ ";}?></span></td>
                  </tr>
                </table></td>
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;CDMA:</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="cdma" class="style291">
                        <option value="<?php echo $row_DetailRS1['cdma'];?>"><?php echo $row_DetailRS1['cdma'];?></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                      </span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Laptop:</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="laptop" class="style291">
                        <option value="<?php echo $row_DetailRS1['laptop'];?>"><?php echo $row_DetailRS1['laptop'];?></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </span></td>
                  </tr>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Camera:</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="camera" class="style291">
                        <option value="<?php echo $row_DetailRS1['camera'];?>"><?php echo $row_DetailRS1['camera'];?></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </span></td>
                  </tr>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;ID Card:</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="id_card" class="style291">
                        <option value="<?php echo $row_DetailRS1['id_card'];?>"><?php echo $row_DetailRS1['id_card'];?></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </span></td>
                  </tr>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Dongle:</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="dongle" class="style291">
                        <option value="<?php echo $row_DetailRS1['dongle'];?>"><?php echo $row_DetailRS1['dongle'];?></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </span></td>
                  </tr>
                  <tr height="30">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;NC Clause:</span></td>
                    <td bgcolor="#EEF2F9"><span class="style14">
                      <select name="nc_clause" class="style291">
                        <option value="<?php echo $row_DetailRS1['nc_clause'];?>"><?php echo $row_DetailRS1['nc_clause'];?></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </span></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="30" colspan="2" bgcolor="#EEF2F9" align="right">
              <input type="submit" value="Update Office Information - Inventory" class="style29"/>
      <input type="hidden" name="MM_update24" value="form24" />
      <input type="hidden" name="eid" value="<?php echo $row_DetailRS1['eid']; ?>"/></td>
              </tr>
              <tr>
                <td height="5" colspan="2" bgcolor="#438EB8"></td>
              </tr>
            </table></form>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form26" id="form26">	
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr valign="middle">
                <td height="30" colspan="2" align="left" bgcolor="#C7D3E9">&nbsp;<span class="style4"><strong>Office  Information - Salary</strong></span></td>
              </tr>
              <tr valign="middle">
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Basic After Incrment</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="basic_after_increment" value="<?php echo $row_DetailRS1['basic_after_increment'];?>" class="style291" size="25"/></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Allowances</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="allowances" value="<?php echo $row_DetailRS1['allowances'];?>" class="style291" size="25"/></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Professional Fees</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="prof_fees" value="<?php echo $row_DetailRS1['prof_fees'];?>" class="style291" size="25"/></td>
                  </tr>
                </table></td>
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Designation on Salary Grid</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="sal_grid_designation" value="<?php echo $row_DetailRS1['sal_grid_designation'];?>" class="style291" size="25"/></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Grade on Salary Grid</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="sal_grid_grade" value="<?php echo $row_DetailRS1['sal_grid_grade'];?>" class="style291" size="25"/></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9">&nbsp;</td>
                    <td bgcolor="#EEF2F9">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="30" colspan="2" bgcolor="#EEF2F9" align="right">
              <input type="submit" value="Update Office Information - Salary" class="style29"/>
      <input type="hidden" name="MM_update26" value="form26" />
      <input type="hidden" name="eid" value="<?php echo $row_DetailRS1['eid']; ?>"/></td>
              </tr>
              <tr>
                <td height="5" colspan="2" bgcolor="#438EB8"></td>
              </tr>
            </table></form>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form27" id="form27">	
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr valign="middle">
                <td height="30" colspan="2" align="left" bgcolor="#C7D3E9">&nbsp;<span class="style4"><strong>Office  Information - Performance & Leave</strong></span></td>
              </tr>
              <tr valign="middle">
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td colspan="2" bgcolor="#EEF2F9"><span class="style14">&nbsp;2018 Performace</span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;2018 April Evaluation</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="2018_april_evaluation" value="<?php echo $row_DetailRS1['2018_april_evaluation'];?>" class="style291" size="25"/></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;2018 April KPI</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="2018_april_kpi" value="<?php echo $row_DetailRS1['2018_april_kpi'];?>" class="style291" size="25"/></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;2018 April Competency</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="2018_april_competency" value="<?php echo $row_DetailRS1['2018_april_competency'];?>" class="style291" size="25"/></td>
                  </tr>
                </table></td>
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td colspan="2" bgcolor="#EEF2F9"><span class="style14">&nbsp;Entitled Leave</span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Annual</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="annual" class="style291" value="<?php echo $row_DetailRS1['annual'];?>" size="2" /></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Casual</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="casual" class="style291" value="<?php echo $row_DetailRS1['casual'];?>" size="2" /></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Sick</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="sick" class="style291" value="<?php echo $row_DetailRS1['sick'];?>" size="2" /></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="30" colspan="2" bgcolor="#EEF2F9" align="right">
              <input type="submit" value="Update Office Information - Performance & Leave" class="style29"/>
      <input type="hidden" name="MM_update27" value="form27" />
      <input type="hidden" name="eid" value="<?php echo $row_DetailRS1['eid']; ?>"/></td>
              </tr>
              <tr>
                <td height="5" colspan="2" bgcolor="#438EB8"></td>
              </tr>
            </table></form>
			  <form action="<?php echo $editFormAction; ?>" method="post" name="form47" id="form47">	
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr valign="middle">
                <td height="30" colspan="2" align="left" bgcolor="#C7D3E9">&nbsp;<span class="style4"><strong>Leave System Management</strong></span></td>
              </tr>
              <tr valign="middle">
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td colspan="2" bgcolor="#EEF2F9"><span class="style14">&nbsp;</span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Email</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="email" value="<?php echo $row_DetailRS1['email'];?>" class="style291" size="25"/></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Reporting to</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="reporting_to_name" value="<?php echo $row_DetailRS1['reporting_to_name'];?>" class="style291" size="25"/></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;Reporting Person's EPF</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="reporting_epf" value="<?php echo $row_DetailRS1['reporting_epf'];?>" class="style291" size="25"/></td>
                  </tr>
                </table></td>
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td colspan="2" bgcolor="#EEF2F9"><span class="style14">&nbsp;</span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;Director Type</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="dir_type" class="style291" value="<?php echo $row_DetailRS1['dir_type'];?>" size="20" /></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;HoD</span></td>
                    <td bgcolor="#EEF2F9">
                        <SELECT name="hod" class="style291">
                            <option value="<?php echo $row_DetailRS1['hod'];?>" size="20" ><?php echo $row_DetailRS1['hod'];?></option>
                            <option value="">Select</option>
                            <?php $getuserlist="SELECT username FROM users WHERE active_status='Active' ORDER BY username asc";$executequery=mysqli_query($con,$getuserlist);while($fetchquery=mysqli_fetch_assoc($executequery)){ ?>
                                 <option value="<?php echo $fetchquery['username']; ?>"><?php echo $fetchquery['username']; ?></option>
                            <?php } ?>
                        </SELECT>
                        <?php $hodfirstname=$row_DetailRS1['hod'];$getuserlist2="SELECT username FROM users WHERE username='$hodfirstname' ";
                        $executequery2=mysqli_query($con,$getuserlist2);
                        $fetchquery2=mysqli_num_rows($executequery2); ?>
                        <p style="color:red;"><?php if($fetchquery2==0){ echo "Error"; } ?> </p>
                    </td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;HoD Status</span></td>
                    <td bgcolor="#EEF2F9"><select name="hod_status" class="style291" ><option value="<?php echo $row_DetailRS1['hod_status'];?>" size="20"><?php echo $row_DetailRS1['hod_status'];?></option><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="30" colspan="2" bgcolor="#EEF2F9" align="right">
              <input type="submit" value="Update Leave Management Info" class="style29"/>
      <input type="hidden" name="MM_update47" value="form47" />
      <input type="hidden" name="eid" value="<?php echo $row_DetailRS1['eid']; ?>"/></td>
              </tr>
              <tr>
                <td height="5" colspan="2" bgcolor="#438EB8"></td>
              </tr>
            </table></form>
            <form action="<?php echo $editFormAction; ?>" method="post" name="form28" id="form28">	
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr valign="middle">
                <td height="30" colspan="2" align="left" bgcolor="#C7D3E9">&nbsp;<span class="style4"><strong>Office  Information - Performance (Continued)</strong></span></td>
              </tr>
              <tr valign="middle">
                <td bgcolor="#C7D3E9" width="50%"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td colspan="2" bgcolor="#EEF2F9"><span class="style14">&nbsp;2019 Overall Performace</span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9"><span class="style14">&nbsp;2019 KPI Rating</span></td>
                    <td bgcolor="#EEF2F9"><input type="text" name="2019_overall_kpi" value="<?php echo $row_DetailRS1['2019_overall_kpi'];?>" class="style291" size="25"/></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td bgcolor="#EEF2F9"><span class="style14">&nbsp;2019 KPI Criteria</span></td>
                    <td bgcolor="#EEF2F9"><select name="2019_overall_criteria" class="style291">
                <option value="<?php echo $row_DetailRS1['2019_overall_criteria'];?>"><?php echo $row_DetailRS1['2019_overall_criteria'];?></option>
                <option value="Very Good">Very Good</option>
                <option value="Good">Good</option>
                <option value="Above Average">Above Average</option>
                <option value="Average">Average</option>
                <option value="Poor">Poor</option>
                <option value="Not Done">Not Done</option>
                <option value="N/A">N/A</option>
              </select></td>
                  </tr>
                </table></td>
                <td bgcolor="#C7D3E9" width="50%" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                  <tr height="30" valign="middle">
                    <td colspan="2" bgcolor="#EEF2F9"><span class="style14">&nbsp;</span></td>
                  </tr>
                  <tr height="30" valign="middle">
                    <td width="35%" bgcolor="#EEF2F9">&nbsp;</td>
                    <td bgcolor="#EEF2F9">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="30" colspan="2" bgcolor="#EEF2F9" align="right">
              <input type="submit" value="Update Office Information - Performance" class="style29"/>
      <input type="hidden" name="MM_update28" value="form28" />
      <input type="hidden" name="eid" value="<?php echo $row_DetailRS1['eid']; ?>"/></td>
              </tr>
              <tr>
                <td height="5" colspan="2" bgcolor="#438EB8"></td>
              </tr>
            </table></form></td>
</tr>
      </table>
</td>
    </tr></table>
    </form>
    <!-- req 71 -->
  <?php } } ?>
    <?php  if ((isset($_POST['view_staff']))|| (isset($_GET['a']))|| (isset($_POST['view_bdays']))|| (isset($_POST['all_doj']))|| (isset($_POST['pending_doj']))|| (isset($_POST['all_ss']))|| (isset($_POST['pending_ss']))){
		if ((isset($_POST['view_staff']))|| (isset($_GET['a'])))
		{$mysqlstatement="SELECT * FROM v_hr_staff ORDER BY job_status, department";$h1="Staff Details";}
		if ((isset($_POST['view_bdays'])))
		{$mysqlstatement="SELECT * FROM `v_hr_staff` WHERE  DAYOFYEAR(curdate()) <= dayofyear(`dob`) AND DAYOFYEAR(curdate()) +365 >= dayofyear(`dob`) AND job_status='Active' ORDER BY DATE_FORMAT((dob),'%m-%d')";$h1="Sorted by Upcoming Birthdays";}
		if ((isset($_POST['all_doj'])))
		{$mysqlstatement="SELECT * FROM `v_hr_staff` 
WHERE  doj BETWEEN DATE_SUB(curdate(), INTERVAL 1 YEAR) AND curdate()
AND job_status='Active' 
ORDER BY DATE_FORMAT((doj),'%m-%d')";$h1="Confirmation Letters for this Year - Sorted by Date of Joined";}
		if ((isset($_POST['pending_doj'])))
		{$mysqlstatement="SELECT * FROM `v_hr_staff` 
WHERE  doj BETWEEN DATE_SUB(curdate(), INTERVAL 1 YEAR) AND curdate()
AND DAYOFYEAR(curdate()) <= dayofyear(`doj`) 
AND job_status='Active' 
ORDER BY DATE_FORMAT((doj),'%m-%d')";$h1="Pending Confirmation Letters for this Year";}
		if ((isset($_POST['all_ss'])))
		{$mysqlstatement="SELECT * FROM `v_hr_staff` WHERE !(sscard IS NULL || sscard=\"\") ORDER BY job_status";$h1="Pending Confirmation Letters for this Year";}
		
		$maxRows_Recordset1 = 1000;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysqli_select_db($con, $dbname);
$query_Recordset1 = "$mysqlstatement";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysqli_query($con, $query_limit_Recordset1) or die(mysqli_error($con));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysqli_query($con, $query_Recordset1);
  $totalRows_Recordset1 = mysqli_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
//$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1)

?>
    <table width="100%" cellspacing="1" cellpadding="0">
      <!--<tr>
        <td height="35"

bgcolor="#CDD9EB" class="style4"
			<?php
				//if (!($row_Recordset2['user_level'] == 'user')) {?>colspan="9" 
		    <?php //} else {?>colspan="8"<?php //} ?>><strong><?php //echo $h1;?></strong></td>
      </tr> -->

      <tr>
        <td height="35" bgcolor="#CDD9EB" class="style4" colspan="8"><strong><?php echo $h1; ?></strong></td>
      </tr>

      <tr>
        <!-- <td height="15"
			<?php
				//if (!($row_Recordset2['user_level'] == 'user')) {?>colspan="9" 
		    <?php //} else {?>colspan="8"<?php //} ?>

bgcolor="#CDD9EB"> -->
        <td height="15" colspan="8" bgcolor="#CDD9EB">
        <table border="0" align="left">
          <tr class="style29">
            <td height="30">Records <?php echo ($startRow_Recordset1 + 1) ?> to <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> of <?php echo $totalRows_Recordset1 ?></td>
            <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?><?php echo "&db=".$db;?>">First</a> |
              <?php } // Show if not first page ?></td>
            <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?><?php echo "&db=".$db;?>">Previous</a> |
              <?php } // Show if not first page ?></td>
            <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1)?><?php echo "&db=".$db;?>">Next</a> |
              <?php } // Show if not last page ?></td>
            <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?><?php echo "&db=".$db;?>">Last</a>
              <?php } // Show if not last page ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" bgcolor="#CDD9EB"><div align="center"><strong><span class="style29">No</span></strong></div></td>
        <td bgcolor="#CDD9EB"><div align="center"><strong><span class="style29">Department</span></strong></div></td>
        <td bgcolor="#CDD9EB"><div align="center"><strong><span class="style29">Calling Name</span></strong></div></td>
        <td bgcolor="#CDD9EB"><div align="center"><strong><span class="style29">Designation</span></strong></div></td>
        <td bgcolor="#CDD9EB"><div align="center"><strong><span class="style29"><?php 
		if ((isset($_POST['all_ss']))) {echo "Suwa Sampatha No.";}else{echo "Joined Date";}  ?>
		<!-- req 71 -->
		<?php //if (!($row_Recordset2['access_level']=='member'))
    if ($row_Recordset2['access_level']=='admin' || $row_Recordset2['access_level']=='member'){ ?>
		</span></strong></div></td>
        <td bgcolor="#CDD9EB"><div align="center"><strong><span class="style29">Date of Birth</span></strong></div></td>
         <?php } ?>
         <!-- Req 71 -->
        <td bgcolor="#CDD9EB"><div align="center"><strong><span class="style29">Religion</span></strong></div></td>
      <?php 
				if ($row_Recordset2['firstname']=="Inactive") {?>
        <td bgcolor="#CDD9EB"><div align="center"><strong><span class="style29">Number/ Ext</span></strong></div></td><?php } ?> 
        <td bgcolor="#CDD9EB"><div align="center"><strong><span class="style29">View/Update</span></strong></div></td>
      </tr>
      <?php $Sno = 0; do { $Sno = $Sno + 1;?>
      <?php 
		if ($row_Recordset1['job_status']=="Inactive")
		{$cellcolor ='#EDA7C1';}
		elseif ($row_Recordset1['confirmation']===NULL)
		{$cellcolor ='#C6F9D2';}
		elseif ($Sno%2==0){
		    $cellcolor = '#DFE7F2';
		}else {
		    $cellcolor = '#EEF2F9';
		} ?>
      <tr bgcolor="<?php echo $cellcolor; ?>">
        <td width="2%" height="25" class="style29" align="right"><?php echo $Sno; ?>&nbsp; </td>
        <td width="15%" ><div align="center"><span class="style29">&nbsp;<?php echo $row_Recordset1['department']; ?></span></div></td>
        <td width="10%" align="center" height="25" class="style29"><?php echo $row_Recordset1['calling_name'];?></td>
        <td width="25%"><div align="left"><span class="style29">&nbsp;&nbsp;<?php echo $row_Recordset1['current_designation']; ?></span></div></td>
        <td width="15%" ><div align="center"><span class="style29">&nbsp;<?php 
		if ((isset($_POST['all_ss']))) {echo $row_Recordset1['sscard'];}else{echo $row_Recordset1['doj'];}  ?></span></div></td>
		<!-- req 71 -->
		 <?php //if (!($row_Recordset2['access_level']=='member'))
     if ($row_Recordset2['access_level']=='admin' || $row_Recordset2['access_level']=='member'){ ?>
        <td width="15%" ><div align="center"><span class="style29">&nbsp;<?php echo $row_Recordset1['dob']; ?></span></div></td>
        <?php } ?>
        <!-- req 71 -->
        <td width="15%" ><div align="center"><span class="style29">
        <form id="form5" name="form5" method="post" action="staff.php">
            <select name="race" class="style291">
                <option value="<?php echo $row_Recordset1['race'];?>"><?php echo $row_Recordset1['race'];?></option>
                <option value="Sinhala">Sinhala</option>
                <option value="Tamil">Tamil</option>
                <option value="Muslim">Muslim</option>
                <option value="Burger">Burger</option>
                <option value="Indian">Indian</option>
            </select>
            <select name="religion" onchange="javascript: form.submit()" class="style291">
                <option value="<?php echo $row_Recordset1['religion'];?>"><?php echo $row_Recordset1['religion'];?></option>
                <option value="Buddhist">Buddhist</option>
                <option value="Catholic">Catholic</option>
                <option value="Christian">Christian</option>
                <option value="Hindu">Hindu</option>
                <option value="Islamic">Islamic</option>
            </select>
    		<input type="hidden" name="update_religion" value="update_religion"/>
      		<input type="hidden" name="eid" value="<?php echo $row_Recordset1['eid']; ?>"/>
        </form></span></div></td>
        <?php 
			/*if ($row_Recordset2['firstname']=="Inactive") { ?>
                <td width="15%" ><div align="center"><span class="style29">&nbsp;<?php echo $row_Recordset1['office_sim'].", ".$row_Recordset1['ext']; ?></span></div></td>
        <?php } */?>
        <td height="25" align="center" class="style29">
            <form id="form3" name="form3" method="post" action="staff.php">
            <form id="form3_<?php echo $Sno;?>" name="form3" method="post" action="staff.php">
              <input type="submit" value="View/ Update Info" class="style29"/>
              <input type="hidden" name="program" value="form3" />
              <input type="hidden" name="eid" value="<?php echo $row_Recordset1['eid']; ?>" />
            </form>
            <!-- req 71 -->
            <?php /*if (!($row_Recordset2['access_level']=='member')){ ?>
            	<form id="form2" name="form2" method="post" action="../kpi/kpi.php">
                    <button class="button button2">2020 KPI's</button>
                    <input type="hidden" name="view_kpi" value="view"/>
                    <input type="hidden" name="eid" value="<?php echo $row_Recordset1['eid']; ?>"/>
                </form>
            <?php } */?>
            <!-- req 71 -->
        </td>
        <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
      </tr>
    </table>
    <?php }?>
    </td>
  </tr>
  <tr>
    <th height="25" colspan="3" bgcolor="#E2E2E2" scope="row"><span class="style4">©Copyright -  2021 - 2025 ANC Education.</span></th>
  </tr>
</table>
</body>
</html>
<?php
/*@mysqli_free_result($Recordset1);
mysqli_free_result($Recordset2);
@mysqli_free_result($DetailRS1);*/
mysqli_free_result($Recordset1 ?? null);
mysqli_free_result($Recordset2 ?? null);
mysqli_close($con);
?>