
// function SwitchToggle(id, table, column) {
//     alert('ben?');
//     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//     $.ajax({
//           type: 'POST',
//           url: "{{ url('/toggle/switch/')}}",
//           data: {_token: CSRF_TOKEN, table:table, column:column, id:id},
//           dataType: 'JSON',
//       });
// }

{/* <script type="text/javascript"> */}
    function deleteConfirmation(id) {
        swal({
            title: "ይጥፋን?",
            text: "ይህ ካጠፉት የዚ ተጠቃሚ ሙሉ መረጃ ከዳታቤዝ ይጠፋል!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "አዎ, ማጥፋት እፈልጋለሁ!",
            cancelButtonText: "አይ, ይቅር!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('admin/users/')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {

                        if (results.success == true) {
                            location.reload();
                            swal("Done!", results.message, "success");
                        } else {
                            swal("Error!", results.message, "error");
                        }
                    }
                });
            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        });
    }
// </script>


// <script type="text/javascript">
    function SwitchToggleAgent(user_id, agent_id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
              type: 'POST',
              url: "{{ url('agent/toggle/')}}",
              data: {_token: CSRF_TOKEN, user_id:user_id, agent_id:agent_id},
              dataType: 'JSON',
          });
    }
// </script>

// <script type="text/javascript">
    function deleteAgent(id) {
        swal({
            title: "ይጥፋን?",
            text: "ይህ ካጠፉት የዚ ተጠቃሚ ሙሉ መረጃ ከዳታቤዝ ይጠፋል!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "አዎ, ማጥፋት እፈልጋለሁ!",
            cancelButtonText: "አይ, ይቅር!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value == true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: "{{ url('agent/delete/')}}/" + id,
                   data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {

                        if (results.message == 1) {
                            location.reload();
                            swal("Done!", "Agent deleted successfully", "success");
                        } else {
                            swal("Error!","Some error happened", "error");
                        }
                    }
                });
            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        });
    }
// </script>

// <script type="text/javascript"> 
    function deletePrinter(id) {
        swal({ 
            title: "Are you sure?",
            text: "All setups this printer will be deleted.",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, I'm sure!",
            cancelButtonText: "No, Cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('setting/printer/delete/')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    beforeSend: function(){
                      // Show image container
                      $("#loader").show();
                     },
                    success: function (results) {

                        if (results.success == 1) {
                          location.reload();
                          swal("Done!", results.message, "success");
                        } else {
                            swal("Error!", results.message, "error");
                        }
                    },
                    complete:function(data){
                    // Hide image container
                    $("#loader").hide();
                   },
                });
            } else {
                e.dismiss;
            }

        }, function (dismiss) {

            return false;
        });
    }
// </script> 