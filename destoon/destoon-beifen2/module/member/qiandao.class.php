<?php 
defined('IN_DESTOON') or exit('Access Denied');
class qiandao {
	var $itemid;
	var $db;
	var $table;
	var $fields;
	var $errmsg = errmsg;

    function qiandao() {
		global $db;
		$this->table = $db->pre.'qiandao';
		$this->db = &$db;
		$this->fields = array('userid','username','signdays','feeadd','areaid','ostype','note','ip','addtime');
    }

	function pass($post) {
		global $L;
		if(!is_array($post)) return false;
		if(!$post['areaid']) return $this->_($L['pass_areaid']);
		if(!$post['qiandao']) return $this->_($L['pass_qiandao']);
		if(!$post['postcode']) return $this->_($L['pass_postcode']);
		if(!$post['truename']) return $this->_($L['pass_truename']);
		if(!$post['mobile']) return $this->_($L['pass_mobile']);
		return true;
	}

	function set($post) {
		global $DT_IP, $DT_TIME, $_userid, $_username;
		$post['addtime'] = DT_TIME;
		$post['ip'] = DT_IP;
		$post = dhtmlspecialchars($post);		
		return array_map("trim", $post);
	}

	function get_one($condition = '') {
        return $this->db->get_one("SELECT * FROM {$this->table} WHERE itemid=$this->itemid $condition");
	}

	function get_list($condition = 'userid>0', $order = 'addtime DESC') {
		global $MOD, $pages, $page, $pagesize, $offset, $sum;
		if($page > 1 && $sum) {
			$items = $sum;
		} else {
			$r = $this->db->get_one("SELECT COUNT(*) AS num FROM {$this->table} WHERE $condition");
			$items = $r['num'];
		}

		$pages = pages($items, $page, $pagesize);
		if($items < 1) return array();
		$lists = array();
		$result = $this->db->query("SELECT * FROM {$this->table} WHERE $condition ORDER BY $order LIMIT $offset,$pagesize");
		while($r = $this->db->fetch_array($result)) {
			$r['adddate'] = timetodate($r['addtime'], 5);
			$lists[] = $r;
		}
		return $lists;
	}

	function add($post) {
		$post = $this->set($post);
		$sqlk = $sqlv = '';
		foreach($post as $k=>$v) {
			if(in_array($k, $this->fields)) { $sqlk .= ','.$k; $sqlv .= ",'$v'"; }
		}
        $sqlk = substr($sqlk, 1);
        $sqlv = substr($sqlv, 1);
		$this->db->query("INSERT INTO {$this->table} ($sqlk) VALUES ($sqlv)");
		$this->itemid = $this->db->insert_id();		
		return $this->itemid;
	}

	function delete($itemid, $all = true) {
		if(is_array($itemid)) {
			foreach($itemid as $v) { $this->delete($v); }
		} else {
			$this->itemid = $itemid;
			$this->db->query("DELETE FROM {$this->table} WHERE itemid=$itemid");
		}
	}

	function _($e) {
		$this->errmsg = $e;
		return false;
	}
}
?>