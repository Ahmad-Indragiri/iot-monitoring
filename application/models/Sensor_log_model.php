<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sensor_log_model extends CI_Model {

    private $table = 'sensor_log';

    public function get_all() {
        $this->db->select('sensor_log.*, device.nama_device, user.nama_user');
        $this->db->from($this->table);
        $this->db->join('device', 'sensor_log.id_device = device.id');
        $this->db->join('user', 'sensor_log.id_user = user.id', 'left');
        $this->db->order_by('sensor_log.waktu_log', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function count_all() {
        return $this->db->count_all($this->table);
    }
    
}
