<?php 
class ajax extends CI_Controller
{
      public function __construct(){
		parent::__construct();

		$this->load->database();
	  }


public function get_category($id)
	{	
	    $edit_profile=$this->db->get_where("tbl_category",array("category_id "=>$id));

	    if(isset($edit_profile))
	    {
	        foreach($edit_profile->result() as $row)
	        {
	    ?>
	        <div class="box box-primary">
	            <form role="form" method="post" action="<?php echo base_url(); ?>admin/manage_category/edit/do_update/<?php echo $row->category_id ;?>"  enctype="multipart/form-data">
	                <div class="box-body">
	                        <div class="form-group">
	                                    <label>Category Name</label>
	                                    <input class="form-control" id="txt_category_name" name="txt_category_name" value="<?php echo $row->name ;?>">
	                        </div>
	                       
	                        <div class="form-group">
	                                    <label>Description</label>
	                            <textarea class="form-control" id="txt_category_desc2" name="txt_category_desc" rows="3"><?php echo $row->discription ;?></textarea>
	                        </div>
	                       <div class="form-group">
	                                    <label>Image</label><br>
	                                <?php 
	                                if(trim($row->image)!="")
	                                {
	                                ?>
	                                    <img src="<?php echo base_url(); ?>files/admin/category/<?php echo $row->image; ?>" width="200px">
	                                <?php 
	                                }
	                                ?>
	                                <input type="file" id="img_category" name="img_category">
	                        </div>
	                        
	                    <button type="submit" class="btn btn-success">Submit</button>
	                    <button type="reset" class="btn btn-default">Reset</button>
	                </div>
	            </form>
	        </div>
	    <?php 
	        }
	    }
	} 


}
      ?>
