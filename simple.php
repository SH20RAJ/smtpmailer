<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>Blog-Creater || InDeep </title>
</head>
<body >
<style>
 body {
   font-family : cursive ;
 }
</style>
<?php



          //inserting mailing function ......... 

                $title = 'CodeXD - India';
                $channelTitle = 'channelTitle';
                $videoId = videoId';
                $thumbnail = 'thumbnail';
                $toemail = "45y4y4yu@bevsemail.com";
                $tags = 'tags';
                $description = 'description';
                $publishedAt = 'publishedAt';
            
            require_once 'phpmailer/Exception.php';
            require_once 'phpmailer/PHPMailer.php';
            require_once 'phpmailer/SMTP.php';

            $mail = new PHPMailer(true);

            $alert = '';
                
            
            try{
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'shaswat340@gmail.com'; // Gmail address which you want to use as SMTP server
                $mail->Password = 'prince@340'; // Gmail address Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = '587';

                $mail->setFrom('shaswat340@gmail.com'); // Gmail address which you used as SMTP server
                $mail->addAddress($toemail); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

                $mail->isHTML(true);
                $mail->Subject = $title;
                $mail->Body = '<div class="vidcon"> 
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/'.$videoId.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <img src="'.$videoId.'" alt="" srcset="" width="0px">
                </div> 
                <div class="blank1">  </div>   
      
      <hr />
    <div id="ddx">
    <a href="https://i.ytimg.com/vi/'.$videourl.'/hqdefault.jpg" download ><button id="dlbtn">Download</button></a> 
      <button id="dd1" onclick="DisplayDesccription()">Show Description </button>
      <button id="dd2" onclick="HideDesccription()">Hide Description </button>
    </div>
      <br />
      <hr />
      <div id="description">
      Description :- <br />
      Posting Time : '.$publishedAt.' <br />
      '.$description.'
      </div>
      <hr />
      <div class="tags">'.$tags.'</div> ';

      
                $mail->send();
    $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
           

   
?>
</body>
</html>