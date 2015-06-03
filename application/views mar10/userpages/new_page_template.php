<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
    </head>
    <body class="app">
         <?php $this->load->view('common/analyticstracking');?>  
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">
                    <div class="rightNav_head">Home</div>
                    <div class="rightNav_cnt">
                         
<!--                         START @@ PAGE CONTENT-->
                        
                            <table class="data">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Savings</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>January</td>
                                    <td>$100</td>
                                </tr>
                                <tr>
                                    <td>January</td>
                                    <td>$100</td>
                                </tr>
                                <tr>
                                    <td>January</td>
                                    <td>$100</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="grid-msg">No Open Positions</div>
                        
                        <br/>

                         <a class="button grey">Grey</a>
                         <a class="button red">red</a>
                         <a class="button blue">blue</a>
                         <a class="button green">green</a>
                         <a class="button black">black</a>
                         <a class="button yellow">yellow</a>
                         <a class="button purple">purple</a>
                         <a class="button gblue">gblue</a>
                         
                         <br/><br/>

                         <div class="hdr1 f_b m_b_10">Your Content</div>

                         <div class="m_b_10 reset_alert">
                            <div class="alert_success">Your Account is validated</div>
                            <div class="alert_error">Your Account is not validated</div>
                         </div>
                        
                         <div class="hdr1 f_b m_b_10">Account Summary (USD)</div>

                         <div class="o_h sum_box r_f">
                            <div class="f_l box">
                                <div class="lft_fld">Account Balance</div>
                                <div class="rgt_fld">0.00</div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Margin</div>
                                <div class="rgt_fld">0.00</div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Equity</div>
                                <div class="rgt_fld">0.00</div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Free Margin</div>
                                <div class="rgt_fld">0.00</div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Unrealized P/L</div>
                                <div class="rgt_fld">0.00</div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Margin Level</div>
                                <div class="rgt_fld">0%</div>
                            </div>

                         </div>


                         <div class="hdr2 f_b m_t_40 m_b_10">OPEN POSITIONS</div>

                         <table class="data">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Symbol</th>
                                    <th>Lots</th>
                                    <th>Open Price</th>
                                    <th>SL</th>
                                    <th>TP</th>
                                    <th>P/L</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Type</td>
                                    <td>Symbol</td>
                                    <td>Lots</td>
                                    <td>Open Price</td>
                                    <td>SL</td>
                                    <td>TP</td>
                                    <td>P/L</td>
                                </tr>
                               
                            </tbody>
                        </table>

                        <div class="hdr2 f_b m_b_10 m_t_40">PENDING ORDERS</div>

                        <table class="data">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Symbol</th>
                                    <th>Lots</th>
                                    <th>Price</th>
                                    <th>SL</th>
                                    <th>TP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   <td valign="top" colspan="7" class="dataTables_empty"><div class="grid-msg">No Pending Orders</div></td>
                                </tr>
                            </tbody>
                        </table>

                        
<!--                         END @@ PAGE CONTENT-->
                        
                    </div>
                </div>
            </div> 
            
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
            
        </div>    
        
    </body>
</html>