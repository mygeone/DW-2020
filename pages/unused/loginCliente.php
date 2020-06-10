<?php
include_once("header.php")
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded shadow shadow-sm">
                        <div class="card-header">
                            <div class="container-fluid">
                              <div class="row justify-content-between">
                                <div class="col-3"><h1 class="mb-0">login</h1></div>
                                <div class="col-5 d-flex justify-content-end" style="padding-left: 0px;padding-right: 0px;">
                                  
                                    <a role="button" href="/loginVendedor.php" aria-pressed="true" class="btn btn-secondary active">
                                      <div style="white-space: nowrap" class="display-5">Acceso Vendedor</div>
                                    </a>
                                  
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form" action="redirect.php" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                <div class="form-group">
                                    <label for="uname1">Usuario</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="usuario" id="uname1" required="">
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter your password too!</div>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
    
</div>
<!--/container-->