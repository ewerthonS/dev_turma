<?php
//Não apresentar tela com erros
//init_set('display_errors', '0');
require_once("../databases/BdturmaConect.php");
require_once("../config/SimpleRest.php");

$page_key="";

class usuariosRestHandler extends SimpleRest{
    public function usuariosIncluir(){

        if(isset($_POST["txtnomeusuario"])){
$nome = $_POST["txtnomeusuario"];
$email = $_POST["txtemailusuario"];
$senha = $_POST["txtsenhausuario"];


$query = "CALL spInserirUsuarios(:pnome,:pemail,:psenha)";
$array = array(":pnome"=>"{$nome}",":pemail"=>"{$email}",":psenha"=>"{$senha}");


            //Instanciar a classe bdturmaConect
            $dbcontroller = new BdturmaConect();

            //Chamar o método
            $rawData = $dbcontroller-> executeprocedure($query,$array);

                //Verificar se o retorno está vazio
                if(empty($rawData)){
                    $statuscode = 404;
                    $rawData = array('sucesso' => 0);
                }
                else {
                    $statuscode = 200;

                }

                $requestContentType = $_POST['HTTP_ACCEPT'];
                $this ->setHttpHeaders($requestContentType, $statuscode);
                $result["RetornoDados"] = $rawData;

                if(strpos($requestContentType, 'application/json') !==false){
                    $response = $this->encodeJson($result);
                    echo $response;
                }
            }
        }

        public function usuariosConsultar(){
            if(isset($_POST["txtnome"])){
            $nome = $_POST["txtnome"];

            //Informar a Stored Procedure e seus pârametros
            $query = "CALL spConsultarusuario(:pnome)";

            //Definir o conjuto de dados
            $array = array(":pnome" =>"{$nome}");
                    
                        
                        //Instanciar a classe bdturmaConect
                        $dbcontroller = new BdturmaConect();
                        //Chamar o método
                        $rawData = $dbcontroller-> executeprocedure($query,$array);
    
                    //Verificar se o retorno está vazio
                    if(empty($rawData)){
                        $statuscode = 404;
                        $rawData = array('sucesso' => 0);
                    }
                    else {
                        $statuscode = 200;
                      
                    }
    
                    $requestContentType = $_POST['HTTP_ACCEPT'];
                    $this ->setHttpHeaders($requestContentType, $statuscode);
                    $result["RetornoDados"] = $rawData;
    
                    if(strpos($requestContentType, 'application/json') !==false){
                        $response = $this->encodeJson($result);
                        echo $response;
                    }
                }
            }

            public function Validarusuarios(){
                if(isset($_POST["txtnomeusuario"])){
                $nome = $_POST["txtnomeusuario"];
                $senha = $_POST["txtsenhausuario"];
    
                //Informar a Stored Procedure e seus pârametros
                $query = "CALL spValidarUsuario(:pNomeUsuario,:pSenhaUsuario)";
                
    
                //Definir o conjuto de dados
                $array = array(":pNomeUsuario" =>"{$nome}",":pSenhaUsuario" => "{$senha}");
                        
                            
                            //Instanciar a classe bdturmaConect
                            $dbcontroller = new BdturmaConect();
                            //Chamar o método
                            $rawData = $dbcontroller-> executeprocedure($query,$array);
        
                        //Verificar se o retorno está vazio
                        if(empty($rawData)){
                            $statuscode = 404;
                            $rawData = array('sucesso' => 0);
                        }
                        else {
                            $statuscode = 200;
                          
                        }
        
                        $requestContentType = $_POST['HTTP_ACCEPT'];
                        $this ->setHttpHeaders($requestContentType, $statuscode);
                        $result["RetornoDados"] = $rawData;
        
                        if(strpos($requestContentType, 'application/json') !==false){
                            $response = $this->encodeJson($result);
                            echo $response;
                        }
                    }
                }

