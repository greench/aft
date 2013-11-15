<?php 
/** 
  * Finds path, relative to the given root folder, of all files and directories in the given directory and its sub-directories non recursively. 
  * Will return an array of the form 
  * array( 
  *   'files' => [], 
  *   'dirs'  => [], 
  * ) 
  * @author sreekumar 
  * @param string $root 
  * @result array 
  */ 
function read_all_files($root = '.'){ 
   $files  = array('files'=>array(), 'dirs'=>array()); 
   $directories  = array(); 
   $last_letter  = $root[strlen($root)-1]; 
   $root  = ($last_letter == '\\' || $last_letter == '/') ? $root : $root.DIRECTORY_SEPARATOR; 
   
   $directories[]  = $root; 
   
     $dir  = array_pop($directories); 
     if ($handle = opendir($dir)) { 
       while (false !== ($file = readdir($handle))) { 
         if ($file == '.' || $file == '..') { 
           continue; 
         } 
         $file  = $dir.$file; 
         if (is_dir($file)) { 
           $directory_path = $file.DIRECTORY_SEPARATOR; 
           array_push($directories, $directory_path); 
           $files['dirs'][]  = $directory_path; 
         } elseif (is_file($file)) { 
           $files['files'][]  = $file; 
         } 
       } 
       closedir($handle); 
     } 
   
   return $files; 
 }
 if(isset($_REQUEST["id"])){
		echo "engin";
 }else{
 	$dirs=read_all_files('yazilar');
	if(!count($dirs)) {print("Bir şey bulunamadı"); break;}
	 echo '<ul class="yaziklasor">';
      foreach ($dirs["files"] as $dir){
	 
         $part=explode(DIRECTORY_SEPARATOR,$dir);
		 $dosyaismi=explode(".",$part[1]);
		 $isim="";
		 for($i=0;$i<count($dosyaismi)-1;$i++){
			$isim.=$dosyaismi[$i].".";
		 }
		 $isim=substr($isim,0,-1);
         print('<li><a href="http://'.$_SERVER['SERVER_NAME'].'/yazilar/'.$part[1].'" class="zoom">'.$isim.'</a></li>');
      }
      echo '</ul>';
 }

?>