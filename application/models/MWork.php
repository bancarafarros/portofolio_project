<?php 

class MWork extends CI_Model {

    private $_table = "works";


    public function rules() {
        return [
            [],
        ];
    }

    private function queryDataTable($search, $start, $length) {
        $this->db->select([
            "w.id",
            "title",
            "year",
            "content",
            "featured_image",
            "created_at",
            "u.name as created_by",
            "u2.name as updated_by",
            "updated_at",
        ]);
    
        if ($search["value"] != "") {
            $this->db->or_like([
                "title"		=> $search["value"],
                "content"	=> $search["value"]
            ]);
        }
    
        $this->db->order_by("id asc");
        $this->db->join("users u", "u.id = w.created_by", "left");
        $this->db->join("users u2", "u2.id = w.updated_by", "left");
        $this->db->limit($length, $start);
        $works = $this->db->get($this->_table . " w");
        return $works;
    }
    
    public function getDataTable($search, $start, $length) {
        $works = $this->querydatatable($search, $start, $length)->result();
        return $works;
    }

    public function countTotal(){
        return $this->db->count_all($this->_table);
    }
    
    public function countFiltered($search, $start, $length){
        $works = $this->querydatatable($search, $start, $length);
        return $works->num_rows();
    }

    // public function searchAndDisplay($kataKunci = null, $start = 0, $length = 0) {
    //     $builder = $this->db->get("works w");

    //     if ($kataKunci) {
    //         $arrKataKunci = explode(" ", $kataKunci);
    //         for ($i=0; $i < count($arrKataKunci); $i++) { 
    //             $builder = $builder->orLike('title', $arrKataKunci[$i]);
    //             $builder = $builder->orLike('year', $arrKataKunci[$i]);
    //             $builder = $builder->orLike('content', $arrKataKunci[$i]);
    //         }
    //     }

    //     if ($start != 0 or $length != 0) {
    //         $builder = $builder->limit($length);
    //     }
    //     return $builder->orderBy('title');
    // }zzzzza

        // var $column_order = array('id', 'title', 'year', 'content', 'featured_image', 'created_at', 'created_by', 'updated_at', 'updated_by');
        // var $column_search = array('id', 'title', 'year', 'content', 'featured_image', 'created_at', 'created_by', 'updated_at', 'updated_by');
        // var $order = array('id' => 'asc'); // default order 

        // public function _get_datatables_query() {
        //     $this->db->select([
        //         "w.id",
        //         "w.title",
        //         "w.year",
        //         "w.content",
        //         "w.featured_image",
        //         "w.created_at",
        //         "w.updated_at",
        //         "u.name as created_by",
        //         "u2.name as updated_by"
        //     ]);
        //     $this->db->join("users u", "u.id = w.created_by", "left");
        //     $this->db->join("users u2", "u2.id = w.updated_by", "left");
        //     $i = 0;
        //     foreach ($this->column_search as $works) {
        //         if(@$_POST['search']['value']) {
        //             if($i===0) {
        //                 $this->db->group_start();
        //                 $this->db->like($works, $_POST['search']['value']);
        //             } else {
        //                 $this->db->or_like($works, $_POST['search']['value']);
        //             }
        //             if(count($this->column_search) - 1 == $i)
        //                 $this->db->group_end();
        //         }
        //         $i++;
        //     }

        //     if(isset($_POST['order'])) {
        //         $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        //     }  else if(isset($this->order)) {
        //         $order = $this->order;
        //         $this->db->order_by(key($order), $order[key($order)]);
        //     }
        // }

        // public function get_datatables() {
        //     $this->_get_datatables_query();
        //     if(@$_POST['length'] != -1)
        //     $this->db->limit(@$_POST['length'], @$_POST['start']);
        //     $query = $this->db->get();
        //     return $query->result();
        // }

        // public function count_filtered() {
        //     $this->_get_datatables_query();
        //     $query = $this->db->get();
        //     return $query->num_rows();
        // }

        // public function count_all() {
        //     $this->db->from('works');
        //     return $this->db->count_all_results();
        // }

    public function tampilData() {
        $this->db->select([
            "w.id",
            "w.title",
            "w.year",
            "w.content",
            "w.featured_image",
            "w.created_at",
            "w.updated_at",
            "u.name as created_by",
            "u2.name as updated_by"
        ]);
        $this->db->join("users u", "u.id = w.created_by", "left");
        $this->db->join("users u2", "u2.id = w.updated_by", "left");
        $tampilData = $this->db->get("works w");
        return $tampilData;
    }

    public function workPreview($id) {
        $result = $this->db->where('id', $id)->get('works');

        if ($result->num_rows() > 0) {
            return $result->result();
        
        } else {
            return false;
        }
    }

    public function fungsiTambah($data) {
        $this->db->insert('works', $data);
    }

    public function halamanUpdate($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function fungsiUpdate($id, $data) {
        $this->db->where('id', $id);
		$this->db->update('works', $data);
    }

    function fungsiDelete($id) {
		$this->db->where('id', $id);
		$this->db->delete('works');
	}

}

?>