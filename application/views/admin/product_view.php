<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src=
"https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js">
    </script>
    <script src=
"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js">
    </script>
    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js">
    </script>
    <title>Crud</title>
  </head>
  <body>
    
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo $_SESSION["admin_name"]?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li> -->
     
      </ul>
      <div class="col-md-12">
                        <label style="float:right">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add New Product</button>
                        </label>
                    </div>
    </div>
  </div>
</nav>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Discription</th>
      <th scope="col">Iamge</th>
      <th scope="col">Action</th>

	</tr>
  </thead>
  <tbody>
     <?php
            $resultset=$this->db->get("tbl_prodect");
            ?> 
	<?php
	foreach($resultset->result() as $result_row)
	{
		?>
    <tr>
      <th scope="row"><?php echo $result_row->product_id ?></th>
      <td><?php echo $result_row->product_name ?></td>
      <td><?php echo $result_row->product_dec ?></td>
      <td>                            
                <img src="<?php echo base_url(); ?>files/admin/product/<?php echo $result_row->product_image; ?>" width="40px">
</td>
	  <td>
      <!-- <a href="facebook.com">Edit</a> -->
      <a  data-toggle="modal" data-target="#editModal" onclick="get_edit_data(<?php echo $result_row->product_id ; ?>);" >Edit</a>

    <!-- | <a class=" confirm-delete" data-id="<?php echo $result_row->category_id ; ?>">Delete</a> -->

    <a href="<?php echo base_url('admin/manage_product/delete/'.$result_row->product_id );?>">Delete</a>
</td>
    </tr>
	<?php
	}	
	?>
    
  </tbody>
</table>
<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add product</h4>
              </div>
              <div class="modal-body">
                  <!-- Add Modal Form -->
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="box box-primary">
                                  <form role="form" method="post" action="<?php echo base_url(); ?>admin/manage_product/create" enctype="multipart/form-data">
                                      <div class="box-body">
                                              <div class="form-group">
                                                          <label>product Name</label>
                                                          <input class="form-control" id="txt_product_name" name="txt_product_name">
                                              </div>
                                      
                                              </div>
                                              <div class="form-group">
                                                          <label>Description</label>
                                                          <textarea class="form-control" id="txt_product_dec" name="txt_product_dec" rows="3"></textarea>
                                              </div>
                                              <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" id="product_image" name="product_image">
                                            </div>
                                            <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="form-control"  id="cmb_category" name="cmb_category">
                                                    <?php 
                                                    $select_res = $this->db->get("tbl_category");
                                                    foreach($select_res->result() as $select_row)
                                                    {
                                                        echo "<option value=".$select_row->category_id.">".$select_row->name."</option>";
                                                    }
                                                    ?>
                                                    </select>
                                            </div>
                                          <button type="submit" class="btn btn-success">Submit</button>
                                          <button type="submit" class="btn btn-default">Reset</button>
                                      </div>
                                  </form>
                              </div></div>
                          
                      </div>
                  <!-- Add Modal Form Ends -->
              </div>
            <!--<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>-->
          </div>

        </div>
  </div>


  <div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit product</h4>
        </div>
        <div class="modal-body">
            <!-- Edit Modal Form -->
                <div class="row">
                    <div class="col-lg-12" id="edit_div">
                    </div>
                </div>
            <!-- Edit Modal Form Ends -->
        </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>
<script type="text/javascript">
            var controller = "ajax/get_product";
            var base_url = "<?php echo base_url(); ?>";

     function getXMLHTTP() { //fuction to return the xml http object
        var xmlhttp=false;  
        try{
            xmlhttp=new XMLHttpRequest();
        }
        catch(e)    {       
            try{            
                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e){
                try{
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e){
                    xmlhttp=false;
                }
            }
        }
            
        return xmlhttp;
    }

    function get_edit_data(primary_id)
    {       
        var strURL=base_url+controller+"/"+primary_id;
        var req = getXMLHTTP();
        if (req) {
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {
                    //alert(req.responseText);                      
                        document.getElementById("edit_div").innerHTML=req.responseText;
                        
                          
                            
                    } else {
                        alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                    }
                }               
            }           
            req.open("GET", strURL, true);
            req.send(null);
            
        }
    }

    
</script>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
    

  
  </body>
</html>