<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
          <form name="login-form" id="login-form">
            <div class="md-form mb-5">
            <i class="fas fa-envelope prefix grey-text"></i>
            <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
            <input type="email" id="email" name="email" class="form-control validate">
            </div>

            <div class="md-form mb-4">
            <i class="fas fa-lock prefix grey-text"></i>
            <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>

            <input type="password" id="password" name="password" class="form-control validate">
            </div>
            </form>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" style="width:100%;" onClick="checkParam()">Login</button>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <a href="register.php"><b>Don't have an account ? </b></a>
      </div>
    </div>
  </div>
</div>