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
							require_once('models/varietyModel.php');
							require_once('models/pathogenModel.php');
							require_once('models/disease_pathogenModel.php');
							require_once('models/provinceModel.php');
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
||  ($controller=='rice' && ($action == 'index_riceVariety'|| $action == 'addVariety'|| $action == 'updateVariety' || $action == 'search_spec' ||  $action == 'index_riceDisease' || $action == 'index_ricePathogen' || $action == 'addPathogen' || $action =='updatePathogen' || $action == 'deletePathogen' ||$action=='searchPathogen' ||$action=='addDisease'||$action=='updateDisease' || $action == 'deleteDisease'|| $action == 'search_dis' || $action == 'index_riceDiseasePathogen' || $action == 'addDiseasePathogen' || $action == 'deleteVariety' || $action == 'getAjaxProvince'))
|| ($controller == 'dep' && ($action  == 'index_dep' || $action == 'addDep' || $action == 'updateDep' || $action == 'deletedep'))
|| ($controller == 'district' && ($action == 'index_district' || $action == 'updateDistrict'))
|| ($controller == 'subdistrict' && ($action == 'index_subdistrict'))
||  ($controller=='user' && ($action == 'index_userMm' || $action == 'addUserByAdmin')))
{	call($controller,$action);	}
else
{	call('page','error'); }
?>
