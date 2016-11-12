<?php
class Financiamento_model extends CI_Model{
 
  public $id;
  public $tipo;
  public $quantidadeModulos;
  public $valor;
  public $formaPagamento;
  public $codProjeto;
  public $data;
    
  #Constroi o objeto
  public function __construct($id='',$tipo='',$quantidadeModulos='',$valor='',$formaPagamento='',$codProjeto='',$data=''){
     if(isset($id)) $this->id=$id;
     if(isset($tipo)) $this->tipo=$tipo;
     if(isset($quantidadeModulos)) $this->quantidadeModulos=$quantidadeModulos;
     if(isset($valor)) $this->valor=$valor;
     if(isset($formaPagamento)) $this->formaPagamento=$formaPagamento;
     if(isset($codProjeto)) $this->codProjeto=$codProjeto;
     if(isset($data)) $this->data=$data;
  }
  
  #Insere um novo registro no banco
  public function insert(){
     //Cria um vetor de valores para atualização
     $data = []; 
     if(isset($this->tipo)) $data['tipo'] = $this->tipo;
     if(isset($this->quantidadeModulos)) $data['quantidadeModulos'] = $this->quantidadeModulos;
     if(isset($this->valor)) $data['valor'] = $this->valor;
     if(isset($this->formaPagamento)) $data['formaPagamento'] = $this->formaPagamento;
     if(isset($this->codProjeto)) $data['codProjeto'] = $this->codProjeto;
     if(isset($this->data)) $data['data'] = $this->data;
     return $this->db->insert('financiamento',$data);
  }
  
  #Remove um objeto de acordo com o nome
  public function remove () {
    $data = [];
    if(isset($this->id)) $data['id'] = $this->id;
    return $this->db->delete('financiamento',$data);
  }
 
  #Atualiza o objeto a partir da chave primaria
  public function update ($id='') {
     //Cria um vetor de valores para atualização
     $data = [];
     if(isset($this->tipo)) $data['tipo'] = $this->tipo;
     if(isset($this->quantidadeModulos)) $data['quantidadeModulos'] = $this->quantidadeModulos;
     if(isset($this->valor)) $data['valor'] = $this->valor;
     if(isset($this->formaPagamento)) $data['formaPagamento'] = $this->formaPagamento;
     if(isset($this->codProjeto)) $data['codProjeto'] = $this->codProjeto;
     if(isset($this->data)) $data['data'] = $this->data;
     //Cria um vetor com a chave primária 
     $where['id']=$id;
     //$this->db->update(nome da tabela,valores de atualização,referência)
     return $this->db->update('financiamento',$data,$where);
  }
  
  #Retorna o objeto
  public function select($filtro='') {
   //Adiciona clausula where
   if(!empty($filtro['codProjeto'])) $this->db->where('codProjeto', $filtro['codProjeto']);
   if(!empty($filtro['tipo'])) $this->db->where('tipo', $filtro['tipo']);
   if(!empty($filtro['formaPagamento'])) $this->db->where('formaPagamento', $filtro['formaPagamento']);
   if(!empty($filtro['data'])) $this->db->where('data', $filtro['data']);
   //Consulta
   $this->db->select('*');    
   $this->db->from('financiamento');
   return $this->db->get();
  }
  
  #Relatório de financiamento dos Projetos por categoria
  public function relatorio($filtro='') {
   //Adiciona clausula where
   //if(!empty($filtro['data_inicial'])) $this->db->where('.', $filtro['']);
   //if(!empty($filtro['data_final'])) $this->db->where('.', $filtro['']);
   if(!empty($filtro['categoria_projeto'])) $this->db->where('projeto.categoria', $filtro['categoria_projeto']);
   
   //Consultar inner join
   $this->db->select('projeto.codigo as codigo, projeto.nome as nome, sum(financiamento.valor) as total');    
   $this->db->from('financiamento');
   $this->db->join('projeto', 'financiamento.codProjeto = projeto.codigo','inner');
   $this->db->group_by('projeto.codigo');
   $this->db->get();
   
   var_dump($this->db->last_query());
  }
  
}