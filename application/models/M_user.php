<?php

    class M_user extends CI_Model
    {
        public $table = 'user';

        //login
        public function checkuser($username,$password)
        {
            $query = $this->db->get_where(
                $this->table,
                array(
                    'username' => $username,
                    'password' => md5($password)
                )
            );
            if ($query->num_rows() >0) {
                return true;
            }else{
                return false;
            }
            exit;
        }

        //dapatkan data user berdasarkan username
        public function getbyusername($username)
        {
            $this->db->where('username',$username);
            return $this->db->get($this->table)->row();
        }


        //user crud
        public function get_data()
        {
            $query = $this->db->get('$this->table');
            return $query->result();
        }

        public function insert($data)
        {
            $this->db->insert('user', $data);
        }

        public function getbyid($id)
        {
            $this->db->where('id_user',$id);
            $query = $this->db->get('user');
            return $query->row();
        }

        public function update($id,$data)
        {
            $this->db->where('id_user',$id);
            $this->db->update('user',$data);
        }

        public function delete($id)
        {
            $this->db->where('id_user',$id);
            $this->db->delete('useer');
        }
    }
    
?>