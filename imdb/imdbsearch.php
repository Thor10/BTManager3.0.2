<?php

 #############################################################################
 # IMDBPHP                              (c) Giorgos Giagas & Itzchak Rehberg #
 # written by Giorgos Giagas                                                 #
 # extended & maintained by Itzchak Rehberg <izzysoft AT qumran DOT org>     #
 # http://www.izzysoft.de/                                                   #
 # ------------------------------------------------------------------------- #
 # This program is free software; you can redistribute and/or modify it      #
 # under the terms of the GNU General Public License (see doc/LICENSE)       #
 # ------------------------------------------------------------------------- #
 # Search for $name and display results                                      #
 #############################################################################
 # $Id: imdbsearch.php,v 1.1 2008/09/21 02:34:43 joerobe Exp $

# If MID has been explicitly given, we don't need to search:
if (!empty($_GET["mid"])) {
  header("Location: imdb.php?mid=".$_GET["mid"]);
  exit;
}

# If we have no MID and no NAME, go back to search page
if (empty($_GET["name"])) {
  header("Location: index.html");
  exit;
}

# Still here? Then we need to search for the movie:
require ("imdb.class.php");
$search = new imdbsearch ();
$search->setsearchname ($_GET["name"]);
echo "<HTML><HEAD><TITLE>Performing IMDB search for '".$_GET["name"]."'...</TITLE></HEAD><BODY>\n";
$results = $search->results ();
echo "<TABLE ALIGN='center' BORDER='1' STYLE='border-collapse:collapse;margin-top:20px;'>\n"
   . " <TR><TH STYLE='background-color:#ffb000'>Movie Details</TH><TH STYLE='background-color:#ffb000'>IMDB page</TH></TR>";
foreach ($results as $res) {
  echo " <TR><TD><a href='imdb.php?mid=".$res->imdbid()."'>".$res->title()." (".$res->year().")</a></TD>"
     . "<TD><a href='http://'".$search->imdbsite."/title/tt".$res->imdbid()."'>imdb page</a></TD></TR>\n";
}
echo "</TABLE>\n</BODY></HTML>";

?>