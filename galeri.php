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
switch($_GET["type"]){
   case 1:
      $dirs=read_all_files('galeri'.DIRECTORY_SEPARATOR.$_GET["id"]);
      //print_r($dirs);
      if(!count($dirs)) {print("Bir şey bulunamadı"); break;}
      echo '<ul class="galeriklasor">';
      foreach ($dirs["dirs"] as $dir){
         $part=explode(DIRECTORY_SEPARATOR,$dir);

         print('<li><a href="javascript:" id="'.$part[1].'" class="'.$part[2].'">'.$part[2].'</a></li>');
      }
      echo '</ul>';
      break;
   case 2:
      $dirs=read_all_files('galeri'.DIRECTORY_SEPARATOR.$_GET["id"].DIRECTORY_SEPARATOR.$_GET["kutu"]);
      //print_r($dirs);
      if(!count($dirs)) {print("Bir şey bulunamadı"); break;}
      foreach ($dirs["files"] as $dir){
         $part=explode(DIRECTORY_SEPARATOR,$dir);
         print('<a id="#'.str_replace(".", "",$part[1].$part[2].$part[3]).'" rel="group1" href="http://aft.metu.edu.tr/'.str_replace(DIRECTORY_SEPARATOR,'/',$dir).'" caption="resim başlığı" style="background-image:url(http://aft.metu.edu.tr/galeri/'.$part[1].'/'.$part[2].'/sml/'.$part[3].')" class="zoom" id="'.$part[2].'"></a>');
      }

      break;
   
}
?>
