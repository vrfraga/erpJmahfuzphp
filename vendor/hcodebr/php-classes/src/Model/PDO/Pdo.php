<?php


Class PDO {
		public __construct ( string $dsn [, string $username [, string $passwd [, array $options ]]] )
		public beginTransaction ( ) : bool
		public commit ( ) : bool
		public errorCode ( ) : string
		public errorInfo ( ) : array
		public exec ( string $statement ) : int
		public getAttribute ( int $attribute ) : mixed
		public static getAvailableDrivers ( ) : array
		public inTransaction ( ) : bool
		public lastInsertId ([ string $name = NULL ] ) : string
		public prepare ( string $statement [, array $driver_options = array() ] ) : PDOStatement
		public query ( string $statement ) : PDOStatement
		public quote ( string $string [, int $parameter_type = PDO::PARAM_STR ] ) : string
		public rollBack ( ) : bool
        public setAttribute ( int $attribute , mixed $value ) : bool
}

?>