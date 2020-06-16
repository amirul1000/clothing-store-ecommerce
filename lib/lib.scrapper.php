<?php
/*
 Get All Links from contents matcing by tag <a>
*/
 function getLinks($contents,$tag)
{
  preg_match_all("/<a(?:[^>]*)href=\"([^\"]*)\"(?:[^>]*)>(?:[^<]*)<\/a>/is", $contents, $matches);

  return $matches[1];
}
/*
  Get All images matching img tag
*/
function getPhotosLinks($contents,$tag)
{
  preg_match_all("/<img(?:[^>]*)src=\"([^\"]*)\"(?:[^>]*)>/is", $contents, $matches);

  return $matches[1];
}
/*
  Get All images matching img tag
*/
function getPhotosLinksByTagAttributes($contents,$tag)
{
  preg_match_all('/<'.$tag.'(?:[^>]*)src=\"([^\"]*)\"(?:[^>]*)>/is', $contents, $matches);

  return $matches[1];
}
/*
  Get HTML tag contents
*/
function getHTMLTagContents($contents,$tag)
{
    //preg_match_all( "/\<th\>(.*?)\<\/th\>/s",$contents, $matches);
	preg_match_all( "/\<".$tag."\>(.*?)\<\/".$tag."\>/s",$contents, $matches);
    return $matches[1];
}

/*
 Get specific tag contents  by tag attributes
*/
function getHTMLTagContentsByTagAttributes($contents,$specifictagattr,$tagclose)
{
	preg_match_all( '/\<'.$specifictagattr.'\>(.*?)\<\/'.$tagclose.'\>/s',$contents, $matches);
    return $matches[1];
}
?>