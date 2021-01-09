<div class="row">
  <div class="col">
      <form>
        <div class = "mt-5 col-sm-12 ml-5 p-5 bg-success text-white">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="textHelp" placeholder="Ex - Abhishek ">
          </div>
          <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="contact" aria-describedby="textHelp" placeholder="Ex - 1234567891">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" aria-describedby="textHelp" placeholder="Ex - Badi Jugauli">  </div>
          <div class="form-group">
            <label for="url">URL</label>
            <input type="text" class="form-control" id="url" placeholder="Ex - www.cedcoss.com">
          </div>
            <button type="submit" id = "submit_detail" class="btn btn-primary">Submit</button>
        </div>
       
      </form>
  </div> 

  
  <div class="col mt-5 col-sm-6 ml-5 p-5  text-danger">
  <table id="example" class="display" style="width:100%">
  <select name="drop" id="drop" class="pref">
  <option value="1">1</option>
  <option value="2">2</option>
  </select>
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>URL</th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>URL</th>
            </tr>
        </tfoot>
    </table>
  </div>
</div>
