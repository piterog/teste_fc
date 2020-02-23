    </div>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/toastr.min.js" type="text/javascript"></script>
    <script>

    $(document).ready(() => {

      toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      let url       = new URL(window.location.href);
      let parameter = url.searchParams.get('toast');

      switch(parameter){
        case 'delete':
          toastr.warning('O médico foi apagado com sucesso!');
          break;
        case 'update':
          toastr.info('Os dados do médico foram atualizados com sucesso!');
          break;
        case 'create':
          toastr.success('Os dados foram salvo com sucesso!');
          break;
      }
    });

    
    </script>
  </body>
</html>