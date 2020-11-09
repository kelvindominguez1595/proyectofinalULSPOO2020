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
            if($data->sexo == 1) { 
              echo "¿Listo para salir?"; 
            }
            else if($data->sexo == 2){
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
            if($data->sexo == 1) { 
              echo 'Seleccione <strong>"Cerrar sesión"</strong> a continuación si está listo para finalizar su sesión actual.'; 
            }
            else if($data->sexo == 2){
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
  <script>
    $(document).ready( function () {
        $('.alert').alert();
        $('[data-toggle="tooltip"]').tooltip();
    } );
        // script para validar la contraseña 
        function validarrPass(){
        var pass1 = $('pass').val();
        var pass2 = $('passRepear').val();

        var espacios = false;
        var cont = 0;

        // validamos si hay espacios nulos en la contraseña
        while(!espacios &&(cont < pass1.length)){
            if(pass1.charAt(cont) == " "){
                espacios = true;
            }
            cont++;
        }
        if(espacios){
            alert("La contraseña no puede contener espacios en blanco");
         return false;   

        }
        if (pass1.length == 0 || pass2.length == 0) {
        alert("Los campos de la password no pueden quedar vacios");
        return false;
        }

        if (pass1 != pass2) {
            alert("Las passwords deben de coincidir");
        return false;
        } else {
             alert("Todo esta correcto");
        return true; 
        }
    }
  </script>
</body>
</html>