</div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/public/js/vendor/jquery-3.6.0.min.js" ></script>
    <script src="/public/js/vendor/jquery-ui.min.js"></script>
    <script src="/public/js/vendor/jquery.dataTables.min.js"></script>
    <script src="/public/js/vendor/dataTables.bootstrap4.min.js"></script>
    <script src="/public/js/vendor/popper.min.js"></script>
    <script src="/public/js/vendor/popper.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="/public/js/feather.min.js"></script>
    <script src="/public/js/editor.js"></script>

    <script>
      feather.replace()
      $(document).ready(function() {
            $('#example').DataTable();
            $("#txtEditor").Editor();
            $( "#tabs" ).tabs();
        } );
    </script>
  </body>
</html>
