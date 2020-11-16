<?php
//database Deteils
$conn = mysqli_connect("localhost","shr","deep","ytube");
if (!$conn){
    echo "Connection Failed !";
}

   

//Get videos from channel by YouTube Data API
$API_key    = 'AIzaSyCGS2mpRee02L4snR-uofK5vcoKOmNRBfc';
$channelID  = 'UCgZK0B5z3A2m5UWYvPpZcHw';
$maxResults = 10000;

$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));

foreach($videoList->items as $item){
    //Embed video
    if(isset($item->id->videoId)){
        echo '<div class="youtube-video">
                <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                <h2>'. $item->snippet->title .'</h2>
            </div>';

            $sql = "INSERT INTO videos (title,description,thumbnail,channelTitle,videoId,publishedAt,channelId) 
            VALUES('". $item->snippet->title ."','".$item->snippet->description."','".$item->snippet.thumbnails.(high).url."','".$item->snippet->channelTitle."','".$item->id->videoId."','".$item->snippet->publishedAt."','".$item->snippet->channelId."')";
            
            if(!mysqli_query($conn,$sql)){
                   echo "File Uploading Error";
                }    
          
        
     
    }
}
/*$sql = "INSERT INTO 'videos' ('title', 'description', 'thumbnail', 'channelTitle', 'videoId', 'publishedAt', 'channelId', 'kind', 'tags') 
                  VALUES ('$item->id->title', '$item->id->description', '$item->id->thumbnail', '$item->id->channelTitle', '$item->id->videoId', '$item->id->publishedAt', '$item->id->channelId', 'youtube#video', '') ";
     
       if(mysqli_query($conn,$sql)){
        
            echo "";
            }
            else{
                echo "File Uploading Error";
            }   */

?>