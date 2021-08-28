// !!! attention: the script are include in the footer.php page !!!
// For the add, there is no modal script are no data are called from the database. Data are just going to be sent. 

// <!-- Begin Edit popupfile -->

    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $('#editmodal').modal('show');

                $span =$(this).closest('span');

                var data = $span.children('span').map(function() {
                        return $(this).text();
                }).get();

                console.log(data);
                console.log(data.length)
                $('#id_project').val(data[0]);
                $('#project_name').val(data[1]);
                $('#starting_week').text(data[2]);
                $('#project_duration').val(data[3]);
                $('#nb_ressource').val(data[4]);
                $('#project_color').val(data[5]);

        })
    });




// <!-- End Edit popupfile -->


// <!-- Begin Delete popupfile appel ligne 96-->

    $(document).ready(function() {
        $('.deletebtn').on('click', function() {
            $('#deletemodal').modal('show');

                $span =$(this).closest('span');

                var data = $span.children('span').map(function() {
                        return $(this).text();
                }).get();

                console.log(data);
                $('#id_delete').val(data[0]);
            


        })
    });

 


// <!-- End Delete popupfile -->
// <!-- Validateur add a project -->
     

$(document).ready(function () {
   
    //Contact Form validation on click event
    $("#contact-form").on("submit", function () {
        var valid = true;
               
        var projectName = $("#projectName").val();
        var duration = $("#duration").val();
        var ressource = $("#ressource").val();
      

        if (projectName == "") {
            $("#projectName-info").html("This is a required field");
             valid = false;
        }
             
        if (duration == "") {
            $("#duration-info").html("This is a required field");
            valid = false;
        }
        if (ressource == "") {
            $("#ressource-info").html("This is a required field");
            valid = false;
        }
        
        
        return valid;

    });
});
// </script>
// <!-- end of validator add a project -->

// <!-- Validateur edit a project -->
// <script>
$(document).ready(function () {
   
    //Contact Form validation on click event
    $("#edit-form").on("submit", function () {
        var valid = true;
            
        var projectName = $("#project_name").val();
        var duration = $("#project_duration").val();
        var ressource = $("#nb_ressource").val();
      

        if (projectName == "") {
            $("#project_name-info").html("This is a required field");
            valid=false;
        }
     
      
        if (duration == "") {
            $("#project_duration-info").html("This is a required field");
            valid = false;
        }
        if (ressource == "") {
            $("#nb_ressource-info").html("This is a required field");
            valid = false;
        }
        
        return valid;

    });
});
// </script>
// <!-- end of validator edit a project -->

 // color the select menu

$(".form-control option").each(function() {


  $(this).css("background-color", $(this).val())
})

// end of color the select menu

