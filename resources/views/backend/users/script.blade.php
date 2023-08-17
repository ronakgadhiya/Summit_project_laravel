@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script type="text/javascript">
        var f_name="First Name";
        var l_name="Last Name";
        var username="username";
        var email="email";
        var status="status";
        var address="address";
        var mobile="mobile";
        var Action="Action";
        var country = "Country";
        var state = "State";
        var city = "City";
        
            (function (window, $) {
                window.LaravelDataTables = window.LaravelDataTables || {};
                window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
                    "serverSide": true,
                    "processing": true,
                    "ajax": {
                        data: function (d) {
                            
                            d.f_name = jQuery(".datatable-form-filter input[name='filter_f_name']").val();
                            d.l_name = jQuery(".datatable-form-filter input[name='filter_l_name']").val();
                            d.username = jQuery(".datatable-form-filter input[name='filter_username']").val();
                            d.email = jQuery(".datatable-form-filter input[name='filter_email']").val();
                            d.mobile = jQuery(".datatable-form-filter input[name='filter_mobile']").val();
                            d.address = jQuery(".datatable-form-filter input[name='filter_address']").val();
                            d.country = jQuery(".datatable-form-filter select[name='filter_country']").val();
                            d.state = jQuery(".datatable-form-filter select[name='filter_state']").val();
                            d.city = jQuery(".datatable-form-filter select[name='filter_city']").val();
                            
                        }
                    },
                    "columns": [ 
                        {"data":'id',"render": function ( data, type, row, meta ) {
                                var info = window.LaravelDataTables["dataTableBuilder"].page.info();
                                if(info.page==0)
                                {
                                    return (meta.row+1);
                                }
                                else
                                {
                                    var id=info.page*10;
                                    return (meta.row+1)+id;	
                                }
                            }
                        },
                        {
                            "name": "f_name",
                            "data": "f_name",
                            "title": f_name,
                            "render": null,
                            "orderable": false,
                            "searchable": true,
                        },
                        {
                            "name": "l_name",
                            "data": "l_name",
                            "title": l_name,
                            "render": null,
                            "orderable": false,
                            "searchable": true,
                        },
                        {
                            "name": "username",
                            "data": "username",
                            "title": username,
                            "render": null,
                            "orderable": false,
                            "searchable": true,
                        },
                        {
                            "name": "email",
                            "data": "email",
                            "title": email,
                            "render": null,
                            "orderable": false,
                            "searchable": true,
                        },
                        {
                            "name": "mobile",
                            "data": "mobile",
                            "title": mobile,
                            "render": null,
                            "orderable": false,
                            "searchable": true,
                        },
                        {
                            "name": "country",
                            "data": "country",
                            "title": country,
                            "orderable": true,
                            "searchable": true
                        },
                        {
                            "name": "state",
                            "data": "state",
                            "title": state,
                            "orderable": true,
                            "searchable": true
                        },
                        {
                            "name": "city",
                            "data": "city",
                            "title": city,
                            "orderable": true,
                            "searchable": true,
                        },
                        {
                            "name": "status",
                            "data": "status",
                            "title": status,
                            "orderable": true,
                            "searchable": true
                        },
                        {
                            "name": "action",
                            "data": "action",
                            "title": Action,
                            "render": null,
                            "orderable": false,
                            "searchable": false,
                           
                        }],
                    "searching": false,
                    //"dom": "<\"wrapper\">rtilfp",
                    // "dom":`<'row'<'col-sm-12'tr>>
                    // <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
                    "oLanguage": {
                      "sLengthMenu": "Display &nbsp;_MENU_",
                    },
                    "stateSave": true,
                    responsive: true,
                    colReorder: true,
                    // scrollY: '50vh',
                    // scrollX: true,
                    "buttons": [],
                    "order": [[ 1, "asc" ]],
                    "pageLength":10,
                });
            })(window, jQuery);
</script>
<script type="text/javascript">
    jQuery('.datatable-form-filter select').on('change', function (e) {
            window.LaravelDataTables["dataTableBuilder"].draw();
            e.preventDefault();
        });
        jQuery('.datatable-form-filter input').on('keyup', function (e) {
            window.LaravelDataTables["dataTableBuilder"].draw();
            e.preventDefault();
        });
        jQuery(".reset_filters").on('click', function (e) {
            jQuery(".datatable-form-filter input").val("");
            jQuery(".datatable-form-filter select").val("");
            window.LaravelDataTables["dataTableBuilder"].state.clear();
            var uri = window.location.toString();
            if (uri.indexOf("/?") > 0) {
                var clean_uri = uri.substring(0,uri.indexOf("/?"));
                window.history.replaceState({},document.title, clean_uri);
            }
            $("#dataTableBuilder").DataTable().ajax.reload(null,false);
        });
    </script>
<script>
    function changeStatus(_this, id) {
     var status = $(_this).prop('checked') == true ? 1 : 0;
     let _token = $('meta[name="csrf-token"]').attr('content');

     $.ajax({
         url: `{{ route ('changestatususers')}}`,
         type: 'post',
         data: {
             '_token': '{{ csrf_token() }}',
             id: id,
             status: status 
         },
         success: function (result) {
         console.log(result);
         }
     });
}
</script>

@if ($message = Session::get('success'))
   
    
<script type="text/javascript">
    Swal.fire({
        toast: true,
        type: 'success',
        position: "top",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        title: "<span style='color:white'>" + '{{$message}}' + "</span>",
        text: "",
        icon: 'success',
        heightAuto: true,
        background: "green",
        iconColor: "white",
      });
</script>

@php session()->forget('success') @endphp

@endif
@if ($message = Session::get('warning'))
   
    
<script type="text/javascript">
   const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
      
</script>

@php session()->forget('warning') @endphp

@endif
@endsection


