<?php
// This file will be used for varying functions

function getMovieThumbnail($movieName){

    switch($movieName) {
        case "darkKnightMovie":  
            $url = "http://www.hobiplanet.com/blog/wp-content/gallery/batman_darkknight02/bane_04.jpg";
            break;        
        case "everestMovie":
            $url = "http://s1.cinema.com/image_lib/13843_poster.jpg";
            break;           
        case "interstellarMovie":
            $url = "http://image.tmdb.org/t/p/original/Aik3rm4drM9ePSxAVejYVLAmoDX.jpg";
            break;
        case "bourneIdentityMovie":
            $url = "http://image.tmdb.org/t/p/original/gLN10sdrhlYfnlsPHWVfXiZ7nxj.jpg";
            break;
        case "planetOfTheApesMovie":
            $url = "http://www.nerdly.co.uk/wp-content/uploads/2014/07/dawn-of-the-planet-of-the-apes.jpg";
            break;
        default:
            $url = "";
    }

    return $url; 
}