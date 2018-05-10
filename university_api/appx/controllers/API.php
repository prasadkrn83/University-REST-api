<?php
require(APPPATH.'/libraries/REST_Controller.php');
 
class Api extends REST_Controller{
    
    public function getAllDepartments_get(){
		$result = $this->university_model->getAllDepartments();
		if($result){

            $this->response($result, 200); 

            exit;
        } 
        else{

             $this->response("No result found", 404);

            exit;
        }

		
	}
	public function getDepartment_get(){
		$deptId = $this->get('deptId'); 
		if(!$deptId){

            $this->response("No Department specified", 400);

            exit;
        }

		$result = $this->university_model->getDepartment($deptId);
		if($result){

            $this->response($result, 200); 

            exit;
        } 
        else{

             $this->response("Invalid Department", 404);

            exit;
        }

	}
	public function getAllMajors_get(){
		$deptId = $this->get('deptId');
		if(!$deptId){

            $this->response("No Department specified", 400);

            exit;
        } 
		$result = $this->university_model->getAllMajors($deptId);
		if($result){

            $this->response($result, 200); 

            exit;
        } 
        else{

             $this->response("Invalid Department", 404);

            exit;
        }

	}
	public function getMajor_get(){
		$majorId = $this->get('majorId'); 
		if(!$majorId){

            $this->response("No Major specified", 400);

            exit;
        }
		$result = $this->university_model->getMajor($majorId);
		if($result){

            $this->response($result, 200); 

            exit;
        } 
        else{

             $this->response("Invalid Major", 404);

            exit;
        }

		
	}
	public function getAllSubjectsByDept_get(){
		$deptId = $this->get('deptId'); 
		if(!$deptId){

            $this->response("No Department specified", 400);

            exit;
        } 


		$result = $this->university_model->getAllSubjectsByDept($deptId);
		if($result){

            $this->response($result, 200); 

            exit;
        } 
        else{

             $this->response("Invalid Department", 404);

            exit;
        }

	}
	public function getAllSubjectsByMajor_get(){
		$majorId = $this->get('majorId'); 
		if(!$majorId){

            $this->response("No Major specified", 400);

            exit;
        }
		$result = $this->university_model->getAllSubjectsByMajor($majorId);
		if($result){

            $this->response($result, 200); 

            exit;
        } 
        else{

             $this->response("Invalid Major", 404);

            exit;
        }

	}
	public function getSubject_get(){

		$subjectId = $this->get('subjectId'); 
		if(!$subjectId){

            $this->response("No Subject specified", 400);

            exit;
        }
		$result = $this->university_model->getSubject($subjectId);
		if($result){

            $this->response($result, 200); 

            exit;
        } 
        else{

             $this->response("Invalid Subject", 404);

            exit;
        }

		
	}
	
	public function addDepartment_post(){

	$name = $this->post('name'); 
    
    $description = $this->post('description');

    if(!$name || !$description){ 

       $this->response("Enter complete Department information to save", 400); 

     }else{ 
    
        $result = $this->university_model->addDepartment(array("name"=>$name, "description"=>$description)); 

       if($result === 0){ 

            $this->response("Department could not be saved. Try again.", 404); 

       }else{ 
            
            $this->response("success", 200); 

       }

    	
	}
}
	public function addMajor_post(){

	$name = $this->post('name'); 
    
    $description = $this->post('description'); 
    
    $deptId = $this->post('deptId'); 
    
    if(!$name || !$description || !$deptId){ 

       $this->response("Enter complete Major information to save", 400); 

     }else{ 
    
        $result = $this->university_model->addMajor(array("name"=>$name, "description"=>$description,"dept_id"=>$deptId)); 

       if($result === 0){ 

            $this->response("Major could not be saved. Try again.", 404); 

       }else{ 
            
            $this->response("success", 200); 

       }
		
	}
}
	public function addSubject_post(){
	$name = $this->post('name'); 
    
    $description = $this->post('description'); 
    
    $majorId = $this->post('majorId'); 
    
    if(!$name || !$description || !$majorId){ 

       $this->response("Enter complete Subject information to save", 400); 

     }else{ 
    
        $result = $this->university_model->addSubject(array("name"=>$name, "description"=>$description,"major_id"=>$majorId)); 

       if($result === 0){ 

            $this->response("Subject could not be saved. Try again.", 404); 

       }else{ 
            
            $this->response("success", 200); 

       }
	}
}
	public function updateDepartment_put(){
	$name = $this->put('name'); 
    
    $description = $this->put('description');

	$deptId = $this->put('deptId'); 

    
    if(!$name || !$description || !$deptId){ 

       $this->response("Enter complete Department information to save", 400); 

     }else{ 
    
        $result = $this->university_model->updateDepartment($deptId,array("name"=>$name, "description"=>$description)); 

       if($result === 0){ 

            $this->response("Department could not be saved. Try again.", 404); 

       }else{ 
            
            $this->response("success", 200); 

       }

	}
}
	public function updateMajor_put(){

	$name = $this->put('name'); 
    
    $description = $this->put('description'); 
    
    $majorId = $this->put('majorId'); 
    
    if(!$name || !$description || !$majorId){ 

       $this->response("Enter complete Major information to save", 400); 

     }else{ 
    
        $result = $this->university_model->updateMajor($majorId,array("name"=>$name, "description"=>$description)); 

       if($result === 0){ 

            $this->response("Major could not be saved. Try again.", 404); 

       }else{ 
            
            $this->response("success", 200); 

       }
		
		
	}
}
	public function updateSubject_put(){

	$name = $this->put('name'); 
    
    $description = $this->put('description'); 
    
    $subjectId = $this->put('subjectId'); 
    
    if(!$name || !$description || !$subjectId){ 

       $this->response("Enter complete Subject information to save", 400); 

     }else{ 
    
        $result = $this->university_model->updateSubject($subjectId,array("name"=>$name, "description"=>$description)); 

       if($result === 0){ 

            $this->response("Subject could not be saved. Try  again.", 404); 

       }else{ 
            
            $this->response("success", 200); 

       }
		
	}
}
	public function deleteDepartment_delete(){
		$id  = $this->delete('id');

        if(!$id){

            $this->response("Parameter missing", 404);

        }
         
        if($this->university_model->deleteDepartment($id))
        {

            $this->response("Success", 200);

        } 
        else
        {

            $this->response("Failed", 400);

        }
	}
	public function deleteMajor_delete(){

		$id  = $this->delete('id');

        if(!$id){

            $this->response("Parameter missing", 404);

        }
         
        if($this->university_model->deleteMajor($id))
        {

            $this->response("Success", 200);

        } 
        else
        {

            $this->response("Failed", 400);

        }
		
	}
	public function deleteSubject_delete(){
		$id  = $this->delete('id');

        if(!$id){

            $this->response("Parameter missing", 404);

        }
         
        if($this->university_model->deleteSubject($id))
        {

            $this->response("Success", 200);

        } 
        else
        {

            $this->response("Failed", 400);

        }
	}
}