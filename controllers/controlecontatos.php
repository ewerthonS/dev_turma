<?php


//Não apresentar tela com erros
//init_set('display_errors', '0');
require_once("../databases/bdturmaConect.php");
require_once("../config/SimpleRest.php");


$page_key="";

class ContatosRestHandler extends SimpleRest{
    public function ContatosIncluir(){

    if(isset($_POST["txtnome"])){
$nome = $_POST["txtnome"];
$email = $_POST["txtemail"];
$fone = $_POST["txtfone"];
$endereco = $_POST["txtendereco"];
$bairro = $_POST["txtbairro"];
$cidade = $_POST["txtcidade"];
$uf = $_POST["txtuf"];
$cep = $_POST["txtcep"];


$query="SELECT codContato from tbcontatos ORDER by codcontato desc LIMIT 1";

  //Instanciar a classe bdturmaConect

  $dbcontroller = new BdturmaConect();

  //Chamar o método

  $codigo = $dbcontroller-> executeBuscaCodigoQuery($query);

                //Definir as instruções SQL -- só tem aspas simples o que é texto número não precisa
                $query = "INSERT INTO tbContatos (codContato, 
                 nomedoContato,
                 enderecoContato, 
                 telefoneContato, 
                 bairro,
                 cidade,
                 uf,
                 cep,
                 emailContato)
                    
                    VALUES ({$codigo},
                    '{$nome}',
                    '{$endereco}',
                    '{$fone}',
                    '{$bairro}',
                    '{$cidade}',
                    '{$uf}',
                    '{$cep}',
                    '{$email}')";
                    
                    //Instanciar a classe bdturmaConect
                    $dbcontroller = new bdturmaConect ();
                    //Chamar o método
                    $rawData = $dbcontroller-> executeQuery($query);

                //Verificar se o retorno está vazio
                if(empty($rawData)){
                    $statuscode = 404;
                    $rawData = array('sucesso'=> 0);
                }

                else{
                    $statuscode = 200;
                    $rawData = array('sucesso' => 1);
                }

                $requestContentType = $_POST['HTTP_ACCEPT'];
                $this ->setHttpHeaders($requestContentType, $statuscode);
                $result["RetornoDados"] = $rawData;

                if(strpos($requestContentType,'application/json') !== false){
                    $response = $this->encodeJson($result);
                    echo $response;
                }

            }
        }

        public function ContatosConsultar(){

            if(isset($_POST["txtnome"])){
    $nome = $_POST["txtnome"];
   
                //Informar a stored procedure e seus parâmetros
    $query = "CALL spConsultarContatos(:pnome)";

    //Definir o conjunto de dados
    $array = array(":pnome" =>"{$nome}");

    
                        
                        //Instanciar a classe bdturmaConect
                        $dbcontroller = new bdturmaConect ();
                        //Chamar o método
                        $rawData = $dbcontroller-> executeprocedure($query,$array);
    
                    //Verificar se o retorno está vazio
                    if(empty($rawData)){
                        $statuscode = 404;
                        $rawData = array('sucesso'=> 0);
                    }
    
                    else{
                        $statuscode = 200;
                       
                    }
    
                    $requestContentType = $_POST['HTTP_ACCEPT'];
                    $this ->setHttpHeaders($requestContentType, $statuscode);
                    $result["RetornoDados"] = $rawData;
    
                    if(strpos($requestContentType,'application/json') !== false){
                        $response = $this->encodeJson($result);
                        // $this->mostrarContatos($response);
                        echo $response;
                    }
    
                }
            }


                public function encodeJson($responseData){
                    $jsonResponse = json_encode($responseData, JSON_UNESCAPED_UNICODE);
                    return $jsonResponse;
                }

                public function mostrarContatos($jsonObj){

                    $strLista = "<table border=1><tbody>" ."\n" ."<tr><th>Nome</th><th>Bairro</th></tr>" ."\n";
                    // $strLista .= "\n" ;

                    //receber os dados em json
                    $dados = json_decode($jsonObj);

                    //percorrer os dados, tendo como base o retornodados
                    foreach ($dados->RetornoDados as $lista){
                        
                        $strLista .= "<tr>"."<td>".$lista->nomedoContato. "</td>"."<td>". $lista->bairro."</td>"."</tr>";
                        $strLista .= "</tbody></table>";
                    }
                    echo  $strLista;
                }

        }



        if(isset($_GET["page_key"])){
            $page_key = $_GET["page_key"];
        }
        else{
            if(isset($_POST["page_key"])){
                $page_key = $_POST["page_key"];
            }
        }

        if (isset($_POST["btnenviar"])){
            $page_key = "Incluir";
            $_POST['HTTP_ACCEPT'] = 'application/json';
        }


        if (isset($_POST["btnlistar"])){
            $page_key = "Consultar";
            $_POST['HTTP_ACCEPT'] = 'application/json';
        }

        switch($page_key){

            case "Consultar":
                $contatos = new ContatosRestHandler();
                $contatos -> ContatosConsultar();
                break;

                case "Incluir":
                    $contatos = new ContatosRestHandler();
                    $contatos -> ContatosIncluir();
                    break;


        }
         

?>