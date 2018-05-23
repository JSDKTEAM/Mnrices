<?php
function call($controller,$action)
{
	require_once("controllers/".$controller."_controller.php");
	require_once("DbHelp.php");
	switch($controller)
	{
		case "page":		$controller = new PageController();
                        	break;
		case "rice":   		require_once('models/diseaseModel.php');
							require_once('models/speciesModel.php');
							require_once('models/pathogenModel.php');
							require_once('models/disease_pathogenModel.php');
							$controller = new RiceController();
							break;
		case "dep":   		require_once('models/departmentModel.php');
							$controller = new DepartmentController();
							break;
		case "district":	require_once('models/provinceModel.php');
							require_once('models/districtModel.php'); 
							$controller = new DistrictController();
							break;
		case "subdistrict":	require_once('models/subdistrictModel.php');
							require_once('models/provinceModel.php');
							$controller = new SubdistrictController();
							break;
		case "user":   		
							require_once('models/departmentModel.php');
							require_once('models/userModel.php');
							$controller = new UserController();
							break;
	}
	$controller->{$action}();
}

if( ($controller=='page'&&($action=='home'||$action=='error'))
||  ($controller=='rice' && ($action == 'index_riceSpecies'|| $action == 'addSpecies'|| $action == 'updateSpecies' || $action == 'search_spec' ||  $action == 'index_riceDisease' || $action == 'index_ricePathogen' || $action == 'addPathogen' || $action =='updatePathogen' ||$action=='searchPathogen' ||$action=='addDisease'||$action=='updateDisease' || $action == 'search_dis' || $action == 'index_riceDiseasePathogen' || $action == 'addDiseasePathogen'))
|| ($controller == 'dep' && ($action  == 'index_dep' || $action == 'addDep' || $action == 'updateDep' ))
|| ($controller == 'district' && ($action == 'index_district' || $action == 'updateDistrict'))
|| ($controller == 'subdistrict' && ($action == 'index_subdistrict'))
||  ($controller=='user' && ($action == 'index_userMm' || $action == 'addUserByAdmin')))
{	call($controller,$action);	}
else
{	call('page','error'); }
?>
