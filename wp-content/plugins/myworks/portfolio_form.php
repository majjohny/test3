<?php
global $wpdb;
 
$edit=0;
$image2='';



if (isset($_GET['did'])) {
$did=$_GET['did'];
$wpdb->delete( 'gallery_images', array( 'g_id' => $did ) );
}

if (isset($_GET['id'])) {
$edit=1;
$id=$_GET['id'];
$result = $wpdb->get_results ( "SELECT * FROM gallery where g_id=$id" );
foreach ( $result as $print )   { 
$title=$print->title;
$page=$print->page;
$g_id=$print->g_id;
} 




}



 
if(isset($_POST['submit']))
{
$title=$_POST['title'];
$page=$_POST['page'];
echo $image=$_POST['image'];



if($title!=''  ) {

if($edit==1 )
{

$wpdb->update( 'gallery', array( 'title' => $title,'page' => $page),array( 'g_id' =>$id ));

$myString = $image;
$myArray = explode(',', $myString);
 $resulto = count($myArray);
for($x = 0; $x < $resulto; $x++)
{
//$jobcatsearch.= " `jobpost_pref` LIKE '%".$myArray[$x]."%' OR";
$wpdb->insert( 'gallery_images', array( 'gallery_id' => $id,'img_id' => $myArray[$x])); 
}

echo "<script>location='admin.php?page=footer_setting_page'</script>";
}




else
{
$wpdb->insert( 'gallery', array( 'title' => $title,'page' => $page));
$lastid = $wpdb->insert_id;

$myString = $image;
$myArray = explode(',', $myString);
 $resulto = count($myArray);
for($x = 0; $x < $resulto; $x++)
{
//$jobcatsearch.= " `jobpost_pref` LIKE '%".$myArray[$x]."%' OR";
$wpdb->insert( 'gallery_images', array( 'gallery_id' => $lastid,'img_id' => $myArray[$x])); 
}

echo "<script>location='admin.php?page=footer_setting_page'</script>";
}

}
else
{
echo "all fields are required";
}

}


?>
	
<script type="text/javascript">
jQuery(document).ready(function($){

  var mediaUploader;

  $('#upload-button').click(function(e) {
    e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: true });

    // When a file is selected, grab the URL and set it as the text field's value

	
	mediaUploader.on('select', function() {
                var selection = mediaUploader.state().get('selection');
                var ids = selection.map( function (attachment) {
                    return attachment.id;
                });
                $("#image-url").val(ids.join(','));
            });
	
	
    // Open the uploader dialog
    mediaUploader.open();
  });
  
  
  
  
  
  
  
  
  
  
  
  
  

});
</script>

<?php // jQuery
wp_enqueue_script('jquery');
// This will enqueue the Media Uploader script
wp_enqueue_media();
?>

<style type="text/css">

table { width:90%; margin:0px auto; margin-top:50px; border-collapse:collapse;}
table .width_5 { width:50%;}
table tr {  }
table td { padding:10px 30px; }
table td a { color:#0099FF; text-decoration:none;}
table td a:hover { color:#FF0000;}
table th { padding:20px; background-color:#CCCCCC; text-align:left;}
</style>


<div class="wrap">


     <h2>Committee Member</h2>

<form method="post" action="">
<table width="100%" border="0">
  
  
  <tr>
    <td>Title  :</td>
    <td>
   <input type="text" name="title" value="<?php echo $title; ?>" />
    </td>
  </tr>
  
    <tr>
    <td>Select Page  :</td>
    <td>
    
    <select name="page">
<?php
 $page_ids= get_all_page_ids();
    echo '<h3>My Page List :</h3>';
       foreach($page_ids as $id)
        {
		
		?>
            <option value="<?php echo $id; ?>" <?php if($id==$page){ ?> selected="selected" <?php } ?>   ><?php echo get_the_title($id).' - ' .$id; ?></option>
           
       <?php }
 ?>    
     </select>
    </td>
  </tr>
  
  <tr>
    <td> Image ( 570px x 570px) :</td>
    <td><input id="image-url" type="hidden" name="image" value="<?=$image2?>" />
         <input id="upload-button" type="button" class="button" value="Upload Image" /></td>
  </tr>
  
   <tr>
    <td></td>
    <td>
    
    <?php 
	if($g_id!=''){
	
$result5 = $wpdb->get_results ( "SELECT * FROM gallery_images where  gallery_id=$g_id" );
foreach ( $result5 as $print5 )   { 
$img_id=$print5->img_id;

?>

<?php
$image_attributes = wp_get_attachment_image_src( $attachment_id = $img_id );
if ( $image_attributes ) : ?>
    <img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>" />
    <a href="admin.php?page=portfolio_sub_page&&id=<?php echo $g_id; ?>&&did=<?php echo $print5->g_id; ?>" onClick="return confirm('Are you sure you want to delete?')" >Delete</a>
<?php endif; ?>


<?php
	} 
	}
	?>
    
    
    
    </td>
  </tr>
 
 

  <tr>
     <td></td>
    <td ><input type="submit" value="Submit" name="submit" class="button-primary"/></td>
    
  </tr>

  
</table>

 
             
 
   
          
  

         
         

         
         
      </form>
   </div>
