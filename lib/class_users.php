<?php
class User
{
    /**
     *
     * @var type id is integer
     */
    private $id;
    /**
     *
     * @var type is_admin is boolean
     */
    private $is_admin;
    
    private $user_name;
    private $mails_imetos;
    private $enable_user;
    //
    private $id_ftp;
    private $user_ftp;
    private $passw_ftp;
    private $server_ftp;
    private $remotedir_ftp;
    private $mails_ftp;
    private $enable_ftp;
    //
    private $id_mysql;
    private $user_mysql;
    private $passw_mysql;
    private $server_mysql;
    private $database_mysql;
    private $enable_mysql;
    //
    private $reportsList;
    //
    private $error;
    
    /**
     * 
     * @param type $id is integer
     * @param type $is_admin is integer
     * @param type $username
     * @param type $mails_imetos
     * @param type $enable_user
     * @param type $id_ftp
     * @param type $user_ftp
     * @param type $passw_ftp
     * @param type $server_ftp
     * @param type $remotedir_ftp
     * @param type $mails_ftp
     * @param type $enable_ftp
     * @param type $id_mysql
     * @param type $user_mysql
     * @param type $passw_mysql
     * @param type $server_mysql
     * @param type $database_mysql
     * @param type $enable_mysql
     */
    function __construct($id=0,$is_admin=0,$username='',$mails_imetos='',$enable_user='',
            $id_ftp=0,$user_ftp='',$passw_ftp='',$server_ftp='',$remotedir_ftp='',$mails_ftp='',$enable_ftp=1,
            $id_mysql=0,$user_mysql='',$passw_mysql='',$server_mysql='',$database_mysql='',$enable_mysql=1,
            $reportsList='') 
    {
        $this->id=$id;
        $this->is_admin=$is_admin;
        $this->user_name=$username;
        $this->mails_imetos=$mails_imetos;
        $this->enable_user=$enable_user;
        //
        $this->id_ftp=$id_ftp;
        $this->user_ftp=$user_ftp;
        $this->passw_ftp=$passw_ftp;
        $this->server_ftp=$server_ftp;
        $this->remotedir_ftp=$remotedir_ftp;
        $this->mails_ftp=$mails_ftp;
        $this->enable_ftp=$enable_ftp;
        //
        $this->id_mysql=$id_mysql;
        $this->user_mysql=$user_mysql;
        $this->passw_mysql=$passw_mysql;
        $this->server_mysql=$server_mysql;
        $this->database_mysql=$database_mysql;
        $this->enable_mysql=$enable_mysql;
        //
        $this->reportsList=$reportsList;
        //
        $this->error="";
    }
    /**
     * 
     * @return type
     */
    public function getError()
    {
        return $this->error;
    }
    /**
     * 
     * @return type
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * 
     * @return type
     */
    public function getUsername()
    {
        return $this->user_name;
    }
    public function getEmails()
    {
        return $this->mails_imetos;
    }
    public function getEnableUser()
    {
        return $this->enable_user;
    }
    //
    public function getIdFTP()
    {
        return $this->id_ftp;
    }
    public function getUserFTP()
    {
        return $this->user_ftp;
    }
    public function getPasswFTP()
    {
        return $this->passw_ftp;
    }
    public function getServerFTP()
    {
        return $this->server_ftp;
    }
    public function getRemoteDirFTP()
    {
        return $this->remotedir_ftp;
    }
    public function getEmailsFTP()
    {
        return $this->mails_ftp;
    }
    public function getEnableFTP()
    {
        return $this->enable_ftp;
    }
    //
    public function getIdMySQL()
    {
        return $this->id_mysql;
    }
    public function getUserMySQL()
    {
        return $this->user_mysql;
    }
    public function getPasswMySQL()
    {
        return $this->passw_mysql;
    }
    public function getServerMySQL()
    {
        return $this->server_mysql;
    }
    public function getDatabaseMySQL()
    {
        return $this->database_mysql;
    }
    /**
     * 
     * @return type
     */
    public function getEnableMySQL()
    {
        return $this->enable_mysql;
    }
    public function getReportsList()
    {
        return $this->reportsList;
    }
    /**
     * 
     */
    public static function save_config()
    {
        // guardo la nueva contraseña
        
    }
    /**
     * formulario nuevo usuario
     */
    public static function new_user()
    {
        // nuevo usuario
        if(isset($_POST['check_connection']))
        {
            if(isset($_POST['username']))
            {
                $username=  req("username");
            }
            if(isset($_POST['password']))
            {
                $password=  req("password");
            }
            if(isset($_POST['server']))
            {
                $server=  req("server");
            }
            if(isset($_POST['remotedir']))
            {
                $remotedir=  req("remotedir");
            }
            if(isset($_POST['mails']))
            {
                $mails=  req("mails");
            }
        }else
        {
            $username="";
            $password="";
            $server="";
            $remotedir="";
            $mails="";
        }
        // agregar nuevo informe
        echo "
            <br><br><br><br><br>
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"center-block\">                          
                        <a class=\"nuevo-usuario\" data-toggle=\"modal\" data-target=\"#nuevoUsuario\"><i class=\"fa fa-user-plus fa-4x\"></i>&nbsp;Nuevo usuario iMetos</a>
                    </div>
                </div>
            </div>";
        echo "  <!-- Modal -->
            <div id=\"nuevoUsuario\" class=\"modal fade\" role=\"dialog\">
                <div class=\"modal-dialog\">
                    <!-- Modal content-->
                    <div class=\"modal-content\">
                        <div class=\"modal-header\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                            <h4 class=\"modal-title\">Agregar usuario</h4>
                        </div>
                        <div class=\"modal-body\">
                            <form name=\"user_new\" method=\"post\" action=\"/users/new\">";
                                User::formulario_nuevo_usuario();
        echo "              </form>
                        </div>
                        <div class=\"modal-footer\">
                            <button type=\"submit\" name=\"config_admin\" class=\"btn btn-default\"><i class=\"fa fa-floppy-o\" aria-hidden=\"true\"></i>&nbsp;Guardar usuario</button>&nbsp;
                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i>&nbsp;Close</button>
                        </div>
                    </div>
                </div>
            </div>";
    }
    /**
     * Carga todos los usuarios (segun sea admin o no)
     * @param type $is_admin is boolean
     * @return boolean
     */
    public static function getAll($is_admin=false)
    {
        //cargar todos los usuarios
        if(!$is_admin)
        {
            if(isset($_SESSION['user_active']))
            {
                $username=$_SESSION['user_active'];
                $query="SELECT  `id`,`username`
                        FROM    `" . SESSION_NAME . "users`
                        WHERE   `usertype`='imetos' AND
                                `username`='{$username}'";
            }
        }else
        {
            $query="SELECT  `id`,`username`
                    FROM    `" . SESSION_NAME . "users`
                    WHERE   `usertype`='imetos'";
        }
        if(!sql_select($query,$results))
        {
            $this->error="No se pudo leer la tabla Users";
            return false;
        }
        settype($response, 'array');
        while($row=$results->fetch(PDO::FETCH_ASSOC))
        {
            $user= User::load($row['id']);
            $response[$row['id']]=$user;
        }
        return $response;
    }
    /**
     * Carga informacion de usuario 
     * @param type $userid is integer
     * @param type $fromArrayValues is array
     * @return \User|boolean
     */
    public static function load($userid=0, $fromArrayValues = false)
    {
        // cargo usuario 
        if(is_array($fromArrayValues))
        {
            $loadedDataArray = $fromArrayValues;
        }else
        {
            $query="SELECT  `id`,
                            `enable_user`,
                            `create_time`,
                            `username`,
                            `mails`,
                            `is_admin`
                    FROM    `" . SESSION_NAME . "users`
                    WHERE   `usertype`='imetos' AND
                            `id`={$userid} LIMIT 1";
            if(!sql_select($query, $results))
            {
                unset($results);
                $this->error="No se pudo leer la lista de usuarios";
                return false;
            }
            if($user = $results->fetch(PDO::FETCH_ASSOC))
            {
                // ahora busco usuarios ftp
                $query="SELECT  `id`,
                                `enable_user`,
                                `create_time`,
                                `username`,
                                `password`,
                                `server`,
                                `remotedir`,
                                `mails`
                        FROM    `" . SESSION_NAME . "users`
                        WHERE   `usertype`='ftp' AND
                                `userid`={$user['id']} LIMIT 1";
                if(sql_select($query, $results2))
                {
                    if($user_ftp=$results2->fetch(PDO::FETCH_ASSOC))
                    {
                        $user['ftp']=$user_ftp;
                    }
                }
                // ahora verifico el usuario mysql 
                $query="SELECT  `id`,
                                `enable_user`,
                                `create_time`,
                                `username`,
                                `password`,
                                `server`,
                                `database`
                        FROM    `" . SESSION_NAME . "users` 
                        WHERE   `usertype`='mysql' AND 
                                `userid`={$user['id']} LIMIT 1";
                //echo "query mysql--->".$query."<br>";
                if(sql_select($query, $results3))
                {
                    if($user_mysql=$results3->fetch(PDO::FETCH_ASSOC))
                    {
                        $user['mysql']=$user_mysql;
                    }
                }
            }
            unset($results);
            unset($results2);
            unset($results3);
            //
            $userid=0;
            $user_isadmin=0;
            $username="";
            $mails="";
            $enable_user=0;
            //
            $userFtpId=0;
            $userFtpUsername="";
            $userFtpPassword="";
            $userFtpServer="";
            $userFtpRemotedir="";
            $userFtpMails="";
            $userFtpEnable=0;
            //
            $userMysqlId=0;
            $userMysqlUsername="";
            $userMysqlPassword="";
            $userMysqlServer="";
            $userMysqlDatabase="";
            $userMysqlEnable=0;
            //
            if(isset($user['id'])) $userid=$user['id'];
            if(isset($user['is_admin'])) $user_isadmin=$user['is_admin'];
            if(isset($user['username'])) $username=$user['username'];
            if(isset($user['mails'])) $mails=$user['mails'];
            if(isset($user['enable_user'])) $enable_user=$user['enable_user'];
            //
            if(isset($user['ftp']['id'])) $userFtpId=$user['ftp']['id'];
            if(isset($user['ftp']['username'])) $userFtpUsername=$user['ftp']['username'];
            if(isset($user['ftp']['password'])) $userFtpPassword=$user['ftp']['password'];
            if(isset($user['ftp']['server'])) $userFtpServer=$user['ftp']['server'];
            if(isset($user['ftp']['remotedir'])) $userFtpRemotedir=$user['ftp']['remotedir'];
            if(isset($user['ftp']['mails'])) $userFtpMails=$user['ftp']['mails'];
            if(isset($user['ftp']['enable_user'])) $userFtpEnable=$user['ftp']['enable_user'];
            //
            if(isset($user['mysql']['id'])) $userMysqlId=$user['mysql']['id'];
            if(isset($user['mysql']['username'])) $userMysqlUsername=$user['mysql']['username'];
            if(isset($user['mysql']['password'])) $userMysqlPassword=$user['mysql']['password'];
            if(isset($user['mysql']['server']))  $userMysqlServer=$user['mysql']['server'];
            if(isset($user['mysql']['database'])) $userMysqlDatabase=$user['mysql']['database'];
            if(isset($user['mysql']['enable_user'])) $userMysqlEnable=$user['mysql']['enable_user'];
            //
            $n_user= new User($userid,
                    $user_isadmin,
                    $username,
                    $mails,
                    $enable_user,
                    $userFtpId,
                    $userFtpUsername,
                    $userFtpPassword,
                    $userFtpServer,
                    $userFtpRemotedir,
                    $userFtpMails,
                    $userFtpEnable,
                    $userMysqlId,
                    $userMysqlUsername,
                    $userMysqlPassword,
                    $userMysqlServer,
                    $userMysqlDatabase,
                    $userMysqlEnable);
            return $n_user;
        }
    }
    /**
     * Guarda nuevo usuario
     * @return boolean
     */
    public static function save()
    {
        // nuevo usuario
        $username_imetos=  req('username_imetos');
        $mails=  req('mails');
        //
        $username_ftp=   req('username_ftp');
        $password_ftp=  req('password_ftp');
        $server_ftp=  req('server_ftp');
        $remotedir= req('remotedir');
        $mails_ftp=  req('mails_ftp');
        //
        $username_mysql=  req('username_mysql');
        $password_mysql=  req('password_mysql');
        $database_mysql=  req('database_mysql');
        $server_mysql=  req('server_mysql');
        
        $create_time=time();
        $query="INSERT INTO `" . SESSION_NAME . "users`
                    (`enable_user`,`create_time`,`username`,`password`,`server`,`remotedir`,`is_admin`,`usertype`,`mails`)
                VALUES (1,{$create_time},'{$username_imetos}','','','',0,'imetos','{$mails}')";
        if($lastid=sql_select($query, $results))
        {
            unset($results);
            $query="INSERT INTO `" . SESSION_NAME . "users`
                        (`enable_user`,`create_time`,`username`,`password`,`server`,`remotedir`,`is_admin`,`userid`,`usertype`,`mails`)
                    VALUES (1,{$create_time},'{$username_ftp}','{$password_ftp}','{$server_ftp}','{$remotedir}',0,{$lastid},'ftp','{$mails_ftp}')";
            if(sql_select($query,$results))
            {
            }
            unset($results);
            $query="INSERT INTO `" . SESSION_NAME . "users`
                        (`enable_user`,`create_time`,`username`,`password`,`server`,`remotedir`,`is_admin`,`userid`,`usertype`,`mails`)
                    VALUES (1,{$create_time},'{$username_mysql}','{$password_mysql}','{$server_mysql}','',0,{$lastid},'mysql','')";
            if(sql_select($query,$results))
            {
            }
            unset($results);
            return true;
        }
        return false;
    }
    /**
     * Listado de usuarios imetos
     * @param type $is_admin is boolean
     * @param type $userid is number
     */
    public static function users_list($is_admin=false, $userid=0)
    {
        //$enum_tipos_usuarios=getEnumOptions('usuarios', 'usertype');
        if($users=User::getAll($is_admin))
        {
            echo "
                <h1>Listado de usuarios iMetos</h1>
                <table class=\"table table-striped table-hover table-bordered table-condensed\">
                    <tr>    
                        <th>&nbsp;</th>
                        <th>Usuario</th>
                        <th>Mails</th>
                    </tr>";
            foreach($users as $user)
            {
                echo "
                    <tr>
                        <td align=\"center\">
                            <a class=\"link-tabla\" href=\"javascript:borrar_usuario('{$user->getId()}');\">
                                <i class=\"fa fa-trash\"></i>
                            </a>&nbsp;";
                if($user->getEnableFTP())
                {
                    echo "  <a class=\"link-tabla\" href=\"javascript:realizar_informe('{$user->getUserFTP()}');\" title=\"Revisar sondas detenidas\">
                                <i class=\"fa fa-terminal\"></i>
                            </a>&nbsp;&nbsp;";
                }
                echo "      <a class=\"link-tabla\" href=\"javascript:mostrar_ocultar('conf_usuario_{$user->getId()}');\" title=\"Configuraci&oacute;n de usuario\">
                                <i class=\"fa fa-user\"></i>
                            </a>&nbsp;&nbsp;";
                echo "      <a class=\"link-tabla\" href=\"javascript:mostrar_ocultar('conf_exporta_{$user->getId()}');\" title=\"Configuraci&oacute;n de estaciones\">
                                <i class=\"fa fa-pencil\"></i>
                            </a>";
                echo "  </td>
                        <td>{$user->getUsername()}</td>
                        <td>{$user->getEmails()}</td>
                    </tr>
                    <tr>
                        <td colspan=\"6\">
                            <div id=\"conf_usuario_{$user->getId()}\" style=\"display:none\">
                                <form name=\"user_edit\" method=\"post\" action=\"/users/edit/{$user->getId()}\">";
                User::formulario_editar_usuario($user);
                echo "              <div class=\"panel-body\" style=\"text-align:right\">
                                        <div class=\"form-group\">
                                            <button type=\"submit\" name=\"save_user\" class=\"btn btn-default\"><i class=\"fa fa-floppy-o\" aria-hidden=\"true\"></i>&nbsp;Guardar usuario</button>&nbsp;
                                            <button type=\"button\" name=\"close\" class=\"btn btn-default\" onClick=\"javascript:mostrar_ocultar('conf_usuario_{$user->getId()}');\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i>&nbsp;Cerrar</button>&nbsp;
                                        </div>
                                    </div>
                                </form>";    
                echo "      </div>
                            <div class=\"conf_exporta\" id=\"conf_exporta_{$user->getId()}\" style=\"display:none\">";
                // si esta habilitado muestra info de estaciones
                if($user->getEnableMySQL())
                {
                    $BD = new IMETOS($user->getIdMySQL(), $user->getServerMySQL(), $user->getDatabaseMySQL(), $user->getUserMySQL(), $user->getPasswMySQL());
                    if($stations=Station::getAll($BD, $user->getId()))
                    {
                        Station::listAll($BD, $stations, $user);
                    }
                }
                echo "      </div> <!-- cierre de div conf_exporta -->
                        </td>
                    </tr>";
            }
            echo "</table>";
        }else
        {
            echo "No se pudo cargar los usuarios<br>";
        }
    }
    /**
     * 
     */
    private static function formulario_nuevo_usuario()
    {
        $label="label-enabled";
        echo "  <div class=\"container\">
                    <div class=\"col-md-12\">
                        <div class=\"panel panel-default col-md-11\">
                            <div class=\"panel-heading\" style=\"text-align:center\">
                                <h4 class=\"\">Datos de cuenta Fieldclimate</h4>
                            </div>
                            <div class=\"panel-body\">
                                <div class=\"form-group\">
                                    <label for=\"{$label}\">Usuario iMetos:&nbsp;</label><input type=\"text\" name=\"username_imetos\" value=\"\" size=\"80\" maxlength=\"255\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"{$label}\">Mails para el env&iacute;o de informes de exportaci&oacute;n:&nbsp;</label>
                                    <label for=\"{$label}\"><h6 class=\"\">(para varios mails sep&aacute;relos por coma)</h6></label><br>
                                    <textarea name=\"mails\" rows=\"3\" cols=\"120\"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default col-md-11\">
                            <div class=\"panel-heading\" style=\"text-align:center\">
                                <h4 class=\"\">Datos para la conexión a la base de datos iMetos</h4>
                            </div>
                            <div class=\"panel-body\">
                                <div class=\"form-group\">
                                    <label for=\"{$label}\">Usuario Mysql:&nbsp;</label><input type=\"text\" name=\"usuario_mysql\" value=\"\" size=\"80\" maxlength=\"255\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"{$label}\">Password Mysql:&nbsp;</label><input type=\"text\" name=\"password_mysql\" value=\"\" size=\"80\" maxlength=\"255\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"{$label}\">Base de datos Mysql:&nbsp;</label><input type=\"text\" name=\"base_datos_mysql\" value=\"\" size=\"80\" maxlength=\"255\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"{$label}\">Servidor Mysql:&nbsp;</label><input type=\"text\" name=\"servidor_mysql\" value=\"\" size=\"80\" maxlength=\"255\">
                                </div>
                            </div>
                        </div>
                        <div class=\"panel panel-default col-md-11\">
                            <div class=\"panel-heading\" style=\"text-align:center\">
                                <h4 class=\"\">Datos FTP para el informe de alerta</h4>
                            </div>
                            <div class=\"panel-body\">
                                <div class=\"form-group\">
                                    <label for=\"{$label}\">Usuario FTP:&nbsp;</label><input type=\"text\" name=\"username_ftp\" value=\"\" size=\"80\" maxlength=\"255\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"{$label}\">Password FTP:&nbsp;</label><input type=\"password\" name=\"password_ftp\" value=\"\" size=\"80\" maxlength=\"255\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"{$label}\">Servidor FTP:&nbsp;</label><input type=\"text\" name=\"server_ftp\" value=\"\" size=\"80\" maxlength=\"1000\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"{$label}\">Directorio remoto:&nbsp;</label><input type=\"text\" name=\"remotedir\" value=\"\" size=\"80\" maxlength=\"1000\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"{$label}\">Mails para el env&iacute;o de alertas:&nbsp;</label>
                                    <label for=\"{$label}\"><h6 class=\"\">(para varios mails sep&aacute;relos por coma)</h6></label><br>
                                    <textarea name=\"mails_ftp\" rows=\"3\" cols=\"80\"></textarea>
                                </div>
                                <div class=\"col-md-11\" style=\"text-align:right\">
                                    <div class=\"form-group\">
                                        <button type=\"submit\" name=\"check_connection\" class=\"btn btn-default\"><i class=\"fa fa-check-square-o\" aria-hidden=\"true\"></i>&nbsp;Verificar conexi&oacute;n</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
    }
    /**
     * 
     * @param User $user
     */
    private static function formulario_editar_usuario(User $user)
    {
        echo "          <div class=\"container\">
                            <div class=\"row\">
                                <div class=\"col-md-12\" style=\"text-align:center\">
                                    <h2>Configuraci&oacute;n de usuario</h2>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-12\">
                                    <input type=\"hidden\" name=\"userid\" value=\"{$user->getId()}\">";
        if($user->getEnableFTP())
        {
            echo "                  <input type=\"hidden\" name=\"id_ftp\" value=\"{$user->getIdFTP()}\">";
        }
        if($user->getEnableMySQL())
        {
            echo "                  <input type=\"hidden\" name=\"id_mysql\" value=\"{$user->getIdMySQL()}\">";
        }
        $label="label-enabled";
        echo "                      <div class=\"panel panel-default\">
                                        <div class=\"panel-heading\" style=\"text-align:center\">
                                            <h3 class=\"\">Datos de cuenta Fieldclimate</h3>
                                        </div>
                                        <div class=\"panel-body\">
                                            <div class=\"form-group\">
                                                <label for=\"{$label}\">Usuario iMetos:&nbsp;</label><input type=\"text\" name=\"username_imetos\" value=\"{$user->getUsername()}\" size=\"80\" maxlength=\"255\">
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"{$label}\">Mails para el env&iacute;o de informes de exportaci&oacute;n:&nbsp;</label>
                                                <label for=\"{$label}\"><h6 class=\"\">(para varios mails sep&aacute;relos por coma)</h6></label><br>
                                                <textarea name=\"mails\" rows=\"3\" cols=\"120\">{$user->getEmails()}</textarea>
                                            </div>
                                        </div>
                                    </div>";
        // agrego usuario mysql
        if($user->getEnableMySQL())
        {
            echo "                  <div class=\"panel panel-default\">
                                        <div class=\"panel-heading\" style=\"text-align:center\">
                                            <h3 class=\"\">Datos para la conexión a la base de datos iMetos</h3>
                                        </div>
                                        <div class=\"panel-body\">
                                            <div class=\"form-group\">
                                                <label for=\"{$label}\">Usuario Mysql:&nbsp;</label><input type=\"text\" name=\"usuario_mysql\" value=\"{$user->getUserMySQL()}\" size=\"80\" maxlength=\"255\">
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"{$label}\">Password Mysql:&nbsp;</label><input type=\"text\" name=\"password_mysql\" value=\"{$user->getPasswMySQL()}\" size=\"80\" maxlength=\"255\">
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"{$label}\">Base de datos Mysql:&nbsp;</label><input type=\"text\" name=\"base_datos_mysql\" value=\"{$user->getDatabaseMySQL()}\" size=\"80\" maxlength=\"255\">
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"{$label}\">Servidor Mysql:&nbsp;</label><input type=\"text\" name=\"servidor_mysql\" value=\"{$user->getServerMySQL()}\" size=\"80\" maxlength=\"255\">
                                            </div>
                                        </div>
                                    </div>";
        }
        if($user->getEnableFTP())
        {
            echo "                  <div class=\"panel panel-default\">
                                        <div class=\"panel-heading\" style=\"text-align:center\">
                                            <h3 class=\"\">Datos FTP para el informe de alerta</h3>
                                        </div>
                                        <div class=\"panel-body\">
                                            <div class=\"form-group\">
                                                <label for=\"{$label}\">Usuario FTP:&nbsp;</label><input type=\"text\" name=\"username_ftp\" value=\"{$user->getUserFTP()}\" size=\"80\" maxlength=\"255\">
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"{$label}\">Password FTP:&nbsp;</label><input type=\"password\" name=\"password_ftp\" value=\"{$user->getPasswFTP()}\" size=\"80\" maxlength=\"255\">
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"{$label}\">Servidor FTP:&nbsp;</label><input type=\"text\" name=\"server_ftp\" value=\"{$user->getServerFTP()}\" size=\"80\" maxlength=\"1000\">
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"{$label}\">Directorio remoto:&nbsp;</label><input type=\"text\" name=\"remotedir\" value=\"{$user->getRemoteDirFTP()}\" size=\"80\" maxlength=\"1000\">
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"{$label}\">Mails para el env&iacute;o de alertas:&nbsp;</label>
                                                <label for=\"{$label}\"><h6 class=\"\">(para varios mails sep&aacute;relos por coma)</h6></label><br>
                                                <textarea name=\"mails_ftp\" rows=\"3\" cols=\"80\">{$user->getEmailsFTP()}</textarea>
                                            </div>
                                            <div class=\"col-md-8\"></div>
                                            <div class=\"col-md-4\">
                                                <div class=\"form-group\">
                                                    <button type=\"submit\" name=\"check_connection\" class=\"btn btn-default\"><i class=\"fa fa-check-square-o\" aria-hidden=\"true\"></i>&nbsp;Verificar conexi&oacute;n</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
        }
        echo "                      <br><br><br>
                                </div><!-- fin de col-md-12 -->
                            </div><!-- fin de row -->
                        </div><!-- fin de container -->";
    }    
    /**
     * Actualiza datos del usuario
     * @return boolean
     */
    public static function update()
    {
        $error=false;
        // imetos
        $userid=  req("userid");
        $usuario=  req("username"); // usuario iMetos
        // ftp
        $userid_ftp=req("id_ftp");
        $usuario_ftp= req("usuario_ftp"); // usuario ftp
        $password_ftp=  req("password_ftp"); // password ftp
        $servidor_ftp= req("servidor_ftp"); // servidor ftp
        $directorio_remoto=  req("directorio_remoto"); 
        $mails=  req("mails");
        // mysql
        $userid_mysql=  req("id_mysql");
        $usuario_mysql=  req("usuario_mysql");
        $password_mysql=  req("password_mysql");
        $servidor_mysql=  req("servidor_mysql");
        //
        $query="UPDATE  `" . SESSION_NAME . "users`
                SET     `username`='".$usuario."',
                        `password`='',
                        `server`='',
                        `directorio_remoto`='',
                        `is_admin`=0,
                        `usertype`='imetos',
                        `mails`=''
                WHERE   `id`={$userid}";
        if(!sql_select($query, $results))
        {
            // hubo un error
            $error=true;
        }
        unset($results);
        // ftp
        $query="UPDATE  `" . SESSION_NAME . "users`
                SET     `username`='{$usuario_ftp}',
                        `password`='{$password_ftp}',
                        `server`='{$servidor_ftp}',
                        `remotedir`='{$directorio_remoto}',
                        `is_admin`=0,
                        `usertype`='ftp',
                        `mails`='{$mails}'
                WHERE   `id`={$userid_ftp}";
        if(!sql_select($query, $results))
        {
            // hubo un error
            $error=true;
        }
        unset($results);
        // mysql
        $query="UPDATE  `" . SESSION_NAME . "users`
                SET     `username`='{$usuario_mysql}',
                        `password`='{$password_mysql}',
                        `server`='{$servidor_mysql}',
                        `remotedir`='',
                        `is_admin`=0,
                        `usertype`='mysql',
                        `mails`=''
                WHERE   `id`={$userid_mysql}";
        if(!sql_select($query, $results))
        {
            // hubo un error
            $error=true;
        }
        unset($results);
        if($error) return false;
        return true;
    }
    /**
     * 
     * @param type $userid
     * @return boolean
     */
    public static function delete_user($userid=0)
    {
        if($userid==0) return false;
        $query="DELETE FROM `" . SESSION_NAME . "users` 
                WHERE `id`={$userid}";
        if(!sql_select($query, $results))
        {
            return false;
        }
        unset($results);
        return true;
    }

