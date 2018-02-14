
<div>
    
<?php

$feed = simplexml_load_file('http://www.norfolkfa.com/rss/news');

foreach ($feed->channel->item as $item) {
  $title       = (string) $item->title;
  $mytitle       = (string) $item->title;
  $pubDate       = (string) $item->pubDate;
  $description = (string) $item->description;
  $description = substr($description, 0, 250)."...";
     $item->date = date('D, d M Y H:i:s GMT', strtotime($myBlogPublishedTime));

  print '<article class="county-newsarticle">';
  
  echo '<div>';
  
  echo "<a href='$item->link' title='$item->title'>";
  
    
    echo '<h2>';
    
    echo substr( $mytitle, 0, 20 ) .'...';
    
    echo '</h2>';
    
    echo "<p class='publish-date'>$item->pubDate</p>";
    
    echo '<p class="article-para">';
    
    echo substr( $description, 0, 120 ) .'...';
  
    echo '</p>';
  
  
  echo '</a>';

  if ($media = $item->children('media', TRUE)) {
    if ($media->content->thumbnail) {
      $attributes = $media->content->thumbnail->attributes();
      $imgsrc     = (string)$attributes['url'];

      printf('<div><img src="%s" alt="" /></div>', $imgsrc);
    }
  }
  
  echo "<a class='read-more' href='$item->link' title='$item->title'>Read More</a>";

    echo '</div>';

  echo '</article>';
}

?>    
    
</div>