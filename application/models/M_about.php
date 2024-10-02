<?php
class M_about extends CI_Model {

    public function get_about_content() {
        $this->db->limit(1); // Limit to the latest entry
        $query = $this->db->get('tbl_about');
        return $query->row(); // Return the result as an object
    }
}
?>
