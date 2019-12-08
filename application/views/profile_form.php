<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    </head>
    <style>
        .top-br{
            margin-top: 40px;
            padding-left: 30px;
            padding-right: 30px;
        }
        .brow{margin-top: 30px;}
    </style>
<body>
    <div>
            <div class="top-br">
                <center><h3><i class="icon-eye-open"></i>Profile Form</h3></center>
            </div>
        <div class="container d-flex justify-content-center" style="margin-top: 40px;margin-bottom: 40px;">
            <form class="col-md-6 rounded bg-secondary p-4 text-light" enctype="multipart/form-data" id="submit">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="inputEmail4">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name">
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="inputcontry">country</label>
                      <select id="inputcontry" name="inputcontry" class="form-control">
                            <option selected>Choose...</option>
                            <?php
                               foreach($coun as $countries){
                                 echo "<option value='".$countries['country']."'>".$countries['country']."</option>";
                               }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputState">State</label>
                        <select id="inputState" name="inputState" class="form-control" >
                            <option selected>Choose...</option>
                            
                        </select>
                    </div>
                    <div class="form-group col-md-12 brow">
                        <input type="file" name="profiledata" id="profiledata">
                        
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12 ml-4">
                        <input class="form-check-input" name="checkbox1" type="checkbox" value="" id="checkbox1">
                        <label class="form-check-label" for="invalidCheck2">
                        Are you want to add phone number
                        </label>
                    </div>    
                     <div class="form-group col-md-12" id="inputmbl" style="display:none">   
                        <label for="inputEmail4">Phone No.</label>
                        <input class="form-control" name="inputphone" id="inputphone" placeholder="Enter the contact number" maxlength="10" onkeypress="return isNumberKey(event);">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">UserName</label>
                        <input type="text" class="form-control" name="inputusername" id="inputusername" placeholder="Username">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" name="inputpassword" id="inputpassword" placeholder="Password">
                    </div>
                </div>
                <div class="form-row">
                    <center><input type="submit" name="submit" value="Submit" class="btn btn-primary" id="sub"></center>
                </div>
            </form>
        </div>
    </div>
    
    <div class="jumbotron container">
			
			<div class="span12" style="margin-bottom:20%">
				<div>
                    <center><h3><i class="icon-eye-open"></i>Profile List</h3></center>
				</div>
<br>
				<div class="well no-padding" id="tbl">
				
					<table class="data-table table-striped table-hover table-bordered"  id="example">
						<thead class="p-3">
							<tr>
								<th align="center" width="5%">Sr.</th>
								<th align="center" width="10%">name</th>
								<th align="center" width="10%">email</th>
								<th align="center" width="10%">city</th>
								<th align="center" width="10%">state</th>
								<th align="center" width="10%">contact No.</th>
                <th align="center" width="10%">Profile photo</th>
								<th align="center" width="10%">Created Date</th>
							</tr>
						</thead>
						<tbody>
						 <?php  
                         $row_count = 1;
                         foreach ($profiledt->result() as $row)  
                           { 
                            ?><tr>  
<!--                            <td align="center" width="5%"><?php  echo $cnt; ?></td>-->
                            <td  width="5%"><?php echo $row_count;?>.</td>
                            <td width="10%"><?php if(!empty($row->name)){ echo $row->name; }else { echo "NA";} ?>
                            <td width="10%"><?php if(!empty($row->email)){ echo $row->email; }else { echo "NA";} ?>
                            <td width="10%"><?php if(!empty($row->city)){ echo $row->city; }else { echo "NA";} ?>
                            <td width="10%"><?php if(!empty($row->state)){ echo $row->state; }else { echo "NA";} ?>
                            <td width="10%"><?php if(!empty($row->contact_no)){ echo $row->contact_no; }else { echo "NA";} ?>
<!--                            <td align="center" width="10%"><?php echo $row->contact_no;?></td>-->
                            <td width="10%">
									<img class="post-thumb img-thumbnail" src="<?php echo base_url();?>image/<?php echo $row->profile_img; ?>" alt="profile photo" width="100px" height="80px" style="height: 100px !important;">
						    </td>
                            <td width="10%"><?php echo $row->created_date;?></td>

                            </tr>  
                         <?php $row_count++;}  
                         ?>  

						</tbody>
						<tfoot>
							<tr>
								<th align="center" width="5%">Sr.</th>
								<th align="center" width="10%">name</th>
								<th align="center" width="10%">email</th>
								<th align="center" width="10%">city</th>
								<th align="center" width="10%">state</th>
								<th align="center" width="10%">contact No.</th>
                                <th align="center" width="10%">Profile photo</th>
								<th align="center" width="10%">Created Date</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- / Pie: Content -->
			</div>
			<!-- / Pie -->
</div>
    
    <script>
        
        function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : event.keyCode;
 console.log(charCode);
    if (charCode != 46 && charCode != 45 && charCode > 31
    && (charCode < 48 || charCode > 57))
     return false;

  return true;
}
        
        
        $(function() {
            $("#checkbox1").on("click",function() {
            $("#inputmbl").toggle(this.checked);
          });
        });
        
        $(document).ready(function(){
            $.noConflict();
        // City change
        $('#inputcontry').change(function(){
          var country = $(this).val();

          // AJAX request
          $.ajax({
            url:'<?=base_url()?>Demo/getcountry',
            method: 'post',
            data: {country: country},
            dataType: 'json',
            success: function(response){

              // Remove options 
              
              $('#inputState').find('option').not(':first').remove();

              // Add options
              $.each(response,function(index,data){
                 $('#inputState').append('<option value="'+data['state_name']+'">'+data['state_name']+'</option>');
              });
            }
         });
       });
 
    });

        $('#submit').submit(function(e){
        e.preventDefault(); 
//            console.log(new FormData(this));
            var fd = new FormData(this);
            fd.append('profiledata',$('#profiledata')[0].files[0]);
         $.ajax({
             url:'<?=base_url()?>Demo/insert_profile',
             type:'post',
             data:fd,
             processData:false,
             contentType:false,
             cache:false,
        
              success: function(data){ 
                  console.log(data);
                  alert(data);
           }
         });
    }); 
        
    </script>    
    </body>
</html>    
