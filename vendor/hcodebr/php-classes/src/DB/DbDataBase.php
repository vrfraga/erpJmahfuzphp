<?

class DDDatabase
{
    private $v_connections;
    private $v_database;
     
    /**
    * Estabele conexão com o gerenciador de banco de dados
    * @param string $st_database - Alias definido pelo desenvolvedor para uma conexão
    * @param DDConnectSettings $o_DDCSettings - Objeto contendo as configurações de uma conexão
    * @throws DDDException
    */
    public function setConnectSettings($st_database, DDConnectSettings $o_DDCSettings)
    {
        $v_database[$st_database] = $o_DDCSettings;
         
        $st_dbname = $o_DDCSettings->getDatabase();
         
        switch($o_DDCSettings->getApplication())
        {
            case DDConnectSettings::MYSQL:
                $st_dsn = "mysql:dbname=$st_dbname";
            break;
         
            case DDConnectSettings::PGSQL:
                $st_dsn = "pgsql:dbname=$st_dbname";
            break;
         
            case DDConnectSettings::MSSQL:
                $st_dsn = "mssql:dbname=$st_dbname";
            break;
         
            case DDConnectSettings::ORACLE:
                $st_dsn = "oci:dbname=$st_dbname";
            break;
 
            case DDConnectSettings::SQLite:
                $st_dsn = "sqlite:$st_dbname";
            break;
             
            default:
                throw new DDDException('Invalid drive'); 
            break;
        }
         
        $st_host = $o_DDCSettings->getHost();
        $st_username = $o_DDCSettings->getUser();
        $st_password = $o_DDCSettings->getPassword();
        $in_port = $o_DDCSettings->getPort();
         
        try
        {
            if(isset($st_host))
            {
                $st_dsn .= ";host=$st_host";
                if(isset($in_port))
                    $st_dsn .= ";port=$in_port";
            }
             
             
            if(isset($st_username) && isset($st_password))
            {
                $this->v_connections[$st_database] = new PDO($st_dsn, $st_username, $st_password );
            }   
            else
            {
                $this->v_connections[$st_database] = new PDO($st_dsn);
            }   
                 
            $this->v_connections[$st_database]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            throw new DDDException($e->getMessage());
        }   
    }
     
    /**
    * Retorna um objeto contendo os dados das configurações de uma conexão
    * @param string $st_database - Alias defindo pelo desenvolvedor para a conexão em questão
    */
    public function getConnectSettings($st_database)
    {
        return $this->v_database[$st_database];
    }
     
    /**
    * Executa uma consulta SQL, retornando uma instância da classe DDData
    * @param string $st_database - Alias da conexão que desenvolvedor deseja usar
    * @param  string $st_query - Consulta SQL
    * @return DDData
    * @throws DDDException
    */
    public function execQuery($st_database,$st_query)
    {
        try
        {
            $v_row = $this->v_connections[$st_database]->query($st_query);        
            $o_DDData = new DDData();
            $o_DDData->setData($v_row);
        }
        catch (PDOException $e)
        {
            throw new DDDException($e->getMessage());
        }
        return $o_DDData;
    }
}

?>