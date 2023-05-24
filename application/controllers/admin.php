<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class admin extends CI_Controller {

      public function __construct(){
		parent::__construct();


      //   $_SESSION["per_page"] = "10";
        if (!isset($_SESSION["admin_email"])) {
            redirect(base_url() . 'admin_login');     
        }
		
	  }

	
	public function index()
	{
		$this->load->view('admin/index');
	}

      public function ragister($param1="",$param2="",$param3="")
      {
            if($param1=="create")
		{
			$data["admin_user_name"]=$this->input->post("txt_username");
			$data["admin_user_pwd"]=$this->input->post("txt_pwd");
			$data["admin_user_email"]=$this->input->post("txt_email");

			

			$this->db->insert("tbl_admin_user",$data);
			redirect(base_url()."admin_login");
		}

            $this->load->view('admin/ragister');
      }

      public function manage_category($param1="",$param2="",$param3="")
	{

		if($param1=="create")
		{
			$data["name"]=$this->input->post("txt_category_name");
			$data["discription"]=$this->input->post("txt_category_desc");
			if($_FILES["img_category"]["error"]==0)
                {
                    $newname = $_FILES["img_category"]["name"];
                    $newname = $this->generate_random_name($newname);
                    
                    $config["file_name"]=$newname;
                    $config["upload_path"]="files/admin/category/";
                        $config["allowed_types"]="gif|jpg|png|bmp|jpeg|ico|jpeg";
                    $config["max_width"]="102400";
                    $config["max_height"]="76800";
                    $config["max_size"]=1024*1024*2;
                    
                    $this->load->library("upload");
                    $this->upload->initialize($config);
                    $this->upload->do_upload("img_category");

                    $data["image"]=$newname;
                        $this->smart_resize_image("files/admin/category/".$newname,262,200,true, "files/admin/category/thumb/".$newname,false,false);
                }
			$this->db->insert("tbl_category",$data);
			redirect(base_url()."admin/manage_category");
		}
		if($param1=="delete")
		{
		    $this->db->where("category_id ",$param2);
		    $this->db->delete("tbl_category");
		    redirect(base_url()."admin/manage_category");
		}

		if($param1=="edit" && $param2=="do_update")
		{
			$data["name"]=$this->input->post("txt_category_name");
			$data["discription"]=$this->input->post("txt_category_desc");
			if($_FILES["img_category"]["error"]==0)
                {
                    $newname = $_FILES["img_category"]["name"];
                    $newname = $this->generate_random_name($newname);
                    
                    $config["file_name"]=$newname;
                    $config["upload_path"]="files/admin/category/";
                        $config["allowed_types"]="gif|jpg|png|bmp|jpeg|ico|jpeg";
                    $config["max_width"]="102400";
                    $config["max_height"]="76800";
                    $config["max_size"]=1024*1024*2;
                    
                    $this->load->library("upload");
                    $this->upload->initialize($config);
                    $this->upload->do_upload("img_category");

                    $data["image"]=$newname;
                        $this->smart_resize_image("files/admin/category/".$newname,262,200,true, "files/admin/category/thumb/".$newname,false,false);
                }
			
			$this->db->where("category_id ",$param3);
			$this->db->update("tbl_category",$data);
			redirect(base_url()."admin/manage_category");
		}
		else if($param1=="edit")
		{
			$page_data["edit_profile"]=$this->db->get_where("tbl_category",array("category_id "=>$param2));
		}

		// $resultset=$this->db->get("tbl_category");
		$this->load->view('admin/category_view');
	}

	public function generate_random_name($filename)
	{
	    $ext         = pathinfo($filename, PATHINFO_EXTENSION);
	    //echo $ext;
	    //$newfilename = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5) . "_" . substr(str_shuffle('aBcEeFgHiJkLmNoPqRstUvWxYz0123456789'), 0, 5) . "_" . rand(1000000, 100000000) .  "_".str_replace(" ", "", $filename)."." . $ext;
	    $newfilename = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5) . "_" . substr(str_shuffle('aBcEeFgHiJkLmNoPqRstUvWxYz0123456789'), 0, 5) . "_" . rand(1000000, 100000000) . "_" . str_replace(" ", "", $filename);
	    return $newfilename;
	}
	public function smart_resize_image($file, $width = 0, $height = 0, $proportional = false, $output = 'file', $delete_original = true, $use_linux_commands = false)
	{
	    if ($height <= 0 && $width <= 0) {
		  return false;
	    }
	    
	    $info  = getimagesize($file);
	    $image = '';
	    
	    $final_width  = 0;
	    $final_height = 0;
	    list($width_old, $height_old) = $info;
	    
	    if ($proportional) {
		  if ($width == 0)
			$factor = $height / $height_old;
		  elseif ($height == 0)
			$factor = $width / $width_old;
		  else
			$factor = min($width / $width_old, $height / $height_old);
		  
		  $final_width  = round($width_old * $factor);
		  $final_height = round($height_old * $factor);
		  
	    } else {
		  $final_width  = ($width <= 0) ? $width_old : $width;
		  $final_height = ($height <= 0) ? $height_old : $height;
	    }
	    
	    switch ($info[2]) {
		  case IMAGETYPE_GIF:
			$image = imagecreatefromgif($file);
			break;
		  case IMAGETYPE_JPEG:
			$image = imagecreatefromjpeg($file);
			break;
		  case IMAGETYPE_PNG:
			$image = imagecreatefrompng($file);
			break;
		  default:
			return false;
	    }
	    
	    $image_resized = imagecreatetruecolor($final_width, $final_height);
	    
	    if (($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG)) {
		  $trnprt_indx = imagecolortransparent($image);
		  
		  // If we have a specific transparent color
		  if ($trnprt_indx >= 0) {
			
			// Get the original image's transparent color's RGB values
			$trnprt_color = imagecolorsforindex($image, $trnprt_indx);
			
			// Allocate the same color in the new image resource
			$trnprt_indx = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
			
			// Completely fill the background of the new image with allocated color.
			imagefill($image_resized, 0, 0, $trnprt_indx);
			
			// Set the background color for new image to transparent
			imagecolortransparent($image_resized, $trnprt_indx);
			
			
		  }
		  // Always make a transparent background color for PNGs that don't have one allocated already
		  elseif ($info[2] == IMAGETYPE_PNG) {
			
			// Turn off transparency blending (temporarily)
			imagealphablending($image_resized, false);
			
			// Create a new transparent color for image
			$color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
			
			// Completely fill the background of the new image with allocated color.
			imagefill($image_resized, 0, 0, $color);
			
			// Restore transparency blending
			imagesavealpha($image_resized, true);
		  }
	    }
	    
	    imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
	    
	    if ($delete_original) {
		  if ($use_linux_commands)
			exec('rm ' . $file);
		  else
			@unlink($file);
	    }
	    
	    switch (strtolower($output)) {
		  case 'browser':
			$mime = image_type_to_mime_type($info[2]);
			header("Content-type: $mime");
			$output = NULL;
			break;
		  case 'file':
			$output = $file;
			break;
		  case 'return':
			return $image_resized;
			break;
		  default:
			break;
	    }
	    
	    switch ($info[2]) {
		  case IMAGETYPE_GIF:
			imagegif($image_resized, $output);
			break;
		  case IMAGETYPE_JPEG:
			imagejpeg($image_resized, $output);
			break;
		  case IMAGETYPE_PNG:
			imagepng($image_resized, $output);
			break;
		  default:
			return false;
	    }
	    
	    return true;
	}
}


      


