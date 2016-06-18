<?php
/**
 * survey_view.php works with index.php to create a list/view app. 
 * 
 * @package sp16_survey-sez
 * @author Dwayne Linde <lindesara@gmail.com>
 * @version 1.0 2016/05/12
 * @link http://lindese.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see index.php
 * @see Pager.php 
 * @todo none
 */

# '../' works for a sub-folder.  use './' for the root  
require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials
 
# check variable of item passed in - if invalid data, forcibly redirect back to index.php page
if(isset($_GET['id']) && (int)$_GET['id'] > 0){#proper data must be on querystring
	 $myID = (int)$_GET['id']; #Convert to integer, will equate to zero if fails. Casts it here. 
}else{
	// myRedirect(VIRTUAL_PATH . "demo/demo_list.php");
    header('Location:' . VIRTUAL_PATH . 'surveys/index.php'); 
}

// sql statement to select individual item
// $sql = "select Title,Description from sp16_surveys where SurveyID = " . $myID;
//---end config area --------------------------------------------------



$foundRecord = FALSE; # Will change to true, if record found!

   
// Create class here. This was the DB info. 

$mySurvey = new Survey($myID);

dumpDie($mySurvey); 
    
    

if($foundRecord)
{#only load data if record found
	$config->titleTag = $Title . " surveys made with PHP & love!"; #overwrite PageTitle with Survey info!
}
/*
$config->metaDescription = 'Web Database ITC250 class website.'; #Fills <meta> tags.
$config->metaKeywords = 'SCCC,Seattle Central,ITC250,database,mysql,php';
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


<?php
if($foundRecord)
{#records exist - show survey!

    echo '
    <h3 align="center"> ' . $Title . '</h3>              
    <p><b>Description: </b>' . $Description . '</p>
    '; 
    
    
}else{//no such survey!
    echo '<h3 align="center">What! No such survey.</h3>';
}

echo '<div align="center"><a href="' . VIRTUAL_PATH . 'surveys/index.php">Back</a></div>';

get_footer(); #defaults to theme footer or footer_inc.php


class Survey { // This is our Survey Class.
// How is the page driven? The class is driven by this same info.     
    
    public $Title = '';         // Assign a neutral blank variable to prevent problems. 
    public $Description = '';   // Assign a neutral blank variable to prevent problems. 
    public $SurveyID = 0;       // Not a normal Primary Key number. 
    public $isValid = false;    // False by default; must prove that there's good data. 
    // Set SurveyID to 0, to ensure that we don't get a good survey by accident. 
    public $Questions = array(); 
    
    // This is getting a row from the Surveys db. 
    // The one unique field? The ID. 
    public function __construct($id){
        
        // Forcibly cast the data to an int. Strings get turned to 0. 
        $id = (int)$id; 
        
        // SQL statement to select individual survey item. 
        $sql = "select Title,Description from sp16_surveys where SurveyID = " . $id;
        
        # connection comes first in mysqli (improved) function
            $result = mysqli_query(IDB::conn(),$sql) or 
    die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));

        if(mysqli_num_rows($result) > 0)
        {#records exist - process
	       $this->isValid = true; // Survey exists. 	
	       while ($row = mysqli_fetch_assoc($result))
	       {
			 $this->Title = dbOut($row['Title']);
			 $this->Description = dbOut($row['Description']);
	       }
        }

        @mysqli_free_result($result); # We're done with the data!
        
    // Add Question Objects Here.     
    
        $sql = "select QuestionID, Question, Description from sp16_questions where SurveyID = " . $id;
        
        # connection comes first in mysqli (improved) function
            $result = mysqli_query(IDB::conn(),$sql) or 
    die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));

        if(mysqli_num_rows($result) > 0)
        {#records exist - process
	       $this->isValid = true; // Survey exists. 	
	       while ($row = mysqli_fetch_assoc($result))
	       {
			 // $this->Title = dbOut($row['Title']);
			 // $this->Description = dbOut($row['Description']);
               $this->Questions[] = new Question(dbOut($row['QuestionID']), dbOut($row['Question']), dbOut($row['Description'])); 
               
               
               
	       }
        }

        @mysqli_free_result($result); # We're done with the data!

    }// end Survey Constructor. 
    
}// end Survey Class. 

// Properties can be objects, so it can store anything. A variable can store an array. 

class Question{

    public $QuestionID = 0; // The Primary Key for the Questions table. 
    public $Text = ''; // This will be the question.   
    public $Description = ''; // This will be the description of the question. 
    
    public function __construct($QuestionID, $Text, $Description){
        
        $this -> QuestionID = $QuestionID; 
        $this -> Text = $Text;
        $this -> Description = $Description; 
    
    } //End Question constructor. 
    

} // end Question Class. 

