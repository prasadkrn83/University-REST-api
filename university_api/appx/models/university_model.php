<?php 
class university_model extends CI_model{

	public function getAllDepartments(){
		
		$query = $this->db->get('department');

		return $query->result_array();

	}
	public function getDepartment($id){
		
		$this->db->select(); 
		$this->db->from('department')->where('id',$id);
		$query =$this->db->get();

		if($query->num_rows() == 1)
           {

               return $query->result_array();

           }
           else
           {

             return 0;

          }


	}
	public function getAllMajors($deptId){

		$this->db->select(); 
		$this->db->from('major')->where('dept_id',$deptId);
		$query =$this->db->get();

		if($query->num_rows() >= 1)
           {

               return $query->result_array();

           }
           else
           {

             return 0;

          }


	}
	public function getMajor($id){

		$this->db->select(); 
		$this->db->from('major')->where('id',$id);
		$query =$this->db->get();

		if($query->num_rows() == 1)
           {

               return $query->result_array();

           }
           else
           {

             return 0;

          }


		
	}
	public function getAllSubjectsByDept($deptId){
		$this->db->select('subject.id,subject.name,subject.description,subject.major_id,major.name'); 
		$this->db->from('subject, major');
		$this->db->where('subject.major_id=major.id');
		$this->db->where('major.dept_id',$deptId);
		$query =$this->db->get();

		if($query->num_rows() >= 1)
           {

               return $query->result_array();

           }
           else
           {

             return 0;

          }

	}
	public function getAllSubjectsByMajor($majorId){
		$this->db->select(); 
		$this->db->from('subject')->where('major_id',$majorId);
		$query =$this->db->get();

		if($query->num_rows() >= 1)
           {

               return $query->result_array();

           }
           else
           {

             return 0;

          }



	}
	public function getSubject($id){

		$this->db->select(); 
		$this->db->from('subject')->where('id',$id);
		$query =$this->db->get();

		if($query->num_rows() == 1)
           {

               return $query->result_array();

           }
           else
           {

             return 0;

          }


		
	}
	public function addDepartment($data){
        if($this->db->insert('department', $data)){

           return true;

        }else{

           return false;

        }


	}
	public function addMajor($data){
		if($this->db->insert('major', $data)){

           return true;

        }else{

           return false;

        }
		
	}
	public function addSubject($data){
		if($this->db->insert('subject', $data)){

           return true;

        }else{

           return false;

        }
		
	}
	public function updateDepartment($id,$data){
		$this->db->where('id', $id);

       	if($this->db->update('department', $data)){

          return true;

        }else{

          return false;

        }

	}
	public function updateMajor($id,$data){
		$this->db->where('id', $id);

       	if($this->db->update('major', $data)){

          return true;

        }else{

          return false;

        }
		
	}
	public function updateSubject($id,$data){
		$this->db->where('id', $id);

       	if($this->db->update('subject', $data)){

          return true;

        }else{

          return false;

        }
		
	}
	public function deleteDepartment($id){

		$this->db->where('id', $id);

       	if($this->db->delete('department')){

          return true;

        }else{

          return false;

        }

	}
	public function deleteMajor($id){
		$this->db->where('id', $id);

       	if($this->db->delete('major')){

          return true;

        }else{

          return false;

        }
		
	}
	public function deleteSubject($id){

		$this->db->where('id', $id);

       	if($this->db->delete('subject')){

          return true;

        }else{

          return false;

        }
		
	}
}
?>