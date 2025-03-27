
<?php 


include ('../Config/layout.php');

?>
 


        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Forms</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Forms</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Basic Form</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Registration Student</div>
                  </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-10 col-lg-8">
                          <form action="StudentController.php" method = "Post">
                            <div class="form-group">
                                <label for="Fname">First Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name = "Fname"
                                    id="Fname"
                                    placeholder="Enter First Name"
                                />
                            </div>
                            <div class="form-group">
                            <label for="Lname">Last Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name = "Lname"
                                id="Lname"
                                placeholder="Enter Last Name"
                                />
                            </div>
                            <div class="form-group">
                            <label for="Minitial">Middle initial</label>

                            <input
                                type="text"
                                class="form-control"
                                name = "Minitial"
                                id="Minitial"
                                placeholder="Enter Middle Initial"
                                />
                                <div class="form-group">
                            <label for="Department">Department</label>
                             </div>
                            <input
                                type="text"
                                class="form-control"
                                id="Department"
                                placeholder="Enter Department"
                                />
                                <div class="form-group">
                            <label for="Gender">Gender</label>
                             </div>
                            <input
                                type="text"
                                class="form-control"
                                id="Gender"
                                placeholder="Enter Gender"
                                />
                            <div class="form-group">
                            <label for="Age">Age</label>
                            </div>
                            <input
                                type="text"
                                class="form-control"
                                id="Age"
                                placeholder="Enter Age"
                                />
                                <div class="form-group">
                          <label for="email2">Contact</label>
                          </div>
                          <input
                            type="Contact"
                            class="form-control"
                            id="Contact"
                            placeholder="Contact"
                          />
                        <div class="form-group">
                          <label for="email2">Email Address</label>
                          </div>
                          <input
                            type="email"
                            class="form-control"
                            id="email"
                            placeholder="Enter Email"
                          />
                          <small id="emailHelp2" class="form-text text-muted"
                            >We'll never share your email with anyone
                            else.</small
                          >
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          </div>
                          <input
                            type="password"
                            class="form-control"
                            id="password"
                            placeholder="Password"
                          />
                        </div>
                        <div class="form-group has-success">
                          <label for="successInput">Success Input</label>
                          <input
                            type="text"
                            id="successInput"
                            value="Success"
                            class="form-control"
                          />
                        </div>
                       
                        <div class="form-group">
                          <label for="smallSelect">Small Select</label>
                          <select
                            class="form-select form-control-sm"
                            id="smallSelect"
                          >
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-action">
                    <button class="btn btn-success" type = "Submit" name = "CreateStudent">Submit</button>
                    <button class="btn btn-danger">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</form>
       