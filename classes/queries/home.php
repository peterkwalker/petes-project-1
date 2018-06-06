<?php

include __DIR__ . "/common.php";

$database = new Database();

// group types
$database->query("SELECT * FROM view_grouptypes where total_groups > :total_groups");
$database->bind(":total_groups", 0);
$grouptypes = $database->resultset();

// all verfified groups
//$database->query("SELECT * FROM view_groups WHERE group_verified = :group_verified");
//$database->bind(':group_verified', 'true');
//$groups = $database->resultset();


// footer
$database->query("SELECT * FROM tbl_footer");
$footer = $database->single();

// footer links
$database->query("SELECT * FROM tbl_footer_links");
$footerlinks = $database->resultset();

// latest group
$database->query("SELECT group_name,group_details,group_logo,group_id,listing_type FROM view_groups WHERE :group_verified = 'true' order by group_id desc");
$database->bind(':group_verified', 'true');
$latestgroup = $database->single();

//next event
$database->query("SELECT DateStart,event_title,group_name,event_type,event_notes,event_id FROM view_events WHERE DaysToEvent >= :DaysToEvent order by DaysToEvent asc");
$database->bind(':DaysToEvent', 0);

$nextevent = $database->single();
if ($nextevent) {
  $nexteventdetails = 'true';   
  } 

// news
$database->query("SELECT * FROM view_news order by news_id desc");
$news = $database->single();

?>