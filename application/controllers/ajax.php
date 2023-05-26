<?php 
class ajax extends CI_Controller
{
      public function __construct(){
		parent::__construct();

		$this->load->database();
	  }

	  public function get_product($id)
	  {
		  $edit_profile=$this->db->get_where("tbl_prodect",array("product_id "=>$id));
	  
		  if(isset($edit_profile))
		  {
			foreach($edit_profile->result() as $row)
			{
		  ?>
			<div class="box box-primary">
			    <form role="form" method="post" action="<?php echo base_url(); ?>admin/manage_product/edit/do_update/<?php echo $row->product_id ;?>"  enctype="multipart/form-data">
				  <div class="box-body">
					    <div class="form-group">
							    <label>Product Name</label>
							    <input class="form-control" id="txt_category_name" name="txt_product_name" value="<?php echo $row->product_name ;?>">
					    </div>
					   
					    <div class="form-group">
							    <label>Description</label>
						  <textarea class="form-control" id="txt_category_desc2" name="txt_product_dec" rows="3"><?php echo $row->product_dec ;?></textarea>
					    </div>
					   <div class="form-group">
							    <label>Image</label><br>
							<?php 
							if(trim($row->product_image)!="")
							{
							?>
							    <img src="<?php echo base_url(); ?>files/admin/product/<?php echo $row->product_image; ?>" width="200px">
							<?php 
							}
							?>
							<input type="file" id="img_category" name="product_image">
					    </div>
					    <div class="form-group">
								  <label>Category</label>
								  <select class="form-control"  id="cmb_category" name="cmb_category">
								  <?php 
								  $select_res    = $this->db->get("tbl_category");
								  foreach($select_res->result() as $select_row)
								  {
									if($select_row->category_id == $row->category_id)
									{
									    echo "<option value=".$select_row->category_id." selected>".$select_row->name."</option>";
									}
									else
									{
									    echo "<option value=".$select_row->category_id.">".$select_row->name."</option>";
									}
								  }
								  ?>
								  </select>
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
