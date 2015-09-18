<?php
class AlumnTeamData {
	public static $tablename = "alumn_team";


	public function AlumnTeamData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function getAlumn(){ return AlumnData::getById($this->alumn_id); }
	public function getTeam(){ return TeamData::getById($this->team_id); }

	public function add(){
		$sql = "insert into ".self::$tablename." (alumn_id,team_id) ";
		$sql .= "value (\"$this->alumn_id\",$this->team_id)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where alumn_id=$this->alumn_id and team_id=$this->team_id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto AlumnTeamData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AlumnTeamData());
	}

	public static function getByAT($a,$t){
		$sql = "select * from ".self::$tablename." where alumn_id=$a and team_id=$t";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AlumnTeamData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new AlumnTeamData());

	}

		public static function getAllByTeamId($id){
		$sql = "select * from ".self::$tablename." where team_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AlumnTeamData());
	}

		public static function getAllByAlumnId($id){
		$sql = "select * from ".self::$tablename." where alumn_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AlumnTeamData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AlumnTeamData());
	}


}

?>