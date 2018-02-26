<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'MyForceLogin';
$route['login'] = 'MyForceLogin/login';


//Route Dashboard
$route['dashboard']    = 'MyForce/dashboard';


//Route Targets
$route['targets']       = 'MyForce/targets';
$route['edit-targets/:any']   = 'MyForce/editTargets';
$route['updateTargets/:any'] = 'MyForce/updateTargets';


//Route Events
$route['events']       = 'MyForce/events';
$route['addevents']    = 'MyForce/addevents';
$route['insertEvents']      = 'MyForce/insertEvents';
$route['editevents/:any']   = 'MyForce/editEvents';
$route['updateEvents/:any'] = 'MyForce/updateEvents';
$route['deleteEvents/:any'] = 'MyForce/deleteEvents';


//Route Product
$route['products']       = 'MyForce/products';
$route['addproducts']      = 'MyForce/addproducts';
$route['insertProducts']      = 'MyForce/insertProducts';
$route['editproducts/:any']   = 'MyForce/editproducts';
$route['updateProducts/:any'] = 'MyForce/updateProducts';
$route['deleteProducts/:any'] = 'MyForce/deleteProducts';

//Route Sub Product

$route['subproducts']       = 'MyForce/subproducts';
$route['addsubproducts']      = 'MyForce/addsubproducts';
$route['insertsubproducts']      = 'MyForce/insertSubProducts';
$route['editsubproducts/:any']   = 'MyForce/editSubProducts';
$route['updateSubProducts/:any'] = 'MyForce/updateSubProducts';
$route['deleteSubProducts/:any'] = 'MyForce/deleteSubProducts';

//Route Sales
$route['sales']                   = 'MyForce/sales';
$route['pagesprofile/:any']       = 'MyForce/pagesprofile';
$route['addsales']                = 'MyForce/addsales';
$route['insertsales']             = 'MyForce/insertSales';
$route['deleteSales/:any']        = 'MyForce/deleteSales';


//Route Region
$route['regions']       = 'MyForce/regions';
$route['addregions']      = 'MyForce/addRegions';
$route['insertregions']      = 'MyForce/insertRegions';
$route['editregions/:any']   = 'MyForce/editregions';
$route['updateregions/:any'] = 'MyForce/updateRegions';
$route['deleteRegions/:any'] = 'MyForce/deleteRegions';

//Route Branches
$route['branches']       = 'MyForce/branches';
$route['addbranches']      = 'MyForce/addBranches';
$route['insertbranches']      = 'MyForce/insertBranches';
$route['editbranches/:any']   = 'MyForce/editBranches';
$route['updatebranches/:any'] = 'MyForce/updateBranches';
$route['deleteBranches/:any'] = 'MyForce/deleteBranches';

//Route Events
$route['teams']       = 'MyForce/teams';
$route['addteams']      = 'MyForce/addTeams';
$route['insertTeams']      = 'MyForce/insertTeams';
$route['editTeams/:any']   = 'MyForce/editTeams';
$route['updateTeams/:any'] = 'MyForce/updateTeams';
$route['deleteTeams/:any'] = 'MyForce/deleteTeams';


//Route Questions
$route['questions']       = 'MyForce/questions';
$route['addquestions']      = 'MyForce/addquestions';
$route['insertquestions']      = 'MyForce/insertQuestions';
$route['editquestions/:any']   = 'MyForce/editQuestions';
$route['updatequestions/:any'] = 'MyForce/updateQuestions';
$route['deleteQuestions/:any'] = 'MyForce/deleteQuestions';


//Route Answers
$route['answers']       = 'MyForce/answers';
$route['deleteAnswers/:any'] = 'MyForce/deleteAnswers';



$route['logout'] = 'MyForce/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
