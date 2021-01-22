<?

//Essa classe guarda as configurações de cada conexão, 
// endereço do banco, tipo do banco, porta, nome do banco, usuário e senha.

class DDConnectSettings
{
    const MYSQL = 1;
    const PGSQL = 2;
    const MSSQL = 3;
    const ORACLE = 4;
    const SQLite = 5;
     
    private $f_application;
    private $st_host;
    private $in_port;
    private $st_dbase;
    private $st_user;
    private $st_password;
     
    /**
    * define o gerenciador de banco de dados 
    * @param int $f_aplication
    * @example $ob->setAplication(DDConnectSettings::MYSQL);
    *   Use
    *   DDConnectSettings::MYSQL - para MySQL
    *   DDConnectSettings::PGSQL - para PostgreSQL
    *   DDConnectSettings::MSSQL - para Microsoft SQL Server
    *   DDConnectSettings::ORACLE - para Oracle
    *   DDConnectSettings::SQLite - para SQLLite
    */
    public function setApplication($f_aplication)
    {
        $this->f_application = $f_aplication;
    }
     
    /**
    * retorna qual o gerenciador de banco de dados definido 
    * @return int
    */
    public function getApplication()
    {
        return $this->f_application;
    }
     
    /**
    * define endereço (IP ou domínio) do servidor
    * @param string $st_host
    */
    public function setHost($st_host)
    {
        $this->st_host = $st_host;
    }
     
    /**
    * retorna o endereço do servidor definido 
    * @return string
    */
    public function getHost()
    {
        return $this->st_host;
    }
     
    /**
    * define a porta a ser usada na conexão
    * @param int $in_port
    */
    public function setPort($in_port)
    {
        $this->in_port = $in_port;
    }
     
    /**
    * retorna a porta definida
    * @return int
    */
    public function getPort()
    {
        return $this->in_port;
    }
     
    /**
    * define o nome do banco de dados ou arquivo
    * @param string $st_dbase
    */
    public function setDatabase($st_dbase)
    {
        $this->st_dbase = $st_dbase;
    }
 
    /**
    * retorna o nome do banco de dados ou arquivo definido
    * @return string
    */
    public function getDatabase()
    {
        return $this->st_dbase;
    }
     
    /**
    * define o nome do usuário a ser usado em uma conexão protegida
    * @param string $st_user
    */
    public function setUser($st_user)
    {
        $this->st_user = $st_user;
    }
     
    /**
    * retorna o nome do usuário definido no caso de uma conexão pretegida
    * @return string
    */
    public function getUser()
    {
        return $this->st_user;
    }
     
    /**
    * define a senha de usuário a ser usado em uma conexão protegida
    * @param string $st_password
    */
    public function setPassword($st_password)
    {
        $this->st_password = $st_password;
    }
     
    /**
    * retorna a senha de usuário definido no caso de uma conexão pretegida
    * @return string
    */
    public function getPassword()
    {
        return $this->st_password;
    }
}

?>