<h1> iOS Font Installer v0.1</h1>
<form action='' method='POST' enctype='multipart/form-data'>
<input type='file' name='userFile'> 
<input type='submit' name='upload_btn' value='upload'>
</form>

<?php
if(isset($_POST['upload_btn']))  {
//$target_Path = $target_Path.basename( $_FILES['userFile']['name'] );
 $info = pathinfo($_FILES['userFile']['name']);
 //$ext = $info['extension']; // get the extension of the file
 //var_dump($info);
 $newname = $info['basename'];
 $target = 'ttfs/'.$newname;
move_uploaded_file( $_FILES['userFile']['tmp_name'], $target );
}
?>
<hr>
<h3>Uploaded Fonts</h3>
<?php
// var_dump(glob('ttfs/*'));
foreach(glob('ttfs'.'/*.ttf') as $file) {
    echo '<a href="install.php?font='.$file."\">$file</a><br>";
}

?>