    /*
    public static function check_connection()
    {
        echo "<pre>";
        echo "check_connection<br><br>";
        print_r($_POST);
        echo "</pre>";
        
        $username=  req('username_ftp');
        $password=  req('password_ftp');
        $server=  req('server_ftp');
        $remotedir= req('remotedir');
        if($obj_ftp=new FTP($server,$username,$password,$remotedir))
        {
            return true;
        }
        return false;
    }
    */
    private function proceso_fecha($fecha)
    {
        $dia=substr($fecha,-2);
        $mes=substr($fecha,-4,2);
        $anio=intval(substr($fecha,0,2))+2000;
        return $dia."/".$mes."/".$anio;
    }
    
    private function fecha_vencida($dato)
    {
        $ahora=mktime(0,0,0,date("n"),date("j"),date("Y"));
        if(strlen($dato['fecha'])==6)
        {
            $anio=intval(substr($dato['fecha'],0,2))+2000;
            $mes=substr($dato['fecha'],2,2);
            $dia=substr($dato['fecha'],4,2);
            $fdato=mktime(0,0,0,$mes,$dia,$anio);
            $fecha_ahora=new DateTime(date("Y")."-".date("m")."-".date("d"));
            $fecha_dato=new DateTime($anio."-".$mes."-".$dia);
            $dife=  $this->dateTimeDiff($fecha_ahora, $fecha_dato);
            if($dife->d>DIFERENCIA_DIAS)
            {
                // si diferencia es mayor a DIFERENCIA_DIAS envio mail
                return true;
            }
            return false;
        }
    }
    
