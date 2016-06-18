<?php
/**
 * index.php is a model for largely static PHP pages 
 *
 * @package nmCommon
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 2.091 2011/06/17
 * @link http://www.newmanix.com/
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see config_inc.php 
 * @todo none
 */
 
require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials
$config->titleTag = THIS_PAGE; #Fills <title> tag. If left empty will fallback to $config->titleTag in config_inc.php  
$config->nav1 = array("aboutus.php"=>"About Us") + $config->nav1; 
/*
$config->metaDescription = 'Web Database ITC281 class website.'; #Fills <meta> tags.
$config->metaKeywords = 'SCCC,Seattle Central,ITC281,database,mysql,php';
$config->metaRobots = 'no index, no follow';
$config->loadhead = ''; #load page specific JS
$config->banner = ''; #goes inside header
$config->copyright = ''; #goes inside footer
$config->sidebar1 = ''; #goes inside left side of page
$config->sidebar2 = ''; #goes inside right side of page
$config->nav1["page.php"] = "New Page!"; #add a new page to end of nav1 (viewable this page only)!!
$config->nav1 = array("page.php"=>"New Page!") + $config->nav1; #add a new page to beginning of nav1 (viewable this page only)!!
*/

# END CONFIG AREA ---------------------------------------------------------- 

get_header(); #defaults to theme header or header_inc.php
?>

<h1>Here is my Bootstrap Test Table Page</h1>


<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Title - this goes into the loop.</th>
      <th>Creator - the loop gets generated dynamically.</th>
      <th>Date Created - the data gets put in from the loop. </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="http://lindese.com/itc250/sp16/surveys/survey_view.php?id=1">Our First Survey - one iteration of the loop.</a></td>
      <td>Bugs Bunny</td>
      <td>6-2-2016</td>
     
    </tr>
    <tr>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      
    </tr>
    <tr>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      
    </tr>
   
  </tbody>
</table> 


<?php
get_footer(); #defaults to theme header or footer_inc.php
?>
