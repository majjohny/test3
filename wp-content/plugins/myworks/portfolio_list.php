<?php
global $wpdb;
if (isset($_GET['id'])) {
$id=$_GET['id'];
$wpdb->delete( 'ann_gallery', array( 'id' => $id ) );
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
<h1>Committee List</h1>
<table  border="0">
  <tr>
    <th>ID</th>
    <th>Title</th>
     <th>Image</th>
   
    <th>Modify</th>
    <th>Delete</th>
  </tr>
  <?php
        global $wpdb;
        $result = $wpdb->get_results ( "SELECT * FROM gallery order by `g_id` desc" );
        foreach ( $result as $print )   { ?>
   <tr>
    <td><?php echo $print->g_id; ?></td>
    <td><?php echo $print->title; ?></td>
    <td><img src="<?php echo $print->img; ?>" style="max-height:50px; max-width:100px;" /></td>
    
    <td><a href="admin.php?page=portfolio_sub_page&&id=<?php echo $print->g_id; ?>">modify</a></td>
    <td><a href="admin.php?page=footer_setting_page&&id=<?php echo $print->g_id; ?>" onClick="return confirm('Are you sure you want to delete?')" >Delete</a></td>
   
    
  </tr>

    <?php  } ?>
  
</table>
