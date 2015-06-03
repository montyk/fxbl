<?php

    class Buy_sell_model extends MY_Model{
        public function  __construct() {
            parent::__construct();
        }

        public function calculate_charges($chargeType='buy',$amount=0,$lr_currency=0,$lr_bank=0){
            $data=new stdClass();
            $data->user_amount=$amount;
            $data->charge_type=$chargeType;
            
            $payment_methodsResource=$this->db->get_where('payment_methods',array('id'=>$lr_bank));
            $payment_method=$payment_methodsResource->result();
            $data->payment_method_name=$payment_method[0]->name;
            $data->payment_method_fee=$payment_method[0]->flat_fee;
            $data->payment_method_fee2=$payment_method[0]->flat_fee2;
            
            $ecurrencyResource=$this->db->get_where('ecurrencies',array('id'=>$lr_currency));
            $ecurrency=$ecurrencyResource->result();
            $data->ecurrency_name=$ecurrency[0]->name;
            $data->ecurrency_fee=$ecurrency[0]->flat_fees;

            $rate_type=(($chargeType=='buy')?'1':'2');
            $sql='
                    SELECT r.* from rates as r
                    WHERE 
                        r.paymentg_methods_id='.$lr_bank.' AND r.ecurrencies_id='.$lr_currency.'
                        AND r.`from`<='.$amount.' 
                        AND ( r.`to` >='.$amount.'  OR r.`to` =0 )
                        AND r.type='.$rate_type.' AND r.status=1
                ';  // AND r.to>'.$amount.' 
            $rates=$this->getDBResult($sql);
//            $ratesResource=$this->db->query($sql);
//            $rates=$ratesResource->result();
            if(!empty($rates)){
                $data->fee_type=$rates[0]->fee_type;
                if($rates[0]->fee_type=='flat'){
                    $data->edeal_fee=$rates[0]->amount;
                }else{
                    $data->edeal_fee=($amount*$rates[0]->amount)/100;
                }
                if($chargeType=='buy'){
                    $data->total_amount=($amount+$data->payment_method_fee+$data->ecurrency_fee+$data->edeal_fee);
                }else if($chargeType=='sell'){
                    $data->total_amount=($amount+$data->payment_method_fee+$data->payment_method_fee2+$data->ecurrency_fee+$data->edeal_fee);
                }
                
            }
            // echo '<pre>'; print_r($data); echo '</pre>';
            return $data;
        }
        
        public function reverse_calculate_charges($chargeType='buy',$amount=0,$lr_currency=0,$lr_bank=0){
            $data=new stdClass();
            $data->user_amount=$amount;
            $data->charge_type=$chargeType;
            
            $payment_methodsResource=$this->db->get_where('payment_methods',array('id'=>$lr_bank));
            $payment_method=$payment_methodsResource->result();
            $data->payment_method_name=$payment_method[0]->name;
            $data->payment_method_fee=$payment_method[0]->flat_fee;
            $data->payment_method_fee2=$payment_method[0]->flat_fee2;
            
            $ecurrencyResource=$this->db->get_where('ecurrencies',array('id'=>$lr_currency));
            $ecurrency=$ecurrencyResource->result();
            $data->ecurrency_name=$ecurrency[0]->name;
            $data->ecurrency_fee=$ecurrency[0]->flat_fees;

            $rate_type=(($chargeType=='buy')?'1':'2');
            $sql='
                    SELECT r.* from rates as r
                    WHERE 
                        r.paymentg_methods_id='.$lr_bank.' AND r.ecurrencies_id='.$lr_currency.'
                        AND r.`from`<='.$amount.' 
                        AND ( r.`to` >='.$amount.'  OR r.`to` =0 )
                        AND r.type='.$rate_type.' AND r.status=1
                '; // AND r.to>'.$amount.' 
            $rates=$this->getDBResult($sql);
//            $ratesResource=$this->db->query($sql);
//            $rates=$ratesResource->result();
            if(!empty($rates)){
                $data->fee_type=$rates[0]->fee_type;
                if($rates[0]->fee_type=='flat'){
                    $data->edeal_fee=$rates[0]->amount;
                }else{
                    $data->edeal_fee=($amount*$rates[0]->amount)/100;
                }
                if($chargeType=='buy'){
                    $data->total_amount=($amount-$data->payment_method_fee-$data->ecurrency_fee-$data->edeal_fee);
                }else if($chargeType=='sell'){
                    $data->total_amount=($amount-$data->payment_method_fee-$data->payment_method_fee2-$data->ecurrency_fee-$data->edeal_fee);
                }
                
            }
            // echo '<pre>'; print_r($data); echo '</pre>';
            return $data;
        }

        public function save_order($obj){
            return $this->saveRecord($obj, 'orders');
        }
        
        public function save_orders_charges($obj){
            return $this->saveRecord($obj, 'orders_charges');
        }
        
        public function save_users_ecurrencies($obj){
            return $this->saveRecord($obj, 'users_ecurrencies');
        }
        
        public function save_orders_sell_details($obj){
            return $this->saveRecord($obj, 'orders_sell_details');
        }
        
        public function check_users_ecurrencies($account_number=0,$users_id=0,$ecurrencies_id=0){
            if($account_number){
                $res=$this->db->get_where('users_ecurrencies',array('account_number'=>$account_number,'users_id'=>$users_id,'ecurrencies_id'=>$ecurrencies_id));
                if($res->num_rows()){
                    $returnData=$res->result();
                    return $returnData[0]->id;
                }else{
                    return 0;
                }
            }
        }
        
        public function save_order_buy_details($obj){
            return $this->saveRecord($obj, 'orders_buy_details');
        }

        public function staff_account_details($staffUserId=0,$ecurrencies_id=0){
            $returnData=0;
            if($staffUserId){
                $returnDataRes=$this->db->get_where('users_ecurrencies',array('ecurrencies_id'=>$ecurrencies_id,'users_id'=>$staffUserId));
                $returnData=$returnDataRes->result();
            }
            return $returnData;
        }

        
        
        /*
         * 
         * FOR Admin Side 
         * 
         */
        
        function get_orders($postVals) {
            $filter_sql = '';
            if (isset($postVals['orders_type']) && $postVals['orders_type'] != '') {
                $filter_sql .= ' AND o.orders_type = "' . $postVals['orders_type'].'"';
            }
            if (isset($postVals['payment_method']) && $postVals['payment_method'] != '') {
                $filter_sql .= ' AND o.payment_methods_id = ' . $postVals['payment_method'];
            }else if (isset($postVals['payment_methods_id']) && $postVals['payment_methods_id'] != '') {
                $filter_sql .= ' AND o.payment_methods_id = ' . $postVals['payment_methods_id'];
            }
            if (isset($postVals['ecurrencies']) && $postVals['ecurrencies'] != '') {
                $filter_sql .= ' AND o.ecurrencies_id = ' . $postVals['ecurrencies'];
            }
            if (isset($postVals['mask_id']) && !empty($postVals['mask_id'])) {
                $filter_sql .= ' AND o.mask_id = "' . $postVals['mask_id'].'" ';
            }
            if (isset($postVals['fname']) && !empty($postVals['fname'])) {
                $filter_sql .= ' AND u.firstname LIKE "%' . $postVals['fname'].'%" ';
            }
            if (isset($postVals['from']) && !empty($postVals['from']) && isset($postVals['to']) && !empty($postVals['to'])) {
                $filter_sql .= ' AND o.date_added BETWEEN "'.$postVals['from'].'" AND "'.$postVals['to'].'" ';
            }
            if (isset($postVals['orders_flags_id']) && !empty($postVals['orders_flags_id'])) {
                $filter_sql .= ' AND o.orders_flags_id = '.$postVals['orders_flags_id'].' ';
            }
            if (isset($postVals['orders_status_id']) && !empty($postVals['orders_status_id'])) {
                $filter_sql .= ' AND o.orders_status_id = '.$postVals['orders_status_id'].' ';
            }

            $sql = 'SELECT o.*, oc.amount, oc.total, ec.name, 
                        ec.name as ecurrency, pm.name as payment_method,
                        os.name as order_status, of.name as order_flag, u.firstname as user_name

                        FROM orders AS o
                        LEFT JOIN users as u ON u.id=o.user_id
                        LEFT JOIN orders_charges AS oc ON oc.orders_id=o.id
                        LEFT JOIN ecurrencies AS ec ON ec.id=o.ecurrencies_id
                        LEFT JOIN payment_methods AS pm ON pm.id=o.payment_methods_id
                        LEFT JOIN orders_status AS os ON os.id=o.orders_status_id
                        LEFT JOIN orders_flags AS of ON of.id=o.orders_flags_id
                        
                        WHERE 1 '.$filter_sql.'
                        GROUP BY o.id
                        ';
            
            $data_fields = array(
                'order_flag', 'mask_id', 'payment_method', 'ecurrency', 'total','order_status','user_name',
                "<a class='btn edit_ecur' href='" . base_url() . "orders/orders_details/{%enc_id%}' id='{%id%}'><span class='inner-btn'><span class='label'>More</span></span></a>",
                "<a class='btn edit_ecur' href='" . base_url() . "orders/order_messages/{%enc_id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Messages</span></span></a>"
            );
            
            return $this->jqgrid($postVals,$sql,$data_fields);
        }
        
        
        function orders_details($order_id=0){
            if($order_id){
                $sql = 'SELECT o.*, oc.amount, oc.total AS total_amount, ec.name, oc.rate AS edeal_fee, oc.payment_method_charges AS payment_method_fee, 
                            oc.payment_method_charges2 AS payment_method_fee2, oc.account_charges AS ecurrency_fee, 
                            ec.name as ecurrency_name, pm.name as payment_method_name, 
                            osd.beneficiary_name, osd.beneficiary_addr, osd.sell_lr_account, osd.bank_name_addr, osd.bank_swift, 
                            obd.lr_account, obd.lr_account_name,
                            os.name as order_status, of.name as order_flag

                            FROM orders AS o
                            LEFT JOIN orders_charges AS oc ON (oc.orders_id=o.id AND oc.type="default") 
                            LEFT JOIN ecurrencies AS ec ON ec.id=o.ecurrencies_id
                            LEFT JOIN payment_methods AS pm ON pm.id=o.payment_methods_id
                            LEFT JOIN orders_status AS os ON os.id=o.orders_status_id
                            LEFT JOIN orders_flags AS of ON of.id=o.orders_flags_id
                            LEFT JOIN orders_sell_details AS osd ON osd.order_id=o.id
                            LEFT JOIN orders_buy_details AS obd ON obd.order_id=o.id

                            WHERE 1 AND o.id='.$order_id;
                return $res=$this->getDBResult($sql);
            }
        }
        
        function order_reverse_calculations($order_id=0){
            if($order_id){
                $sql = 'SELECT oc.*, pm.name AS payment_method_name, ec.name AS ecurrency_name, u.user_type, u.firstname
                            
                            FROM orders_charges AS oc 
                            LEFT JOIN orders AS o ON o.id=oc.orders_id
                            LEFT JOIN ecurrencies AS ec ON ec.id=o.ecurrencies_id
                            LEFT JOIN payment_methods AS pm ON pm.id=o.payment_methods_id
                            LEFT JOIN users AS u ON u.id=oc.user_id
                            
                            WHERE 1 AND oc.orders_id='.$order_id.' AND oc.type=\'reverse\' ';
                
                return $res=$this->getDBResult($sql);
            }
        }
        
        function get_offers($postVals=0,$offerType='buy'){
            $filter_sql = '';
            $filter_sql = '';
            if (isset($postVals['orders_type']) && $postVals['orders_type'] != '') {
                $filter_sql .= ' AND o.orders_type = "' . $postVals['orders_type'].'"';
            }
            if (isset($postVals['payment_method']) && $postVals['payment_method'] != '') {
                $filter_sql .= ' AND o.payment_methods_id = ' . $postVals['payment_method'];
            }else if (isset($postVals['payment_methods_id']) && $postVals['payment_methods_id'] != '') {
                $filter_sql .= ' AND o.payment_methods_id = ' . $postVals['payment_methods_id'];
            }
            if (isset($postVals['ecurrencies']) && $postVals['ecurrencies'] != '') {
                $filter_sql .= ' AND o.ecurrencies_id = ' . $postVals['ecurrencies'];
            }
            if (isset($postVals['mask_id']) && !empty($postVals['mask_id'])) {
                $filter_sql .= ' AND o.mask_id = "' . $postVals['mask_id'].'" ';
            }
            if (isset($postVals['fname']) && !empty($postVals['fname'])) {
                $filter_sql .= ' AND u.firstname LIKE "%' . $postVals['fname'].'%" ';
            }
            if (isset($postVals['from']) && !empty($postVals['from']) && isset($postVals['to']) && !empty($postVals['to'])) {
                $filter_sql .= ' AND o.date_added BETWEEN "'.$postVals['from'].' AND "'.$postVals['to'].'" ';
            }
            if (isset($postVals['orders_flags_id']) && !empty($postVals['orders_flags_id'])) {
                $filter_sql .= ' AND o.orders_flags_id = '.$postVals['orders_flags_id'].' ';
            }
            if (isset($postVals['orders_status_id']) && !empty($postVals['orders_status_id'])) {
                $filter_sql .= ' AND o.orders_status_id = '.$postVals['orders_status_id'].' ';
            }


            if(!empty($offerType)){
                $filter_sql .= ' AND o.orders_type = "' .$offerType.'"';
            }
            
            if(!empty($postVals['user_id'])){
                $filter_sql .= ' AND o.user_id = "' .$postVals['user_id'].'"';
            }
            
            $sql = 'SELECT o.*, oc.amount, oc.total, ec.name, 
                        ec.name as ecurrency, pm.name as payment_method,
                        os.name as order_status, of.name as order_flag

                        FROM orders AS o
                        LEFT JOIN orders_charges AS oc ON oc.orders_id=o.id
                        LEFT JOIN ecurrencies AS ec ON ec.id=o.ecurrencies_id
                        LEFT JOIN payment_methods AS pm ON pm.id=o.payment_methods_id
                        LEFT JOIN orders_status AS os ON os.id=o.orders_status_id
                        LEFT JOIN orders_flags AS of ON of.id=o.orders_flags_id
                        
                        WHERE 1 '.$filter_sql.'
                        GROUP BY o.id
                        ';
            
            $data_fields = array(
                'mask_id', 'payment_method', 'ecurrency', 'total','order_status',
                "<a class='btn edit_ecur' href='" . base_url() . "staff/orders_details/{%enc_id%}' id='{%id%}'><span class='inner-btn'><span class='label'>More</span></span></a>",
                "<a class='btn edit_ecur' href='" . base_url() . "staff/order_messages/{%enc_id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Messages</span></span></a>"
            );
            
            return $this->jqgrid($postVals,$sql,$data_fields);
        }
        
        function save_order_messages($obj){
            return $this->saveRecord($obj, 'order_messages');
        }
        
        function get_order_messages($order_id=0){
            $sql='
                    SELECT om.*,u.firstname 
                    FROM order_messages AS om
                    LEFT JOIN users AS u ON u.id=om.user_id
                    WHERE 1 AND om.order_id='.$order_id.'
                ';
            return $res=$this->getDBResult($sql);
        }


        function get_users_involved_in_message($user_id=0,$order_id=0){
            if(!empty($order_id)){
                $sql="
                        SELECT u.*
                        FROM users AS u
                        WHERE id IN (
                            SELECT user_id FROM order_messages 
                            WHERE 
                            order_id=$order_id 
                            ".((!empty($user_id))?" AND user_id!=$user_id ":"")."
                            GROUP BY user_id
                        )
                    ";
                $res=$this->getDBResult($sql);
                if(empty($res)){
                    $sql="
                        SELECT u.*
                        FROM users AS u
                        WHERE id IN (
                            SELECT user_id FROM orders
                            WHERE
                            id=$order_id 
                            AND user_id!=$user_id 
                        )
                    ";
                    $res=$this->getDBResult($sql);
                }
                return $res;
            }
        }

        function mark_messages_read($user_id=0,$order_id=0){
            if(!empty($user_id) && !empty($order_id)){
                $sql="
                        UPDATE order_messages SET
                        customer_read='1', admin_read='1'
                        WHERE user_id!=$user_id AND order_id=$order_id
                    ";
                return $this->db->query($sql);
            }
        }

        function get_users_unread_messages($user_id=0,$is_admin=0){
            if(!empty($is_admin)){
                $sql="
                        SELECT om.*,u.firstname AS `from`
                        FROM order_messages AS om
                        LEFT JOIN users AS u ON u.id=om.user_id

                        WHERE 1
                        AND om.customer_read!=1
                        AND om.user_id!=$user_id
                    ";
                return $res=$this->getDBResult($sql);
            }else if(!empty($user_id)){
                $sql="
                        SELECT om.*,u.firstname AS `from`
                        FROM order_messages AS om
                        LEFT JOIN users AS u ON u.id=om.user_id
                        
                        WHERE om.order_id IN (
                            SELECT id FROM orders
                            WHERE
                            user_id=$user_id
                        )
                        AND om.customer_read!=1
                        AND om.user_id!=$user_id 
                    ";
                return $res=$this->getDBResult($sql);
            }
        }
        
        function get_payment_method_details($id=0){
            $sql="
                    SELECT pm.*,a.url,a.original_file_name,a.db_file_name
                        FROM payment_methods AS pm
                        LEFT JOIN attachments AS a ON a.global_id = pm.id 
                        WHERE pm.id=$id
                ";
                return $res=$this->getDBResult($sql);
        }
        
        function get_ecurrency_account_details($ecurrency_id=0){
            $sql="
                    SELECT a.*,e.name AS ecurrency_name,e.mode,e.flat_fees
                        FROM accounts AS a
                        LEFT JOIN ecurrencies AS e ON e.id=a.ecurrencies_id
                        WHERE a.ecurrencies_id=$ecurrency_id
                ";
                return $res=$this->getDBResult($sql);
        }
        
    }

?>
