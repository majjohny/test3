<?php
global $wpdb;
if (isset($_GET['id'])) {
$id=$_GET['id'];
$wpdb->delete( 'testimonial', array( 'id' => $id ) );
}


if (isset($_GET['cid'])) {
$id=$_GET['cid'];
$active=2;
$wpdb->update( 'testimonial', array( 'active' => $active),array( 'id' =>$id ));
} 

if (isset($_GET['pid'])) {
$id=$_GET['pid'];
$active=1;
$wpdb->update( 'testimonial', array( 'active' => $active),array( 'id' =>$id ));
} 




?>

<style type="text/css">

table { width:90%; margin:0px auto; margin-top:50px; border-collapse:collapse;}
table tr { border-bottom:1px solid #dddddd; background-color:#FFFFFF; }
table td { padding:10px 30px; height:70px;}
table td a { color:#0099FF; text-decoration:none;}
table td a:hover { color:#FF0000;}
table th { padding:20px; background-color:#CCCCCC; text-align:left;}
</style>

<p>&nbsp;</p>
<h1>Parish Bullettin List</h1>
<table  border="0">
  <tr>
    <th>ID</th>
    <th>Title</th>
     <th>Name</th>
    <th>Active</th>
    <th>Modify</th>
    <th>Delete</th>
  </tr>
  <?php
        global $wpdb;
        $result = $wpdb->get_results ( "SELECT * FROM testimonial order by `id` desc" );
        foreach ( $result as $print )   { ?>
   <tr>
    <td><?php echo $print->id; ?></td>
    <td><?php echo $print->title; ?></td>
    <td><?php echo $print->cname; ?>,<?php echo $print->from; ?></td>
     <td>
     
     
     
     
     
     <?php  if ($print->active==1){ ?>   
	 <a href="admin.php?page=testimonial_setting_page&&cid=<?php echo $print->id; ?>">Deactive</a>
	 <?php } ?>
     
     <?php  if ($print->active==2){ ?>   
	 <a href="admin.php?page=testimonial_setting_page&&pid=<?php echo $print->id; ?>">Active</a>
	 <?php } ?>
     
     
     </td>
    <td><a href="admin.php?page=testimonial_sub_page&&id=<?php echo $print->id; ?>">modify</a></td>
    <td><a href="admin.php?page=testimonial_setting_page&&id=<?php echo $print->id; ?>" onClick="return confirm('Are you sure you want to delete?')" >Delete</a></td>
   
    
  </tr>

    <?php  } ?>
  
</table>