                public function DesconectarUsuario(){
                    if(isset($_POST["txtnomecompleto"])){
                    $nome = $_POST["txtnomecompleto"];
                    $email = $_POST["txtemailusuario"];
        
                    //Informar a Stored Procedure e seus pârametros
                    $query = "CALL spDesconectarUsuario(:pnomecompleto,:pemailusuario)";
                    
        
                    //Definir o conjuto de dados
                    $array = array(":pnomecompleto" =>"{$nome}",":pemailusuario" => "{$email}");
                            
                                
                                //Instanciar a classe bdturmaConect
                                $dbcontroller = new BdturmaConect();
                                //Chamar o método
                                $rawData = $dbcontroller-> executeprocedure($query,$array);
            
                            //Verificar se o retorno está vazio
                            if(empty($rawData)){
                                $statuscode = 404;
                                $rawData = array('sucesso' => 0);
                            }
                            else {
                                $statuscode = 200;
                              
                            }
            
                            $requestContentType = $_POST['HTTP_ACCEPT'];
                            $this ->setHttpHeaders($requestContentType, $statuscode);
                            $result["RetornoDados"] = $rawData;
            
                            if(strpos($requestContentType, 'application/json') !==false){
                                $response = $this->encodeJson($result);
                                echo $response;
                            }
                        }
                    }

                    public function SenhaAlterar(){
                        if(isset($_POST["txtnomeusuario"])){
                        $nome = $_POST["txtnomeusuario"];
                        $email = $_POST["txtemailusuario"];
                        $senha = $_POST["txtsenhausuario"];                
                        $nova = $_POST["txtsenhanova"];
            
                        //Informar a Stored Procedure e seus pârametros
                        $query = "CALL spSenhaNova(:pnomeusuario, :pemailusuario, :psenhausuario, :psenhanova)";
                        
            
                        //Definir o conjuto de dados
                        $array = array(":pnomeusuario" =>"{$nome}",":pemailusuario" => "{$email}",":psenhausuario" => "{$senha}",":psenhanova" => "{$nova}");
                                
                                    
                                    //Instanciar a classe bdturmaConect
                                    $dbcontroller = new BdturmaConect();
                                    //Chamar o método
                                    $rawData = $dbcontroller-> executeprocedure($query,$array);
                
                                //Verificar se o retorno está vazio
                                if(empty($rawData)){
                                    $statuscode = 404;
                                    $rawData = array('sucesso' => 0);
                                }
                                else {
                                    $statuscode = 200;
                                  
                                }
                
                                $requestContentType = $_POST['HTTP_ACCEPT'];
                                $this ->setHttpHeaders($requestContentType, $statuscode);
                                $result["RetornoDados"] = $rawData;
                
                                if(strpos($requestContentType, 'application/json') !==false){
                                    $response = $this->encodeJson($result);
                                    echo $response;
                                }
                            }
                        }
    

            public function encodeJson ($responseData){
                $jsonResponse = json_encode($responseData, JSON_UNESCAPED_UNICODE);
                return $jsonResponse;
            }
        

        }

        
        if(isset($_GET["page_key"])){
            $page_key = $_GET["page_key"];
        }
        else {
            if(isset($_POST["page_key"])){
                $page_key = $_POST["page_key"];
            }
         
        }

       

switch($page_key){

    case "Consultar":
        $usuarios = new usuariosRestHandler();
        $usuarios-> usuariosConsultar();
        break;

    case "incluir":
        $usuario = new usuariosRestHandler();
        $usuario -> usuariosIncluir();
        break;

        case "validar":
            $usuario = new usuariosRestHandler();
            $usuario -> Validarusuarios();
            break;

            case "Desconectar":
                $usuario = new usuariosRestHandler();
                $usuario -> DesconectarUsuario();
                break;

                case "Alterar":
                    $usuario = new usuariosRestHandler();
                    $usuario -> SenhaAlterar();
                    break;

}


?>