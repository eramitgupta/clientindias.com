<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Curd_model extends CI_Model
{

    public function getByUsername($username)
    {
        $where = "username = '$username' AND status='Active' OR mobile = '$username' OR email = '$username'";
        return  $this->db->where($where)->get('tbl_login')->row();
    }

    public function authLogin($user_id, $role)
    {
        $array = $this->db->where(['id' => $user_id, 'role' => $role, 'status'=> 'Active'])->get('tbl_login')->row_array();
        if ($role == $array['role']) {
            return $array;
        }
    }

    public function loginCheck($id)
    {
        $where = "id = '$id' And role = 'admin' AND status='Active'";
        return  $this->db->where($where)->get('tbl_login')->row_array();
    }

    public function getAccounts($id)
    {
        return  $this->db->where('id', $id)->get('tbl_login')->row_array();
    }

    public function loginGet()
    {
        return $data = $this->db->where(['role' => 'admin'])->get('tbl_login')->result_array();
    }


    public function insertLastId($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function Select($table, $array = '', $limit = '')
    {
        if (!empty($array)) {
            $this->db->where($array);
        }

        if (!empty($limit)) {
            $this->db->limit($limit);
        }

        $query = $this->db->get($table);
        return $query->result_array();
        // $this->db->last_query();

    }
    public function LastRecord($table)
    {
        return $this->db->select('ref_code')->order_by('id',"desc")->limit(1)->where(['role'=>'user'])->get($table)->result_array();
    }

    public function AdminData($table)
    {
        $this->db->where_not_in('role', 'user');
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function update($table, $where, $array)
    {
        $this->db->where($where);
        return $this->db->update($table, $array);
    }

    function walletUpdate($id, $money, $condition ='+')
    {
        return $this->db->set("wallet_money", "wallet_money$condition" . $money, FALSE)
            ->where('id', $id)
            ->update('tbl_login');
    }

    public function Delete($table, $data)
    {
        $this->db->where($data);
        return $this->db->delete($table);
    }


    public function SelectDataJoin($table, $array = '')
    {
        // 'tbl_login', 'tbl_create_ride.user_id = tbl_login.id'
        $this->db->select('' . $table['select'] . '');
        $this->db->from($table['from']);
        $this->db->join('' . $table['join1'] . '', '' . $table['join2'] . '');

        if (!empty($array)) {
            $this->db->where($array);
        }
        return $this->db->get()->result_array();
    }

    public function Payinfo()
    {
        return $this->db->select('tbl_payment.*,tbl_payment.id as pay_id, tbl_payment.status as pay_status, tbl_payment.status_pay as p_r_status, tbl_payment.date as pay_date, tbl_payment.price as pay_price , tbl_category.*,tbl_category.id as category_id , tbl_category.name as category_name , tbl_category.price as category_price, tbl_category.commission as category_commission, tbl_login.id,tbl_login.name,tbl_login.ref_code,tbl_login.referral_code, tbl_login.id as Login_id, tbl_login.name as Login_name')
            ->from('tbl_payment')
            ->join('tbl_login', 'tbl_payment.user_id = tbl_login.id')
            ->join('tbl_category', 'tbl_payment.course_id = tbl_category.id')
            ->get()
            ->result_array();
    }

    public function PayinfoUser($array)
    {
        return $this->db->select('tbl_payment.*,tbl_payment.id as pay_id, tbl_payment.status as pay_status, tbl_payment.date as pay_date , tbl_category.*,tbl_category.id as category_id , tbl_category.name as category_name , tbl_category.price as category_price, tbl_category.commission as category_commission, tbl_login.id,tbl_login.name,tbl_login.ref_code,tbl_login.referral_code, tbl_login.id as Login_id, tbl_login.name as Login_name')
            ->from('tbl_payment')
            ->join('tbl_login', 'tbl_payment.user_id = tbl_login.id')
            ->join('tbl_category', 'tbl_payment.course_id = tbl_category.id')
            ->where($array)
            ->get()
            ->result_array();
    }


    public function CountsData($table, $array)
    {
        return $this->db->where($array)->count_all_results($table);
    }

    public function CalculatData($condition, $table, $where = '',  $day = '')
    {
        if ($condition === 'day') {
            return $this->db->query("SELECT * FROM $table WHERE $where >= DATE(NOW()) -INTERVAL $day")->result_array();
        } else if ($condition == 'calculator') {
            return $this->db->query("SELECT SUM(price) FROM $table WHERE $where >= DATE(NOW()) - INTERVAL $day")->result_array();
        }
    }

    public function CalculatDataUser($condition, $table, $where = '',  $day = '' , $user_id)
    {
        if ($condition === 'day') {
         return $this->db->query("SELECT * FROM $table WHERE WHERE user_id = $user_id AND $where >= DATE(NOW()) -INTERVAL $day AND $user_id")->result_array();
        } else if ($condition == 'calculator') {
            return  $this->db->query("SELECT SUM(price) FROM $table WHERE user_id = $user_id AND $where >= DATE(NOW()) - INTERVAL $day")->result_array();

        }
    }

    public function LoginUserCount($where = '',  $day = ''){
        return $this->db->query("SELECT * FROM tbl_login WHERE $where >= DATE(NOW()) -INTERVAL $day AND role = 'user'")->result_array();
    }



    public function PaymentTotal($day)
    {
        $data = $this->db->query("SELECT tbl_transfer_payment.*, tbl_login.name, tbl_login.photo FROM tbl_transfer_payment inner join tbl_login on tbl_transfer_payment.user_id = tbl_login.id WHERE tbl_transfer_payment.date >= DATE(NOW()) -INTERVAL $day AND tbl_login.role = 'user'")->result_array();

        $record = array();
        $name = array();
        foreach ($data as $key => $value) {
            if (!in_array($value['user_id'], $name)) {
                $name[] = $value['user_id'];
                $record[$key] = $value;
            }
        }

        foreach ($record as $row) {
            $row['total'] = $this->SumAmt($row['user_id'], $day);
            unset($row['price']);
            $totalSum[] = $row;
        }
        if (!empty($totalSum)) {
            return $totalSum;
        }
    }

    public function SumAmt($user_id, $day)
    {
        if (!empty($user_id)) {
            $trans = $this->db->query("SELECT * FROM tbl_transfer_payment WHERE user_id =  $user_id AND date >= DATE(NOW()) -INTERVAL $day")->result_array();
            $return = array();
            foreach ($trans as $sum) {
                $return[] = $sum['price'];
            }
            return array_sum($return);
        }
    }
}
