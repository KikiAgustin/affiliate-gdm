<?php
class ModelAffiliateInformation extends Model {

	public function getProfile($affiliate_id){
		$query = $this->db->query("SELECT * FROM oc_affiliate WHERE affiliate_id = '$affiliate_id' ");
		return $query->row['total'];
	}

	public function getTotalTransactions() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "affiliate_transaction` WHERE affiliate_id = '" . (int)$this->affiliate->getId() . "'");

		return $query->row['total'];
	}

	public function getBalance() {
		$query = $this->db->query("SELECT SUM(amount) AS total FROM `" . DB_PREFIX . "affiliate_transaction` WHERE affiliate_id = '" . (int)$this->affiliate->getId() . "' GROUP BY affiliate_id");

		if ($query->num_rows) {
			return $query->row['total'];
		} else {
			return 0;
		}
	}
}