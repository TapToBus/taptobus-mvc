<?php


function upload_file($name,$destination_dir,$fileName=NULL,$fileTypes,$fileSize=500000,$isImage=FALSE,$overWrite=false)
{
    $target_dir = "img/".$destination_dir."/";
    // Create the directory if it does not exist
	if (!file_exists($target_dir)) {
		mkdir($target_dir, 0777, true);
	}
    $imageFileType = "null";
    if($fileName == NULL)
    {
        $target_file = $target_dir . basename($_FILES[$name]["name"]);
        $imageFileType = strtolower(pathinfo($target_dir,PATHINFO_EXTENSION));
    }
    else{
        $target_file = $target_dir . basename($_FILES[$name]["name"]);
        $file_ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // $fileName = pathinfo($name, PATHINFO_FILENAME);
        $target_file = $target_dir . $fileName.".".$file_ext;
        $imageFileType = $file_ext;
    }
    

    // Check if image file is a actual image or fake image
    if($isImage){
        $check = getimagesize($_FILES[$name]["tmp_name"]);
        if($check == false) {
            return "File is not an image.";
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        if($overWrite)
        {
            unlink($target_file);
        }
        else{
            return "Sorry, file already exists.";
        }   
    }

    // Check file size
    if ($_FILES[$name]["size"] > $fileSize) {
        return "Sorry, your file is too large.";
    }

    // Allow certain file formats
    if(in_array($imageFileType,$fileTypes,TRUE) == FALSE) 
    {
        return "Sorry, only ".implode(",",$fileTypes)." files are allowed.";
    }


    if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
        return "";
    } else {
        return "Sorry, there was an error uploading your file.";
    }
    
}


?>