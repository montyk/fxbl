<html>
    <head>
<style>
label
{
        display:block;
        width: 80px;
        float:left;
}
</style>
    </head>
     <body>
         <form name="form" action="<?php echo site_url('login/add');?>" method="post" >
         <p><label>Name:</label><input type="text" name="name" value="<?php echo isset($name)?$name:'';?>" ></p>
         <p><label>Email:</label><input type="text" name="email" value="<?php echo isset($email)?$email:'';?>"></p>
         <p><label>Company:</label><input type="text" name="company" value="<?php echo isset($company)?$company:'';?>"></p>
         <p><label>Status:</label><select name="status">
                 <option value="1">Active</option>
                 <option value="0">InActive</option>
             </select></p>
         <input type="hidden" name="id" value="<?php echo $id;?>">
         <input type="hidden" name="tokenid" value="<?php echo $session_id;?>">
         <input type="submit" name="submit" value="Submit">
         </form>
     </body>
</html>