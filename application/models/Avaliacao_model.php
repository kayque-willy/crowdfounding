<?php
class Avaliacao_model extends CI_Model{
 
  public $id;
  public $codigoAvaliador;
  public $codigoProjeto;
  public $nomeAvaliador;
  public $data;
  public $nota;
 
  #constroi o objeto
  public function __construct($id='', $nota='', $codigoAvaliador='',$codigoProjeto='',$nomeAvaliador='',$data=''){
     if(isset($id)) $this->id=$id;
     if(isset($codigoAvaliador)) $this->codigoAvaliador=$codigoAvaliador;
     if(isset($codigoProjeto)) $this->codigoProjeto=$codigoProjeto;
     if(isset($nomeAvaliador)) $this->nomeAvaliador=$nomeAvaliador;
     if(isset($data)) $this->data=$data;
     if(isset($nota)) $this->nota=$nota;
  }
  
 #insere um novo registro no banco
  public function insert(){
    //Cria um vetor de valores para atualização
     $data = []; 
     if(isset($this->codigoAvaliador)) $data['codAvaliador'] = $this->codigoAvaliador;
     if(isset($this->codigoProjeto)) $data['codProjeto'] = $this->codigoProjeto;
     if(isset($this->nomeAvaliador)) $data['nomeAvaliador'] = $this->nomeAvaliador;
     if(isset($this->data)) $data['data'] = $this->data;
     return $this->db->insert('avaliacao',$data);
  }
  
  #Remove um objeto de acordo com o nome
  public function remove() {
    $data = [];
    if(isset($this->id)) $data['id'] = $this->id;
    return $this->db->delete('avaliacao',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($id='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->codigoAvaliador)) $data['codigoAvaliador'] = $this->codigoAvaliador;
     if(isset($this->codigoProjeto)) $data['codigoProjeto'] = $this->codigoProjeto;
     if(isset($this->codAvaliador)) $data['codAvaliador'] = $this->codAvaliador;
     if(isset($this->nomeAvaliador)) $data['nomeAvaliador'] = $this->nomeAvaliador;
     if(isset($this->data)) $data['data'] = $this->data;
     if(isset($this->nota)) $data['nota'] = $this->nota;
     
     //Cria um vetor com a chave primária 
     $where['id']=$id;
     
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('avaliacao',$data,$where);
  }
  
  #Retorna o objeto
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['codigo_projeto'])) $this->db->where('avaliacao.codProjeto', $filtro['codigo_projeto']);
   if(!empty($filtro['nome_projeto'])) $this->db->where('projeto.nome', $filtro['nome_projeto']);
   if(!empty($filtro['categoria_projeto'])) $this->db->where('projeto.categoria', $filtro['categoria_projeto']);
   
   //Consultar inner join
   $this->db->select('avaliacao.codProjeto as codProjeto, avaliacao.id as id, avaliacao.codAvaliador as codAvaliador, avaliacao.nomeAvaliador as nomeAvaliador, avaliacao.nota as nota, projeto.nome as projetoNome, projeto.categoria as projetoCategoria');    
   $this->db->from('avaliacao');
   $this->db->join('projeto', 'avaliacao.codProjeto = projeto.codigo','inner');
   return $this->db->get();
  }
}
