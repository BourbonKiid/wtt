<?php 
function calcDateDiff($date) {
    $timestamp = strtotime($date);
        $difference=time()-$timestamp;
        if ($difference > 60) {
            if ($difference > 3600) {
                if ($difference > 86400) {
                    echo round($difference / 86400,0) . " days ago";
                }else{
                    echo round($difference / 3600,0) . " hours ago";
                }
            }else{
                echo round($difference / 60,0) . " minute ago";
            }
        }else{
            echo $difference . " seconds ago";
        }
    }
?>