    private function dateTimeDiff($date1, $date2)
    {
        $alt_diff = new stdClass();
        $alt_diff->y =  floor(abs($date1->format('U') - $date2->format('U')) / (60*60*24*365));
        $alt_diff->m =  floor((floor(abs($date1->format('U') - $date2->format('U')) / (60*60*24)) - ($alt_diff->y * 365))/30);
        $alt_diff->d =  floor(floor(abs($date1->format('U') - $date2->format('U')) / (60*60*24)) - ($alt_diff->y * 365) - ($alt_diff->m * 30));
        $alt_diff->h =  floor( floor(abs($date1->format('U') - $date2->format('U')) / (60*60)) - ($alt_diff->y * 365*24) - ($alt_diff->m * 30 * 24 )  - ($alt_diff->d * 24) );
        $alt_diff->i = floor( floor(abs($date1->format('U') - $date2->format('U')) / (60)) - ($alt_diff->y * 365*24*60) - ($alt_diff->m * 30 * 24 *60)  - ($alt_diff->d * 24 * 60) -  ($alt_diff->h * 60) );
        $alt_diff->s =  floor( floor(abs($date1->format('U') - $date2->format('U'))) - ($alt_diff->y * 365*24*60*60) - ($alt_diff->m * 30 * 24 *60*60)  - ($alt_diff->d * 24 * 60*60) -  ($alt_diff->h * 60*60) -  ($alt_diff->i * 60) );
        $alt_diff->invert =  (($date1->format('U') - $date2->format('U')) > 0)? 0 : 1 ;
        return $alt_diff;
    }    

}