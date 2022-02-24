<script src="{{ asset('backend') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('backend') }}/lib/popper.js/popper.js"></script>
    <script src="{{ asset('backend') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('backend') }}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{asset('backend')}}/lib/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('backend') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{ asset('backend') }}/lib/select2/js/select2.min.js"></script>
    <script src="{{ asset('backend') }}/lib/spectrum/spectrum.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        // Select2 by showing the search
        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });

        // Select2 with tagging support
        $('.select2-tag').select2({
          tags: true,
          tokenSeparators: [',', ' ']
        });

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

        $('#datepickerNoOfMonths').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true,
          numberOfMonths: 2
        });

        // Color picker
        $('#colorpicker').spectrum({
          color: '#17A2B8'
        });

        $('#showAlpha').spectrum({
          color: 'rgba(23,162,184,0.5)',
          showAlpha: true
        });

        $('#showPaletteOnly').spectrum({
            showPaletteOnly: true,
            showPalette:true,
            color: '#DC3545',
            palette: [
                ['#1D2939', '#fff', '#0866C6','#23BF08', '#F49917'],
                ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
            ]
        });

      });
    </script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // $('#datatable2').DataTable({
        //   bLengthChange: false,
        //   searching: false,
        //   responsive: true
        // });

        // // Select2
        // $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
    <script src="{{ asset('backend') }}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{ asset('backend') }}/lib/d3/d3.js"></script>
    <script src="{{ asset('backend') }}/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{ asset('backend') }}/lib/chart.js/Chart.js"></script>
    <script src="{{ asset('backend') }}/lib/Flot/jquery.flot.js"></script>
    <script src="{{ asset('backend') }}/lib/Flot/jquery.flot.pie.js"></script>
    <script src="{{ asset('backend') }}/lib/Flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('backend') }}/lib/flot-spline/jquery.flot.spline.js"></script>
    <script src="{{ asset('backend') }}/lib/summernote/summernote-bs4.min.js"></script>
    <script>
      $(function(){
        'use strict';
        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          tooltip: false
        })

        $('#summernote2').summernote({
          height: 150,
          tooltip: false
        })

        $('#summernote3').summernote({
          height: 150,
          tooltip: false
        })

        $('#summernote4').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>
    <script src="{{ asset('backend') }}/js/starlight.js"></script>
    <script src="{{ asset('backend') }}/js/ResizeSensor.js"></script>
    <script src="{{ asset('backend') }}/js/dashboard.js"></script>
    <script src="{{ asset('backend') }}/lib/highlightjs/highlight.pack.js"></script>
    <script type="text/javascript" src="{{ asset('common') }}/jquery.form-validator.min.js"></script>
    <script>
        $.validate({
          lang: 'en'
        });
      </script>
  <script type="text/javascript" src="{{ asset('backend') }}/lib/toastr/toastr.min.js"></script>
    <script>
      @if(Session::has('message'))
        var type ="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info(" {{Session::get('message')}} ");
                break;

            case 'success':
                toastr.success(" {{Session::get('message')}} ");
                break;

            case 'warning':
                toastr.warning(" {{Session::get('message')}} ");
                break;

            case 'error':
                toastr.error(" {{Session::get('message')}} ");
                break;
        }
    @endif
    </script>

<script src="{{ asset('backend') }}/lib/sweetalert/sweetalert.min.js"></script>
<script src="{{ asset('backend') }}/lib/sweetalert/code.js"></script>