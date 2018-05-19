<?php 
	/**
	 * 
	 */
	class Model_request extends ci_model
	{
		
		public function insert($data)
		{
			$this->db->insert("request",$data);
		}
		public function table_request($iduser,$role)
		{

			if ($role==0 or $role==1 or $role==4) {
				return $this->db->from('request')
				->join('user','request.request_by=user.iduser','left')
				->get();
			}else{
				return $this->db->from('request')
				->join('user','request.request_by=user.iduser','left')
				->where("user.iduser",$iduser)
				->get();
			}

			
		}
		public function table_loker($iduser,$role)
		{

			if ($role==0 or $role==1) {
				return $this->db->from('request')
				->select("request.*,user.name,(select count(idlamaran) from lamaran l where request.idreq=l.idrequest) as lamaran")
				->join('user','request.request_by=user.iduser','left')
				->where("request.status",1)
				->order_by("lamaran",'desc')
				->get();
			}else{
				return $this->db->from('request')
				->select("request.*,user.name,(select count(idlamaran) from lamaran l where request.idreq=l.idrequest) as lamaran")
				->join('user','request.request_by=user.iduser','left')
				->where("request.status",1)
				->where("user.iduser",$iduser)
				->order_by("lamaran",'desc')
				->get();
			}

			
		}
		public function update($data)
		{
			$this->db->where("idreq",$data['idreq'])->update("request",$data);
		}
		public function get($field,$value)
		{
			return $this->db->from('request')
				->join('user','request.request_by=user.iduser','left')
				->where("request.".$field,$value)
				// ->where("status!=","3")
				->get();
		}
		public function lowongan($iduser='')
		{
			return $this->db->query(
				"select r.*,u.name,(select l.status from lamaran l where l.iduser='".$iduser."' and l.idrequest = r.idreq ) as lamaran from request r left join user u on u.iduser = r.request_by where r.status=1;
"
			);
		}
		public function lowongan_detail($iduser='',$idrequest)
		{
			return $this->db->query(
				"select r.*,u.name,(select l.status from lamaran l where l.iduser='".$iduser."' and l.idrequest = r.idreq ) as lamaran from request r left join user u on u.iduser = r.request_by where r.idreq='".$idrequest."'"
			);
		}
	}