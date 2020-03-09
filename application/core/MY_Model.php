<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

  public $table_name = '';
  public $primary_key = 'id';
  public $order_by = 'id ASC';

  public function __construct()
  {
    parent::__construct();
  }

  public function search($type='where',$conditions=NULL,$table_name=NULL,$limit=NULL,$offset=0,$order_by=NULL)
  {
    if ($table_name === NULL)
      $table_name = $this->table_name;

    if ($order_by === NULL)
      $order_by = $this->order_by;

    $conditions = $this->_filter_data($table_name,$conditions);

    if ($type === 'where')
    {
      $this->db->where($conditions);
    }

    if ($type === 'like')
    {
      $this->db->like($conditions);
    }

    return $this->db
      ->limit($limit)
      ->offset($offset)
      ->order_by($order_by)
      ->get($table_name);
  }

  public function search_id($id=NULL,$table_name=NULL)
  {
    if ($table_name === NULL)
      $table_name = $this->table_name;

    return $this->db
      ->where($this->primary_key, $id)
      ->get($table_name);
  }

  public function save($data,$table_name=NULL)
  {
    if ($table_name === NULL)
      $table_name = $this->table_name;

    $op = 'update';
    $keyExists = FALSE;
    $fields = $this->db->field_data($this->table_name);

    foreach ($fields as $field)
    {
      if ($field->primary_key==1)
      {
        $keyExists = TRUE;
        if (isset($data[$field->name]))
        {
          $this->db->where($field->name, $data[$field->name]);
        }
        else
        {
          $op = 'insert';
        }
      }
    }

    $data = $this->_filter_data($table_name, $data);
    $this->db->set($data);

    if ($keyExists && $op=='update')
    {
      $this->db->update($table_name);
    }
    else
    {
      $this->db->insert($table_name);
    }

    return $this->db->affected_rows();
  }

  public function remove($id,$table_name=NULL)
  {
    $id = intval($id);

    if ($id === NULL)
      return FALSE;

    if ($table_name === NULL)
      $table_name = $this->table_name;

    $this->db
      ->where($this->primary_key,$id)
      ->delete($table_name);

    return $this->db->affected_rows();
  }

  protected function _filter_data($table_name,$data=array())
  {
    if ($table_name === NULL)
      $table_name = $this->table_name;

    $filtered_data = array();
    $columns = $this->db->list_fields($table_name);

    if (is_array($data) && ! empty($data))
    {
      foreach ($columns as $column)
      {
        if (array_key_exists($column, $data))
        {
          $filtered_data[$column] = $data[$column];
        }
      }
    }

    return $filtered_data;
  }

}
