<?php
global $wpdb;
 
$edit=0;
$image2='';

if (isset($_GET['id'])) {
$edit=1;
$id=$_GET['id'];
$result = $wpdb->get_results ( "SELECT * FROM ann_gallery where id=$id" );
foreach ( $result as $print )   { 
$title=$print->title;
$image2=$print->img;
$desc=$print->desc;
$slct=$print->slct; 
$cat=$print->cat;
$mnum=$print->mnum;
$dnum=$print->dnum;
$address=$print->address;
$ph1=$print->ph1;
$ph2=$print->ph2;
$ph3=$print->ph3;
$mails=$print->mails;
} 
}


 
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$image=$_POST['image'];
$desc=$_POST['desc'];
$slct=$_POST['slct'];
$cat=$_POST['cat'];

$mnum=$_POST['mnum'];
$dnum=$_POST['dnum'];
$address=$_POST['address'];
$ph1=$_POST['ph1'];
$ph2=$_POST['ph2'];
$ph3=$_POST['ph3'];
$mails=$_POST['mails'];


if($name!='' && $image!='' && $slct!='' && $cat!='' ) {

if($edit==1 )
{

$wpdb->update( 'ann_gallery', array( 'title' => $name,'img' => $image,'desc' => $desc,'slct' => $slct,'cat' => $cat,
'mnum' => $mnum,
'dnum' => $dnum,
'address' => $address,
'ph1' => $ph1,
'ph2' => $ph2,
'ph3' => $ph3,
'mails' => $mails,
),array( 'id' =>$id ));
echo "<script>location='admin.php?page=footer_setting_page'</script>";
}




else
{
$wpdb->insert( 'ann_gallery', array( 'title' => $name,'img' => $image,'desc' => $desc,'slct' => $slct,'cat' => $cat,
'mnum' => $mnum,
'dnum' => $dnum,
'address' => $address,
'ph1' => $ph1,
'ph2' => $ph2,
'ph3' => $ph3,
'mails' => $mails,));
echo "<script>location='admin.php?page=footer_setting_page'</script>";
}

}
else
{
echo "all fields are required";
}

}


?>
	


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
    <td>Choose Category:</td>
    <td>
  
    <input type="radio"  value="1" <?php if($cat==1){echo 'checked="checked"';}?> name="cat"/> Member 
     <input type="radio" value="2" <?php if($cat==2){echo 'checked="checked"';}?> name="cat" /> Office Bearers
    
    
    
    
    
    </td>
  </tr>
  
  
  
  
  
  
  
      
  
  
  
  
  
  
   
  

 
 

<script type="text/javascript" src="https://www.selffinancingcolleges.com/admin/scripts/jquery-1.7.2.min.js"></script>



<script type="text/javascript">
var count = 0;
$(function(){
	$('a#add_field').click(function(){
		count += 1;
		$('#container').append(
				'<label>Image ' + count + '</label><br />' 
				
				+ '<input id="image-url_' + count + '" name="fields[]' + '" type="text" size="40"/><br />'
				
				+ '<input id="upload-button' + count + '" class="button" type="button" value="Upload Image" /><br />'
				 );
				 
				 
				 
jQuery(document).ready(function($){

  var mediaUploader;

  $('#upload-button'+ count +'').click(function(e) {
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
      $('#image-url'+ count +'').val(attachment.url);
    });
    // Open the uploader dialog
    mediaUploader.open();
  });
  

});
	
	});
});
</script>




<tr>
<td width="450"><p> <a href="#" id="add_field">+ Click to add Images +</a>&nbsp;(500x500, Only jpeg, gif. Maxsize 1 Mb)
<div id="container"></div>
</p></td>
<td></td>
</tr>






  <tr>
     <td></td>
    <td ><input type="submit" value="Submit" name="submit" class="button-primary"/></td>
    
  </tr>

  
</table>

 
             
 
   
          
  

         
         

         
         
      </form>
   </div>
