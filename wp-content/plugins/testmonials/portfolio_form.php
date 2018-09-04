<?php
global $wpdb;
 
$edit=0;
$title='';
$contant='';
$cname='';
$from='';
$email='';

if (isset($_GET['id'])) {
$edit=1;
$id=$_GET['id'];
$result = $wpdb->get_results ( "SELECT * FROM  testimonial where id=$id" );
foreach ( $result as $print )   { 
$title=$print->title;
$contant=$print->contant;
$cname=$print->cname;
$from=$print->from;
$email=$print->email;

} 
}


 
if(isset($_POST['submit']))
{
 $title=$_POST['title'];
$contant=$_POST['contant'];
$cname=$_POST['cname'];
$from=$_POST['from'];
$email=$_POST['email'];
$active=2;

if($title!='' && $cname!='' ) {

if($edit==1 )
{

$wpdb->update( 'testimonial', array( 'title' => $title,'contant' => $contant,'cname' => $cname,'from' => $from,'email' => $email,'active' => $active),array( 'id' =>$id ));
echo "<script>location='admin.php?page=testimonial_setting_page'</script>";
}




else
{
$wpdb->insert( 'testimonial', array( 'title' => $title,'contant' => $contant,'cname' => $cname,'from' => $from,'email' => $email,'active' => $active));
echo "<script>location='admin.php?page=testimonial_setting_page'</script>";
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
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      var attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#image-url').val(attachment.url);
    });
    // Open the uploader dialog
    mediaUploader.open();
  });
  
  
  

});




jQuery(document).ready(function($){
var mediaUploader;

    $('#upload-button2').click(function(e) {
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
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      var attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#logo-url').val(attachment.url);
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


     <h2>Testmonial</h2>
      <form method="post" action="">

<table width="100%" border="0">
  <tr>
    <td>Title:</td>
    <td><input type="text" name="title"  value="<?=$title?>"/></td>
  </tr>
  
   
   <tr>
    <td>Title:</td>
    <td>
    <textarea name="contant"><?=$contant?></textarea>
    
    </td>
  </tr>
  
  
  <tr>
    <td>Name</td>
    <td>

    <input type="text" name="cname"  value="<?=$cname?>"/>
    </td>
  </tr>
  
  
    <tr>
    <td>From</td>
    <td>

    
     <input type="text" name="from"  value="<?=$from?>"/>
    
    </td>
  </tr>
  
   <tr>
    <td>email</td>
    <td>

    
         <input type="text" name="email"  value="<?=$email?>"/>
    
    </td>
  </tr>
  

  <!--<tr>
    <td>Image ( 250px x 75px):</td>
    <td><input id="logo-url" type="text" name="logo" value="<?=$logo?>" />
         <input id="upload-button2" type="button" class="button" value="Upload Image" /></td>
  </tr>
  
   <tr>
    <td></td>
    <td><?php if($logo=='') {} else{ ?><img src="<?=$logo?>" style="width:100px; " /><? } ?></td>
  </tr>
  
  <tr>
    <td>PDF File :</td>
    <td><input id="image-url" type="text" name="image" value="<?=$image2?>" />
         <input id="upload-button" type="button" class="button" value="Upload Image" /></td>
  </tr>



  
    <tr>
    <td></td>
    <td> <?php if($image2=='') {} else{ ?> <a href="<?=$image2?>" target="_blank">View PDF</a><? } ?></td>
  </tr>
 
  
    -->
  <tr>
     <td></td>
    <td ><input type="submit" value="Submit" name="submit" class="button-primary"/></td>
    
  </tr>

  
</table>

 
             
 
   
          
  

         
         

         
         
      </form>
   </div>
   
   