<form action="<?php echo base_url();?>perorangan/cobaSimpan" method="post">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd">
  </div>


  <div class='col-md-".$list->col_length."' style='padding: 5px'>
      <label style='font-size: 12px'>Test</label>
      <input type='text' class='form-control' name='test' placeholder='test' style='text-transform:uppercase'>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>