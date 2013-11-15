<?php
function spamcheck($field)
   {
   //filter_var() sanitizes the e-mail
   //address using FILTER_SANITIZE_EMAIL
   $field=filter_var($field, FILTER_SANITIZE_EMAIL);

   //filter_var() validates the e-mail
   //address using FILTER_VALIDATE_EMAIL
   if(filter_var($field, FILTER_VALIDATE_EMAIL))
		return true;
   else
		return false;
   }

 if (isset($_REQUEST['eposta']))
   {//if "email" is filled out, proceed

   //check if the email address is invalid
   $mailcheck = spamcheck($_REQUEST['eposta']);
   if ($mailcheck==FALSE)
     {
     echo "Geçersiz e-posta";
     }
   else
     {//send email
     $email = $_REQUEST['eposta'] ;
     $isim = $_REQUEST['isim'] ;
     $message = $_REQUEST['ileti'] ;
     mail("caglaryesilyurt@gmail.com;saadet.comlekcioglu@gmail.com;berkman.kantar@gmail.com;yilmazhasan111@gmail.com", "Konu: AFT sitesinden birisi sizinle iletişime geçti",
     "İsim:".$isim."\n".$message."\n\nBu e-posta AFT İletişim Formu doldurularak gönderilmiştir.", "From: $email" );
     echo "Gönderildi.";
     }
   }
   else{
   echo "wrong direction";
   }
?>