{"changed":true,"filter":false,"title":"Projeto.php","tooltip":"/application/controllers/Projeto.php","value":"<?php\ndefined('BASEPATH') OR exit('No direct script access allowed');\n\nclass Projeto extends CI_Controller {\n\n\t#Index do controller\n\tpublic function index() {\n\t   \t\n\t   \t//Recebe o filtro\n\t\t$filtro['codigo'] = (empty($_GET['codigo'])) ? '' : $_GET['codigo'];\n\t\t$filtro['nome'] = (empty($_GET['nome'])) ? '' : $_GET['nome'];\n\t\t$filtro['categoria'] = (empty($_GET['categoria'])) ? '' : $_GET['categoria'];\n\t\t$filtro['status'] = 'aprovado';\n\t   \t\n\t\t//Carrega a model\n\t\t$this->load->model('projeto_model');\n\t\t\t\n\t\t//Cria um novo objeto projeto\n\t\t$projeto = new Projeto_model();\n\t\t\n\t\t//$consulta o projeto\n\t\t$data['projetos']=$projeto->select($filtro);\n\t\t\n\t   //Carrega a view da index do projeto\n\t   $this->load->view('CRUD_projeto/indexPROJETO_fim',$data); \n\t }\n\t\n\t#Cria um novo projeto\n\tpublic function cadastrar(){\n\t\t\n\t\tif(!empty($_POST)){\n\t\t\t\n\t\t\t//Recebe os dados do formulario\n\t\t\t$nome = (empty($_POST['nome'])) ? '' : $_POST['nome'];\n\t\t\t$descricao = (empty($_POST['descricao'])) ? '' : $_POST['descricao'];\n\t\t\t$categoria = (empty($_POST['categoria'])) ? '' : $_POST['categoria'];\n\t\t\t$duracao = (empty($_POST['duracao'])) ? '' : $_POST['duracao'];\n\t\t\t$valor = (empty($_POST['valor'])) ? '' : $_POST['valor'];\n\t\t\t$video = (empty($_POST['video'])) ? '' : $_POST['video'];\n\t\t\t$status = 'candidato';\n\t\t\t\n\t\t\t//Tratamento para salvar a imagem\n\t\t\t$imagem=null;\n\t\t\t//Se tiver imagem, realiza o upload\n\t\t\tif(!empty($_FILES[\"imagem\"]['tmp_name'])) { \n\t\t\t\t$config['upload_path'] = './temp/';\n\t\t\t\t$config['allowed_types'] = 'gif|jpg|png';\n\t\t\t\t$config['overwrite']=TRUE;\n\t\t\t\t$config['max_size']  = '10048000';\n\t\t\t\t$config['max_width'] = '10000';\n\t\t\t\t$config['max_height'] = '10000';\n\t\t\t\t$this->load->library('upload', $config);\n\t\t\t\t$this->upload->do_upload('imagem');\n\t\t\t\t$imagem=$this->upload->data();\n\t\t\t} \n\t\t\t\n\t\t\t//Carrega a model\n\t\t\t$this->load->model('projeto_model');\n\t\t\n\t\t\t//Cria um novo projeto com os dados do POST\n\t\t\t$projeto = new Projeto_model(null,$nome,$categoria,$duracao,$valor,$status,$descricao,$video,$imagem);\n\t\t\t\n\t\t\t//Insere o projeto no banco\n\t\t\tif($projeto->insert()){\n\t\t\t\t//Limpa a imagem temporaria\n\t\t\t\tif(!empty($imagem)) unlink($imagem['full_path']);\n\t\t\t\t\n\t\t\t\t//Se a operação for bem sucedida, redireciona com mensagem de sucesso\n\t\t\t\tredirect('/projeto/consultar/cad_sucesso', 'refresh');\n\t\t\t}else{\n\t\t\t\t//Limpa a imagem temporaria\n\t\t\t\tif(!empty($imagem)) unlink($imagem['full_path']);\n\t\t\t\t\n\t\t\t\t//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha\n\t\t\t\tredirect('/projeto/consultar/cad_falha', 'refresh');\n\t\t\t}\n\t\t}\n\t\t\n\t\t//Carrega a view \n\t\t$this->load->view('CRUD_projeto/addPROJETO'); \t\n\t}\n\t\n\t#Lista os projetos candidatos\n\tpublic function consultar($result=''){\n\t\t\n\t\t//Mensagem de resultado de alguma operação\n\t\tif(isset($result)){\n\t\t\tswitch ($result){\n\t\t\t\tcase 'cad_sucesso': \n\t\t\t\t\t$data['sucesso']=true;\n\t\t\t\t\t$data['msg'] = 'Projeto cadastrado com sucesso!';\n\t\t\t\t\tbreak;\n\t\t\t\tcase 'cad_falha': \n\t\t\t\t\t$data['falha']=true;\n\t\t\t\t\t$data['msg'] = 'Falha ao cadastrar o projeto!';\n\t\t\t\t\tbreak;\n\t\t\t\tcase 'alt_sucesso':\n\t\t\t\t\t$data['sucesso']=true;\n\t\t\t\t\t$data['msg'] = 'Projeto atualizado com sucesso!';\n\t\t\t\t\tbreak;\n\t\t\t\tcase 'alt_falha': \n\t\t\t\t\t$data['falha']=true;\n\t\t\t\t\t$data['msg'] = 'Falha ao atualizar o projeto!';\n\t\t\t\t\tbreak;\n\t\t\t\tcase 'des_sucesso':\n\t\t\t\t\t$data['sucesso']=true;\n\t\t\t\t\t$data['msg'] = 'Projeto desativado com sucesso!';\n\t\t\t\t\tbreak;\n\t\t\t\tcase 'des_falha':\n\t\t\t\t\t$data['falha']=true;\n\t\t\t\t\t$data['msg'] = 'Falha ao remover o projeto!';\n\t\t\t\t\tbreak;\n\t\t\t}\n\t\t}\n\t\t\n\t\t//Recebe o filtro\n\t\t$filtro['codigo'] = (empty($_GET['codigo'])) ? '' : $_GET['codigo'];\n\t\t$filtro['nome'] = (empty($_GET['nome'])) ? '' : $_GET['nome'];\n\t\t$filtro['categoria'] = (empty($_GET['categoria'])) ? '' : $_GET['categoria'];\n\t\t$filtro['status'] = 'candidato';\n\t\t\t\t\n\t\t//Carrega a model\n\t\t$this->load->model('projeto_model');\n\t\t\t\n\t\t//Cria um novo objeto projeto\n\t\t$projeto = new Projeto_model();\n\t\t\n\t\t//$consulta o projeto\n\t\t$data['projetos']=$projeto->select($filtro);\n\t\t\n\t\t//Carrega a view \n\t\t$this->load->view('CRUD_projeto/viewPROJETO',$data); \n\t}\n\t\n\t#Altera o projeto\n\tpublic function alterar($cod=''){\n\t\t//Recebe os dados do formulario para atualização\n\t\tif(!empty($_POST)){\n\t\t\t$codigo = (empty($_POST['codigo'])) ? '' : $_POST['codigo'];\n\t\t\t$nome = (empty($_POST['nome'])) ? '' : $_POST['nome'];\n\t\t\t$descricao = (empty($_POST['descricao'])) ? '' : $_POST['descricao'];\n\t\t\t$categoria = (empty($_POST['categoria'])) ? '' : $_POST['categoria'];\n\t\t\t$duracao = (empty($_POST['duracao'])) ? '' : $_POST['duracao'];\n\t\t\t$valor = (empty($_POST['valor'])) ? '' : $_POST['valor'];\n\t\t\t$video = (empty($_POST['video'])) ? '' : $_POST['video'];\n\t\t\t$status = (empty($_POST['status'])) ? null : $_POST['status'];\n\t\t\t\n\t\t\t//Tratamento para salvar a imagem\n\t\t\t$imagem=null;\n\t\t\t//Se tiver imagem, realiza o upload\n\t\t\tif(!empty($_FILES[\"imagem\"]['tmp_name'])) { \n\t\t\t\t$config['upload_path'] = './temp/';\n\t\t\t\t$config['allowed_types'] = 'gif|jpg|png';\n\t\t\t\t$config['overwrite']=TRUE;\n\t\t\t\t$config['max_size']  = '10048000';\n\t\t\t\t//$config['max_width'] = '1024';\n\t\t\t\t//$config['max_height'] = '768';\n\t\t\t\t$this->load->library('upload', $config);\n\t\t\t\t$this->upload->do_upload('imagem');\n\t\t\t\t$imagem=$this->upload->data();\n\t\t\t} \n\t\t\t\n\t\t\t//Carrega a model\n\t\t\t$this->load->model('projeto_model');\n\t\t\t\t\n\t\t\t//Cria um novo projeto com os dados do POST\n\t\t\t$projeto = new Projeto_model(NULL,$nome,$categoria,$duracao,$valor,$status,$descricao,$video,$imagem);\n\t\t\t\n\t\t\t//Atualiza o projeto no banco\n\t\t\tif($projeto->update($codigo)){\n\t\t\t\t//Se a operação for bem sucedida, redireciona com mensagem de sucesso\n\t\t\t\tredirect('/projeto/consultar/alt_sucesso', 'refresh');\n\t\t\t}else{\n\t\t\t\t//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha\n\t\t\t\tredirect('/projeto/consultar/alt_falha', 'refresh');\n\t\t\t}\n\t\t}\n\t\t\n\t\t//Recupera os dados\n\t\tif(!empty($cod)){\n\t\t\t$filtro['codigo']=$cod;\n\t\t\t\n\t\t\t//Carrega a model\n\t\t\t$this->load->model('projeto_model');\n\t\t\t\t\n\t\t\t//Cria um novo objeto projeto\n\t\t\t$projeto = new Projeto_model();\n\t\t\t\n\t\t\t//consulta o projeto pelo codigo\n\t\t\t$data['projeto']=$projeto->select($filtro);\n\t\t\t\n\t\t\t//Carrega a view \n\t\t\t$this->load->view('CRUD_projeto/editPROJETO',$data); \n\t\t}else{\n\t\t\t//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha\n\t\t\tredirect('/projeto/consultar/alt_falha', 'refresh');\n\t\t}\n\t\t\n\t}\n\t\n\t#Deletea o projeto \n\tpublic function remover($cod=''){\n\t\t\n\t\t//Recebe os dados do formulario\n\t\t$codigo = (empty($cod)) ? '' : $cod;\n\t\t\n\t\t//Carrega a model\n\t\t$this->load->model('projeto_model');\n\t\t\t\n\t\t//Cria um novo objeto projeto\n\t\t$projeto = new Projeto_model($codigo);\n\t\t\n\t\t//Remove o projeto do banco\n\t\tif($projeto->remove($codigo)){\n\t\t\t//Se a operação for bem sucedida, redireciona com mensagem de sucesso\n\t\t\tredirect('/projeto/consultar/des_sucesso', 'refresh');\n\t\t}else{\n\t\t\t//Se a operação não for bem sucedida, redireciona a consulta com mensagem de falha\n\t\t\tredirect('/projeto/consultar/des_falha', 'refresh');\n\t\t}\n\t}\n\n\t#Visaliza o projeto individudal\n\tpublic function ver_projeto($codigo=''){\n\t\t//Recebe o código\n\t\t$filtro['codigo']=$codigo;\n\t\t\n\t\t//Carrega a model\n\t\t$this->load->model('projeto_model');\n\t\t\t\n\t\t//Cria um novo objeto projeto\n\t\t$projeto = new Projeto_model();\n\t\t\n\t\t//$consulta o projeto\n\t\t$data['projetos']=$projeto->select($filtro);\n\t\t\n\t\t//Carrega a view \n\t\t$this->load->view('CRUD_projeto/readPROJETO',$data); \n\t}\n\t\n\t#Visaliza o projeto aprovado\n\tpublic function projeto_aprovado($codigo=''){\n\t\t//Recebe o código\n\t\t$filtro['codigo']=$codigo;\n\t\t\n\t\t//Carrega a model\n\t\t$this->load->model('projeto_model');\n\t\t\t\n\t\t//Cria um novo objeto projeto\n\t\t$projeto = new Projeto_model();\n\t\t\n\t\t//$consulta o projeto\n\t\t$data['projetos']=$projeto->select($filtro);\n\t\t\n\t\t//Carrega a view \n\t\t$this->load->view('CRUD_projeto/read_aprovPROJETO',$data); \n\t}\n\t\n}","undoManager":{"mark":37,"position":38,"stack":[[{"start":{"row":238,"column":2},"end":{"row":239,"column":0},"action":"insert","lines":["",""],"id":68},{"start":{"row":239,"column":0},"end":{"row":239,"column":1},"action":"insert","lines":["\t"]}],[{"start":{"row":239,"column":1},"end":{"row":240,"column":0},"action":"insert","lines":["",""],"id":69},{"start":{"row":240,"column":0},"end":{"row":240,"column":1},"action":"insert","lines":["\t"]}],[{"start":{"row":240,"column":1},"end":{"row":256,"column":2},"action":"insert","lines":["\t#Visaliza o projeto individudal","\tpublic function ver_projeto($codigo=''){","\t\t//Recebe o código","\t\t$filtro['codigo']=$codigo;","\t\t","\t\t//Carrega a model","\t\t$this->load->model('projeto_model');","\t\t\t","\t\t//Cria um novo objeto projeto","\t\t$projeto = new Projeto_model();","\t\t","\t\t//$consulta o projeto","\t\t$data['projetos']=$projeto->select($filtro);","\t\t","\t\t//Carrega a view ","\t\t$this->load->view('CRUD_projeto/readPROJETO',$data); ","\t}"],"id":70}],[{"start":{"row":240,"column":1},"end":{"row":240,"column":2},"action":"remove","lines":["\t"],"id":71}],[{"start":{"row":240,"column":21},"end":{"row":240,"column":22},"action":"insert","lines":["a"],"id":72}],[{"start":{"row":240,"column":22},"end":{"row":240,"column":23},"action":"insert","lines":["p"],"id":73}],[{"start":{"row":240,"column":23},"end":{"row":240,"column":24},"action":"insert","lines":["r"],"id":74}],[{"start":{"row":240,"column":24},"end":{"row":240,"column":25},"action":"insert","lines":["o"],"id":75}],[{"start":{"row":240,"column":25},"end":{"row":240,"column":26},"action":"insert","lines":["v"],"id":76}],[{"start":{"row":240,"column":26},"end":{"row":240,"column":27},"action":"insert","lines":["a"],"id":77}],[{"start":{"row":240,"column":27},"end":{"row":240,"column":28},"action":"insert","lines":["d"],"id":78}],[{"start":{"row":240,"column":28},"end":{"row":240,"column":29},"action":"insert","lines":["o"],"id":79}],[{"start":{"row":240,"column":29},"end":{"row":240,"column":30},"action":"insert","lines":[" "],"id":80}],[{"start":{"row":240,"column":29},"end":{"row":240,"column":41},"action":"remove","lines":[" individudal"],"id":81}],[{"start":{"row":241,"column":17},"end":{"row":241,"column":28},"action":"remove","lines":["ver_projeto"],"id":82},{"start":{"row":241,"column":17},"end":{"row":241,"column":18},"action":"insert","lines":["p"]}],[{"start":{"row":241,"column":18},"end":{"row":241,"column":19},"action":"insert","lines":["r"],"id":83}],[{"start":{"row":241,"column":19},"end":{"row":241,"column":20},"action":"insert","lines":["o"],"id":84}],[{"start":{"row":241,"column":20},"end":{"row":241,"column":21},"action":"insert","lines":["j"],"id":85}],[{"start":{"row":241,"column":21},"end":{"row":241,"column":22},"action":"insert","lines":["e"],"id":86}],[{"start":{"row":241,"column":22},"end":{"row":241,"column":23},"action":"insert","lines":["t"],"id":87}],[{"start":{"row":241,"column":23},"end":{"row":241,"column":24},"action":"insert","lines":["o"],"id":88}],[{"start":{"row":241,"column":24},"end":{"row":241,"column":25},"action":"insert","lines":["_"],"id":89}],[{"start":{"row":241,"column":25},"end":{"row":241,"column":26},"action":"insert","lines":["a"],"id":90}],[{"start":{"row":241,"column":26},"end":{"row":241,"column":27},"action":"insert","lines":["p"],"id":91}],[{"start":{"row":241,"column":27},"end":{"row":241,"column":28},"action":"insert","lines":["r"],"id":92}],[{"start":{"row":241,"column":28},"end":{"row":241,"column":29},"action":"insert","lines":["o"],"id":93}],[{"start":{"row":241,"column":29},"end":{"row":241,"column":30},"action":"insert","lines":["v"],"id":94}],[{"start":{"row":241,"column":30},"end":{"row":241,"column":31},"action":"insert","lines":["a"],"id":95}],[{"start":{"row":241,"column":31},"end":{"row":241,"column":32},"action":"insert","lines":["d"],"id":96}],[{"start":{"row":241,"column":32},"end":{"row":241,"column":33},"action":"insert","lines":["o"],"id":97}],[{"start":{"row":255,"column":38},"end":{"row":255,"column":39},"action":"insert","lines":["_"],"id":98}],[{"start":{"row":255,"column":39},"end":{"row":255,"column":40},"action":"insert","lines":["a"],"id":99}],[{"start":{"row":255,"column":40},"end":{"row":255,"column":41},"action":"insert","lines":["p"],"id":100}],[{"start":{"row":255,"column":41},"end":{"row":255,"column":42},"action":"insert","lines":["r"],"id":101}],[{"start":{"row":255,"column":42},"end":{"row":255,"column":43},"action":"insert","lines":["o"],"id":102}],[{"start":{"row":255,"column":43},"end":{"row":255,"column":44},"action":"insert","lines":["v"],"id":103}],[{"start":{"row":255,"column":43},"end":{"row":255,"column":44},"action":"remove","lines":["v"],"id":104}],[{"start":{"row":255,"column":43},"end":{"row":255,"column":44},"action":"insert","lines":["v"],"id":105}],[{"start":{"row":256,"column":2},"end":{"row":257,"column":0},"action":"insert","lines":["",""],"id":106},{"start":{"row":257,"column":0},"end":{"row":257,"column":1},"action":"insert","lines":["\t"]}]]},"ace":{"folds":[{"start":{"row":28,"column":29},"end":{"row":80,"column":1},"placeholder":"..."},{"start":{"row":83,"column":39},"end":{"row":132,"column":1},"placeholder":"..."},{"start":{"row":201,"column":34},"end":{"row":220,"column":1},"placeholder":"..."},{"start":{"row":223,"column":41},"end":{"row":238,"column":1},"placeholder":"..."}],"scrolltop":407,"scrollleft":0,"selection":{"start":{"row":257,"column":1},"end":{"row":257,"column":1},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":26,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1478464788235}