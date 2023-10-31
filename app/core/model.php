<?php 

/**
 * main model class
 */
class Model extends Database
{
	
	protected $table = "";
    // public allowedColumns = [""];

	public function insert($data)
	{
		//remove unwanted columns
		if(!empty($this->allowedColumns))
		{
			foreach ($data as $key => $value) {
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);

		$query = "insert into " . $this->table;
		$query .= " (".implode(",", $keys) .") values (:".implode(",:", $keys) .")";

		$this->query($query,$data);

	}

	public function update($id,$data)
	{

		//remove unwanted columns
		if(!empty($this->allowedColumns))
		{
			foreach ($data as $key => $value) {
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);
		$query = "update ".$this->table." set ";

		foreach ($keys as $key) {
			$query .= $key ."=:" . $key . ","; 

		}

		$query = trim($query,",");
		$query .= " where id = :id ";
		
		$data['id'] = $id;
		$this->query($query,$data);

	}

	public function findAll($order = 'desc')
	{

		$query = "select * from ".$this->table;
 
		$res = $this->query($query);

		if(is_array($res))
		{
			return $res;
		}

		return false;

	}

	public function where($data)
	{

		$keys = array_keys($data);

		$query = "select * from ".$this->table." where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}
 
 		$query = trim($query,"&& ");
		$res = $this->query($query,$data);

		if(is_array($res))
		{
			return $res;
		}

		return false;

	}

	public function first($data, $order = 'desc')
	{

		$keys = array_keys($data);

		$query = "select * from ".$this->table." where ";

		foreach ($keys as $key) {
			$query .= $key . "=:" . $key . " && ";
		}
 
 		$query = trim($query,"&& ");
 		$query .= " order by id $order limit 1";

		$res = $this->query($query,$data);

		if(is_array($res))
		{
			return $res[0];
		}

		return false;

	}

    // public function delete($data, $order = 'desc')
	// {
	//     // var_dump($_POST);
    //     if($this->coachModel->deleteCoach($_POST["submit"]) && $this->coachUserModel->deleteUser($_POST["submit"])) {
    //         die("User Deleted Successfully");
    //         // redirect("Users/register");
    //     }else{
    //         die("Something Went Wrong");
    //     }
    // }

    public function delete($data)
    {
        $keys = array_keys($data);

        $query = "delete from " . $this->table . " where ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }

        $query = trim($query, "&& ");

        $this->db->query($query, $data);

        return true;
    }

	// public function delete($id):bool{
    //     $query="DELETE FROM ".$this->table." WHERE ".$this->primaryKey."=:id limit 1";
    //     $this->query($query,['id'=>$id]);
    //     return true;
    // }

}