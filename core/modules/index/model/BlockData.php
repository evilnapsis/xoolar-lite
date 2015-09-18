<?php
class BlockData {
	public static $tablename = "block";


	public function BlockData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name,team_id) ";
		$sql .= "value (\"$this->name\",$this->team_id)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto BlockData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set kind_id=\"$this->kind_id\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BlockData());
	}

	public static function getByATD($alumn,$team,$date_at){
		$sql = "select * from ".self::$tablename." where alumn_id=$alumn and team_id=$team and date_at=\"$date_at\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BlockData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new BlockData());
	}

	public static function getAllByTeamId($id){
		$sql = "select * from ".self::$tablename." where team_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BlockData());
	}

	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BlockData());
	}


}

?>