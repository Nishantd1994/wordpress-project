<?php

/*
Plugin Name:Wmk
Plugin URI:https://www.google.com/
Author:Nishant Dua
Author URI:https://www.google.com/
Version:1.1
Description:This plugin is created just for tstin purpose.
*/

add_action('admin_menu','myfirstplugin');
function myfirstplugin()
{
   add_menu_page('websitemakerking','wmk','administrator','wmk_slug','wmk_func','dashicons-admin-tools','99');
}

function wmk_func()
{
?>
<form action=""  method="post">
<table border="1" width="500" style="margin-top:50px;" align="center">
<tr>
	<td align="center" colspan="2"><h1>Student Registration</h1></td>
</tr>
<tr>
	<td>Name</td>
	<td><input type="text" name="name" placeholder="Name" required></td>
</tr>
<tr>
	<td>Email ID</td>
	<td><input type="email" name="email" placeholder="Email ID" required></td>
</tr>
<tr>
	<td>Age</td>
	<td><input type="text" name="age" placeholder="Age" required></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" name="add_student" value="Add Student"></td>
</tr>
</table>
</form>
<?php 


//insert student records
if(isset($_POST['add_student']))
{

	$name=$_POST['name'];
	$email=$_POST['email'];
	$age=$_POST['age'];


	global $wpdb;

   $rec=[
   'name'=>$name,
   'email'=>$email,
   'age'=>$age,
   'is_active'=>1
   ];
	$insert_rec=$wpdb->insert('tbl_student',$rec);

	if($insert_rec)
	{
		echo "<script>alert('Record has been inserted successfully !')</script>";
	}
	else
	{
		echo "<script>alert('Error ! Try after sometime')</script>";
	}
}

//delete student record

if(isset($_GET['del']))
{
	$del_id=$_GET['del'];
	global $wpdb;
	$del_rec=$wpdb->delete('tbl_student',array('id'=>$del_id));
	echo "<script>alert('Record has been deleted successfully !')</script>";
	header('Location:'.admin_url().'');
}


//view student records
global $wpdb;
$view_rec=$wpdb->get_results('select * from tbl_student');
?>
<table border="1" width="500" align="center" style="margin-top:50px;">
	    <tr>
	    	<td align="center" colspan="8"><h1>View Student</h1></td>
	    </tr>
	    <tr>
	    	<th>ID</th>
	    	<th>Name</th>
	    	<th>Email ID</th>
	    	<th>Age</th>
	    	<th>Status</th>
	    	<th>Date</th>
	    	<th>Edit</th>
	    	<th>Delete</th>
	    </tr>
		<?php
		$i=1;
		$totl= $wpdb->num_rows;
		if($totl>0)
		{
		foreach($view_rec as $rec)
		{
		?>
	    <tr>
	    	<td><?=$i++?></td>
	    	<td><?=$rec->name?></td>
	    	<td><?=$rec->email?></td>
	    	<td><?=$rec->age?></td>
	    	<td><?=($rec->is_active==1 ? 'Active' : 'Deactive')?></td>
	    	<td><?=date('d-m-Y',strtotime($rec->tstp))?></td>
	    	<td><a href="">Edit</a></td>
	    	<td><a href="<?=admin_url('admin.php?page=wmk_slug&del='.$rec->id.'');?>">Delete</a></td>
	    </tr>
	 <?php }}else{?>
	 	 <tr>
	    	<td colspan="8" align="center"><h1>No records found</h1></td>
	    
	    </tr>

	 <?php }?>

</table>

<?php }

function register_shortcode()
{
    add_shortcode('websitemaker','wmk_func');
}


add_action('init','register_shortcode');


?>


