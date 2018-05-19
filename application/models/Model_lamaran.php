<?php 
	/**
	 * 
	 */
	class Model_lamaran extends ci_model
	{
		
		public function insert($data='')
		{
			$this->db->insert("lamaran",$data);
		}
		public function cek_lamaran($iduser,$idreq)
		{
			return $this->db->where("iduser",$iduser)
			->where("idrequest",$idreq)
			->get("lamaran");
		}
		public function get_byrequest($idreq)
		{
			return $this->db->where("idrequest",$idreq)->get("lamaran");
		}
		public function list_pelamar($idreq)
		{
			return $this->db->query("
				select c.*,l.idrequest from cv_pelamar c right join lamaran l on l.iduser=c.iduser where l.idrequest='".$idreq."'
			");
		}


		public function insert_interview($data)
		{
			$this->db->insert('jadwal_interview',$data);
		}
		public function update_interview($data)
		{
			$this->db->where("idlamaran",$data['idlamaran'])->update('jadwal_interview',$data);
		}
		public function update_jadwalinterview($data)
		{
			$this->db->where("idjadwal",$data['idjadwal'])->update('jadwal_interview',$data);
		}
		public function get_interview($idlamaran)
		{
			return $this->db->where("idlamaran",$idlamaran)->get("jadwal_interview");
		}
		public function jadwal_interview($iduser='')
		{
			if ($iduser!=null) {
				$add_query = "where l.iduser='".$iduser."'";
			}else{
				$add_query=' ';
			}
			

			return $this->db->query("select j.idjadwal,j.hasil, j.tanggal,u.name,r.jabatan,c.nama,c.no_telp,c.email,j.keterangan,j.keterangan_hasil  from jadwal_interview j left join lamaran l on l.idlamaran = j.idlamaran left join cv_pelamar c  on l.iduser=c.iduser left join request r on r.idreq=l.idrequest left join user u on u.iduser=r.request_by ".$add_query." order by j.tanggal desc");
		}
	}