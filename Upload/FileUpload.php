	<?php

	// $filename = $_FILES["file"]["name"];
	// $target_dir = "../Content/Owner/";
	// $target_file = $target_dir . basename($_FILES["file"]["name"]);
	// $newFileName = ChangeFileName($_FILES);
	//$FilePath =  $target_dir.$newFileName;

	$FilePath = "../".$_REQUEST["FilePath"];

	$my_file = 'log.txt';
	$log = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
	$data = "\n"."Request 1 : "."\n".$FilePath;
	fwrite($log, $data);
	fclose($log);


	if(move_uploaded_file($_FILES["file"]["tmp_name"],$FilePath))
	{
		echo json_encode("Photo Uploaded Successfully");
	}
	else
	{
		echo json_encode("Photo Upload Failed");
	}	

	// function ChangeFileName($File)
	// {
	// 	$temp = explode(".", $File["file"]["name"]);
	// 	$newfilename = round(microtime(true)) .'-'.current($temp). '.' . end($temp);
	// 	return $newfilename;
	// }

	// function CheckFile($File)
	// {
	// 	$error = "";

	// 	$target_dir = "Content/Owner";
	// 	$target_file = $target_dir . basename($File["file"]["name"]);
	// 	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// 	$filename = $File["file"]["name"];
	// 	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	// 	$file_ext = substr($filename, strripos($filename, '.')); 
		
	// 	if (file_exists($target_file))// Check if file already exists 
	// 	{
	// 		$error = "Sorry, file already exists.";
	// 	}
	// 	else if (empty($file_basename))
	// 	{	
	// 		// file selection error
	// 		$error = "Please select a file to upload.";
	// 	} 
	// 	else if ($File["file"]["size"] > 1000000) // Check file size
	// 	{
	// 		$error = "Sorry, your file is too large.";
	// 	}
	// 	else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) // Allow certain file formats
	// 	{
	// 		$error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	// 	}
	// 	else
	// 	{
	// 		$error = "valid";
	// 	}

	// 	return $error;
	// }

	?>