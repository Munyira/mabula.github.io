<?php
    $API_key = 'AIzaSyDyeZCOrXflMpmQge918aeN3A32CdutR-g';
    $channelID = 'UCiXcejjBfrqyujW-ihesn9g';
    $maxResult = 99;

    $apiError = 'Video not Found';
    try{
        $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResult.'&key='.$API_key.''); 

        if($apiData){ 
            $videoList = json_decode($apiData); 
        }else{ 
            throw new Exception('Invalid API key or channel ID.');
        }   
    }catch(Exception $e){
        $apiError = $e->getMessage();
    }   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Elizabeth Mabula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container border border-secondary rounded">
        <h2>Music Videos</h2>
        <hr>
                <div class="row">
        
                <?php 
                    if(!empty($videoList->items)){ 
                        foreach($videoList->items as $item){ 
                            if(isset($item->id->videoId)){
                               
                                $caption=$item->snippet->title;
                                if (str_contains($caption, 'Official')) { 
                                ?>
                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card">
                                    <iframe class="card-img-top" width="426" height="240" src="https://www.youtube.com/embed/<?php echo $item->id->videoId; ?>" frameborder="0" allowfullscreen></iframe> 
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $caption; ?></p>
                                    </div>
                                    </div>
                                    </div>
                                
                                 
                                
                                <?php 
                        }
                       
                    } 
                        } 
                    }else{ 
                        echo '<p class="error">'.$apiError.'</p>'; 
                    }
                ?>
            </div>
            </div>
            <br>
            <div class="container border border-secondary rounded">
        <h2>Shorts</h2>
        <hr>
                <div class="row">
        
                <?php 
                    if(!empty($videoList->items)){ 
                        foreach($videoList->items as $item){ 
                            if(isset($item->id->videoId)){
                               
                                $caption=$item->snippet->title;
                                if (str_contains($caption, 'Official')) {}else{
                                ?>
                                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card">
                                    <iframe class="card-img-top" width="426" height="240" src="https://www.youtube.com/embed/<?php echo $item->id->videoId; ?>" frameborder="0" allowfullscreen></iframe> 
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $caption; ?></p>
                                    </div>
                                    </div>
                                    </div>
                                
                                 
                                
                                <?php 
                        }
                       
                    } 
                        } 
                    }else{ 
                        echo '<p class="error">'.$apiError.'</p>'; 
                    }
                ?>
            </div>
            </div>
    
</body>
</html>