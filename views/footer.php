</div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
<!-- Para llegar al inicio  -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Modal Cerrar sesión -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
          <?php 
            if($userData->sexo == 1) { 
              echo "¿Listo para salir?"; 
            }
            else if($userData->sexo == 2){
              echo "¿Lista para salir?"; 
            }else{
              echo "¿Quiere salir?"; 
            }
          ?>     
          </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <?php 
            if($userData->sexo == 1) { 
              echo 'Seleccione <strong>"Cerrar sesión"</strong> a continuación si está listo para finalizar su sesión actual.'; 
            }
            else if($userData->sexo == 2){
              echo 'Seleccione <strong>"Cerrar sesión"</strong> a continuación si está lista para finalizar su sesión actual.'; 
            }else{
              echo 'Seleccione <strong>"Cerrar sesión"</strong> a continuación si quiere finalizar su sesión actual.'; 
            }
          ?> 
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="?view=Autentificacion&action=Index">Cerrar Sesión</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/datatables-demo.js"></script>
  <!-- Page level custom scripts -->
  <script src="assets/js/demo/chart-area-demo.js"></script>
  <script src="assets/js/demo/chart-pie-demo.js"></script>
  <script src="assets/js/custom-file-input.js"></script>
  <script src="assets/js/jquery.validate.js"></script>
  <script>
    $(function () {
      $.validator.addMethod("passwordcheck", function(value) {
        return /^[a-zA-Z0-9!@#$%^&()=[]{};':"\|,.<>\/?+-]+$/.test(value) 
        && /[a-z]/.test(value) // has a lowercase letter 
        && /\d/.test(value)//has a digit 
        && /[!@#$%^&()=[]{};':"\|,.<>\/?+-]/.test(value)// has a special character
      },"La contraseña debe contener de 8 a 15 carácteres alfanuméricos (a-z A-Z), contener mínimo un dígito (0-9) y un carácter especial (_-=)."  
      );

      $("#formregistro").validate({
        rules: {  
          pass: {required:true,minlength:8,maxlength:15,passwordcheck:true },
          passRepear: {required:true,equalTo:"#pass",passwordcheck:true }
        },
        messages: {
          pass: "Formato contraseña incorrecto.",
          passRepear: "Formato contraseña incorrecto."
        },
        errorLabelContainer: "dt",
        wrapper: "dd"
      });
      });
  </script>
</body>
</html>