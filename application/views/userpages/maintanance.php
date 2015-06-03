<? $data['active_link'] = "active"; 
   $data['active'] ="0";	
?>

<?php 
$data='';
$this->load->view('common/header', $data);?>
<table style="width:1200px;height:500px;font-size: 40px;align:center;padding:95px;color:red;">
    <th>The site is under maintanance, will be back in few hours. </th>
</table>


<!-- end div#wrapper -->
<!--	Start footer content-->
<?php  $this->load->view('common/footer');?>
<!--end footer content-->

</div>

</body>

</html>



