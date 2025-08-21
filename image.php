<?php


if(isset($_POST["submit"])) 
{
	$target_dir = "ProductImage/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);

	$error = CheckFile($_FILES);

	if($error == "")
	{
			$newFileName = ChangeFileName($_FILES);
			$FilePath =  $target_dir.$newFileName;
			
		   	if (move_uploaded_file($_FILES["file"]["tmp_name"],$FilePath)) 
		   	{
		        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
		    } 
		    else 
		    {
		        echo "Sorry, there was an error uploading your file.";
		    }
	}
	else
	{
		echo $error;
	}
}

function ChangeFileName($File)
{
	$temp = explode(".", $File["file"]["name"]);
	$newfilename = round(microtime(true)) .'-'.current($temp). '.' . end($temp);
	return $newfilename;
}

function CheckFile($File)
{
	$error = "";

	$target_dir = "ProductImage/";
	$target_file = $target_dir . basename($File["file"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$filename = $File["file"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); 
	
	if (file_exists($target_file))// Check if file already exists 
	{
	    $error = "Sorry, file already exists.";
	}
	else if (empty($file_basename))
	{	
		// file selection error
		$error = "Please select a file to upload.";
	} 
	else if ($File["file"]["size"] > 1000000) // Check file size
	{
	    $error = "Sorry, your file is too large.";
	}
	else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) // Allow certain file formats
	{
	    $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	}

	return $error;
}


?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
	<img src="ProductImage/1531036251-1.jpg">
    Select image to upload:
    <input type="file" name="file" id="file">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>